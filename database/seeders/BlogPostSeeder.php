<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Getting Started with Laravel Development',
                'body' => 'Laravel is a powerful PHP framework that makes web development elegant and enjoyable. In this comprehensive guide, we will explore the fundamental concepts of Laravel development, including routing, controllers, models, and views. Whether you are a beginner or an experienced developer, this tutorial will help you master Laravel development techniques and best practices.',
                'tags' => ['laravel', 'php', 'development', 'tutorial', 'web'],
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Advanced JavaScript Techniques for Modern Development',
                'body' => 'JavaScript has evolved significantly over the years, introducing powerful features and modern development patterns. This article covers advanced JavaScript concepts including async/await, closures, prototypes, and ES6+ features. Learn how to write more efficient and maintainable JavaScript code for your web applications.',
                'tags' => ['javascript', 'development', 'frontend', 'es6', 'async'],
                'published_at' => Carbon::now()->subDays(12),
            ],
            [
                'title' => 'Building RESTful APIs with Laravel',
                'body' => 'Creating robust and scalable RESTful APIs is essential for modern web applications. This tutorial demonstrates how to build comprehensive APIs using Laravel, including authentication, rate limiting, resource transformation, and proper error handling. We will also cover API versioning and documentation best practices.',
                'tags' => ['api', 'rest', 'laravel', 'backend', 'development'],
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'title' => 'Database Optimization Strategies',
                'body' => 'Database performance is crucial for application scalability. This detailed guide covers various database optimization techniques including indexing strategies, query optimization, database normalization, and caching mechanisms. Learn how to identify and resolve performance bottlenecks in your database operations.',
                'tags' => ['database', 'mysql', 'optimization', 'performance', 'indexing'],
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title' => 'Introduction to Vue.js Components',
                'body' => 'Vue.js provides an excellent component-based architecture for building interactive user interfaces. This beginner-friendly tutorial introduces Vue.js components, including props, events, slots, and composition API. Build reusable and maintainable frontend components with Vue.js.',
                'tags' => ['vuejs', 'components', 'frontend', 'javascript', 'spa'],
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Docker for Laravel Development',
                'body' => 'Containerization with Docker simplifies development environment setup and deployment processes. Learn how to dockerize Laravel applications, create multi-container setups with Docker Compose, and implement continuous integration workflows. This guide covers both development and production Docker configurations.',
                'tags' => ['docker', 'laravel', 'containerization', 'devops', 'deployment'],
                'published_at' => Carbon::now()->subDays(20),
            ],
            [
                'title' => 'Testing Laravel Applications',
                'body' => 'Comprehensive testing is essential for maintaining code quality and preventing bugs. This tutorial covers Laravel testing fundamentals including unit tests, feature tests, database testing, and mocking. Learn how to write effective tests and implement test-driven development practices.',
                'tags' => ['testing', 'phpunit', 'laravel', 'tdd', 'quality'],
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title' => 'CSS Grid and Flexbox Mastery',
                'body' => 'Modern CSS layout techniques have revolutionized web design. This comprehensive guide explores CSS Grid and Flexbox, demonstrating how to create responsive and flexible layouts. Master these powerful layout tools to build beautiful and functional web interfaces.',
                'tags' => ['css', 'grid', 'flexbox', 'layout', 'responsive'],
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title' => 'Securing Web Applications',
                'body' => 'Web application security is paramount in today\'s digital landscape. This article covers common security vulnerabilities including SQL injection, XSS attacks, CSRF protection, and authentication best practices. Learn how to implement robust security measures to protect your applications and user data.',
                'tags' => ['security', 'web', 'authentication', 'vulnerability', 'protection'],
                'published_at' => Carbon::now()->subDays(25),
            ],
            [
                'title' => 'Performance Optimization for Web Applications',
                'body' => 'Application performance directly impacts user experience and business success. This guide covers various performance optimization techniques including code splitting, lazy loading, caching strategies, and database optimization. Learn how to measure and improve your application\'s performance metrics.',
                'tags' => ['performance', 'optimization', 'caching', 'web', 'speed'],
                'published_at' => Carbon::now()->subDays(18),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
