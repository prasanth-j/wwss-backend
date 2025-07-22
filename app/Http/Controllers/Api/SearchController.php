<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SearchResultResource;
use App\Models\BlogPost;
use App\Models\FAQ;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    /**
     * Unified search across all content types
     */
    public function search(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:1|max:255',
            'page' => 'integer|min:1',
            'per_page' => 'integer|min:1|max:50',
            'type' => 'string|in:blog_post,product,page,faq',
            'sort' => 'string|in:relevance,recency',
        ]);

        $query = $request->input('q');
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $type = $request->input('type');
        $sort = $request->input('sort', 'relevance');

        $results = collect();

        // Search in each model if no specific type is requested
        if (! $type || $type === 'blog_post') {
            $blogPosts = $this->searchBlogPosts($query);
            $results = $results->merge($blogPosts);
        }

        if (! $type || $type === 'product') {
            $products = $this->searchProducts($query);
            $results = $results->merge($products);
        }

        if (! $type || $type === 'page') {
            $pages = $this->searchPages($query);
            $results = $results->merge($pages);
        }

        if (! $type || $type === 'faq') {
            $faqs = $this->searchFAQs($query);
            $results = $results->merge($faqs);
        }

        // Sort results
        $results = $this->sortResults($results, $sort);

        // Paginate results
        $paginatedResults = $this->paginateCollection($results, $perPage, $page, $request);

        return response()->json([
            'data' => SearchResultResource::collection($paginatedResults->items()),
            'meta' => [
                'total' => $paginatedResults->total(),
                'per_page' => $paginatedResults->perPage(),
                'current_page' => $paginatedResults->currentPage(),
                'last_page' => $paginatedResults->lastPage(),
                'from' => $paginatedResults->firstItem(),
                'to' => $paginatedResults->lastItem(),
                'query' => $query,
                'search_type' => $type ?: 'all',
            ],
        ]);
    }

    /**
     * Get search suggestions
     */
    public function suggestions(Request $request): JsonResponse
    {
        $request->validate([
            'q' => 'required|string|min:1|max:255',
            'limit' => 'integer|min:1|max:10',
        ]);

        $query = $request->input('q');
        $limit = $request->input('limit', 5);

        $suggestions = collect();

        // Get suggestions from different models
        $blogPostTitles = BlogPost::where('title', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('title');

        $productNames = Product::where('name', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('name');

        $pageTitles = Page::where('title', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('title');

        $faqQuestions = FAQ::where('question', 'like', "%{$query}%")
            ->limit($limit)
            ->pluck('question')
            ->map(function ($question) {
                return strlen($question) > 60 ? substr($question, 0, 60).'...' : $question;
            });

        $suggestions = $suggestions
            ->merge($blogPostTitles)
            ->merge($productNames)
            ->merge($pageTitles)
            ->merge($faqQuestions)
            ->unique()
            ->take($limit)
            ->values();

        return response()->json([
            'suggestions' => $suggestions,
            'query' => $query,
        ]);
    }

    /**
     * Search blog posts
     */
    private function searchBlogPosts(string $query): Collection
    {
        // Use Scout search if available, otherwise fallback to database search
        try {
            $results = BlogPost::search($query)->get();
        } catch (\Exception $e) {
            $results = BlogPost::where('title', 'like', "%{$query}%")
                ->orWhere('body', 'like', "%{$query}%")
                ->orWhereJsonContains('tags', $query)
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->get();
        }

        return $results->map(function ($post) use ($query) {
            return [
                'id' => $post->id,
                'type' => 'blog_post',
                'title' => $post->title,
                'snippet' => $this->generateSnippet($post->body, $query),
                'link' => "/blog/{$post->id}",
                'meta' => [
                    'published_at' => $post->published_at?->format('Y-m-d'),
                    'tags' => $post->tags,
                ],
                'relevance_score' => $this->calculateRelevance($post->title.' '.$post->body, $query),
                'created_at' => $post->created_at,
            ];
        });
    }

    /**
     * Search products
     */
    private function searchProducts(string $query): Collection
    {
        try {
            $results = Product::search($query)->get();
        } catch (\Exception $e) {
            $results = Product::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->orWhere('category', 'like', "%{$query}%")
                ->get();
        }

        return $results->map(function ($product) use ($query) {
            return [
                'id' => $product->id,
                'type' => 'product',
                'title' => $product->name,
                'snippet' => $this->generateSnippet($product->description, $query),
                'link' => "/products/{$product->id}",
                'meta' => [
                    'category' => $product->category,
                    'price' => $product->price,
                ],
                'relevance_score' => $this->calculateRelevance($product->name.' '.$product->description, $query),
                'created_at' => $product->created_at,
            ];
        });
    }

    /**
     * Search pages
     */
    private function searchPages(string $query): Collection
    {
        try {
            $results = Page::search($query)->get();
        } catch (\Exception $e) {
            $results = Page::where('title', 'like', "%{$query}%")
                ->orWhere('content', 'like', "%{$query}%")
                ->get();
        }

        return $results->map(function ($page) use ($query) {
            return [
                'id' => $page->id,
                'type' => 'page',
                'title' => $page->title,
                'snippet' => $this->generateSnippet($page->content, $query),
                'link' => "/pages/{$page->id}",
                'meta' => [],
                'relevance_score' => $this->calculateRelevance($page->title.' '.$page->content, $query),
                'created_at' => $page->created_at,
            ];
        });
    }

    /**
     * Search FAQs
     */
    private function searchFAQs(string $query): Collection
    {
        try {
            $results = FAQ::search($query)->get();
        } catch (\Exception $e) {
            $results = FAQ::where('question', 'like', "%{$query}%")
                ->orWhere('answer', 'like', "%{$query}%")
                ->get();
        }

        return $results->map(function ($faq) use ($query) {
            return [
                'id' => $faq->id,
                'type' => 'faq',
                'title' => $faq->question,
                'snippet' => $this->generateSnippet($faq->answer, $query),
                'link' => "/faq/{$faq->id}",
                'meta' => [],
                'relevance_score' => $this->calculateRelevance($faq->question.' '.$faq->answer, $query),
                'created_at' => $faq->created_at,
            ];
        });
    }

    /**
     * Generate snippet with highlighted search terms
     */
    private function generateSnippet(string $content, string $query, int $length = 150): string
    {
        $content = strip_tags($content);
        $queryWords = explode(' ', strtolower($query));

        // Find the position of the first query word in the content
        $position = 0;
        foreach ($queryWords as $word) {
            $pos = stripos($content, $word);
            if ($pos !== false) {
                $position = max(0, $pos - 50);
                break;
            }
        }

        // Extract snippet
        $snippet = substr($content, $position, $length);

        // Ensure we don't cut words in half
        if ($position > 0) {
            $firstSpace = strpos($snippet, ' ');
            if ($firstSpace !== false) {
                $snippet = substr($snippet, $firstSpace + 1);
            }
        }

        if (strlen($content) > $position + $length) {
            $lastSpace = strrpos($snippet, ' ');
            if ($lastSpace !== false) {
                $snippet = substr($snippet, 0, $lastSpace).'...';
            }
        }

        return trim($snippet);
    }

    /**
     * Calculate relevance score based on query matches
     */
    private function calculateRelevance(string $content, string $query): float
    {
        $content = strtolower($content);
        $query = strtolower($query);
        $queryWords = explode(' ', $query);

        $score = 0;
        $totalWords = count($queryWords);

        foreach ($queryWords as $word) {
            // Exact matches get higher score
            $exactMatches = substr_count($content, $word);
            $score += $exactMatches * 2;

            // Partial matches get lower score
            if (strlen($word) > 3) {
                $partialMatches = substr_count($content, substr($word, 0, -1));
                $score += $partialMatches * 0.5;
            }
        }

        return round($score / max($totalWords, 1), 2);
    }

    /**
     * Sort search results
     */
    private function sortResults(Collection $results, string $sort): Collection
    {
        if ($sort === 'recency') {
            return $results->sortByDesc('created_at')->values();
        }

        // Default to relevance sorting
        return $results->sortByDesc('relevance_score')->values();
    }

    /**
     * Paginate a collection
     */
    private function paginateCollection(Collection $collection, int $perPage, int $page, Request $request): LengthAwarePaginator
    {
        $total = $collection->count();
        $currentPageItems = $collection->slice(($page - 1) * $perPage, $perPage)->values();

        $paginator = new LengthAwarePaginator(
            $currentPageItems,
            $total,
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'pageName' => 'page',
            ]
        );

        return $paginator;
    }
}
