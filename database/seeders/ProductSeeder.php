<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'MacBook Pro 16-inch',
                'description' => 'Powerful laptop with M2 Pro chip, perfect for developers and creative professionals. Features stunning Retina display, exceptional performance, and all-day battery life.',
                'category' => 'Electronics',
                'price' => 2499.00,
            ],
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest smartphone with advanced camera system, titanium design, and powerful A17 Pro chip. Experience innovation at your fingertips with cutting-edge technology.',
                'category' => 'Electronics',
                'price' => 999.00,
            ],
            [
                'name' => 'Ergonomic Office Chair',
                'description' => 'Premium ergonomic office chair with lumbar support, adjustable height, and breathable mesh fabric. Designed for maximum comfort during long work sessions.',
                'category' => 'Furniture',
                'price' => 299.99,
            ],
            [
                'name' => 'Wireless Bluetooth Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation, premium sound quality, and 30-hour battery life. Perfect for music, calls, and focused work.',
                'category' => 'Electronics',
                'price' => 179.99,
            ],
            [
                'name' => 'Standing Desk Converter',
                'description' => 'Adjustable standing desk converter that transforms any desk into a healthy workspace. Easy height adjustment and spacious surface for laptop and accessories.',
                'category' => 'Furniture',
                'price' => 149.99,
            ],
            [
                'name' => 'Mechanical Keyboard RGB',
                'description' => 'Professional mechanical gaming keyboard with customizable RGB lighting, tactile switches, and programmable keys. Built for gamers and developers.',
                'category' => 'Electronics',
                'price' => 89.99,
            ],
            [
                'name' => 'Smart Watch Series 8',
                'description' => 'Advanced smartwatch with health monitoring, GPS tracking, and seamless connectivity. Track your fitness goals and stay connected throughout the day.',
                'category' => 'Electronics',
                'price' => 399.00,
            ],
            [
                'name' => 'Coffee Maker Deluxe',
                'description' => 'Premium automatic coffee maker with built-in grinder, programmable settings, and thermal carafe. Brew perfect coffee every morning with professional quality.',
                'category' => 'Appliances',
                'price' => 199.99,
            ],
            [
                'name' => 'Yoga Mat Professional',
                'description' => 'High-quality non-slip yoga mat with extra cushioning and eco-friendly materials. Perfect for yoga, pilates, and all floor exercises.',
                'category' => 'Sports',
                'price' => 49.99,
            ],
            [
                'name' => 'Air Purifier HEPA',
                'description' => 'Advanced air purifier with HEPA filtration, smart controls, and quiet operation. Removes allergens, dust, and pollutants for cleaner indoor air.',
                'category' => 'Appliances',
                'price' => 249.99,
            ],
            [
                'name' => 'Gaming Monitor 4K',
                'description' => '27-inch 4K gaming monitor with high refresh rate, HDR support, and ultra-low latency. Immersive gaming experience with stunning visual clarity.',
                'category' => 'Electronics',
                'price' => 599.99,
            ],
            [
                'name' => 'Electric Toothbrush Smart',
                'description' => 'Smart electric toothbrush with app connectivity, multiple cleaning modes, and long-lasting battery. Achieve optimal oral health with advanced technology.',
                'category' => 'Health',
                'price' => 79.99,
            ],
            [
                'name' => 'Bookshelf Modern Wood',
                'description' => 'Stylish modern bookshelf made from sustainable wood with multiple shelves. Perfect for organizing books, decorations, and personal items.',
                'category' => 'Furniture',
                'price' => 189.99,
            ],
            [
                'name' => 'Wireless Charging Pad',
                'description' => 'Fast wireless charging pad compatible with all Qi-enabled devices. Sleek design with LED indicators and foreign object detection for safe charging.',
                'category' => 'Electronics',
                'price' => 34.99,
            ],
            [
                'name' => 'Fitness Tracker Advanced',
                'description' => 'Comprehensive fitness tracker with heart rate monitoring, sleep tracking, and waterproof design. Monitor your health and fitness goals 24/7.',
                'category' => 'Sports',
                'price' => 129.99,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
