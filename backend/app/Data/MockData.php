<?php

namespace App\Data;

class MockData
{
    private static array $products = [
        [
            'id' => 1,
            'slug' => 'aurora-wireless-headphones',
            'name' => 'Aurora Wireless Headphones',
            'brand' => 'Soundcraft',
            'category' => 'Audio',
            'rating' => 4.8,
            'rating_count' => 826,
            'price' => 189.99,
            'sale_price' => 149.99,
            'currency' => 'USD',
            'sale' => true,
            'stock' => 68,
            'weight' => '0.45kg',
            'images' => [
                'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=700&q=80',
                'https://images.unsplash.com/photo-1517495306984-8c2b8d1a11f1?auto=format&fit=crop&w=900&q=80'
            ],
            'description' => 'Active noise cancellation, 35-hour battery, and premium leather earmuffs ideal for travel.',
            'reviews' => [
                ['user' => 'Marie', 'rating' => 5, 'comment' => 'Incredible clarity and comfort!', 'date' => '2026-07-12'],
                ['user' => 'Joel', 'rating' => 4, 'comment' => 'Great battery life but a bit tight initially.', 'date' => '2026-07-08']
            ],
            'tags' => ['Top selling', 'New']
        ],
        [
            'id' => 2,
            'slug' => 'onyx-smart-watch',
            'name' => 'Onyx Smart Watch',
            'brand' => 'PulseLab',
            'category' => 'Wearables',
            'rating' => 4.7,
            'rating_count' => 410,
            'price' => 249.5,
            'sale_price' => null,
            'currency' => 'USD',
            'sale' => false,
            'stock' => 24,
            'weight' => '0.07kg',
            'images' => [
                'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=700&q=80'
            ],
            'description' => '24/7 health monitoring, built-in GPS, and voice assistant compatibility.',
            'reviews' => [
                ['user' => 'Nico', 'rating' => 5, 'comment' => 'Compact design and flawless tracking.', 'date' => '2026-06-30']
            ],
            'tags' => ['Trending']
        ],
        [
            'id' => 3,
            'slug' => 'terra-lite-backpack',
            'name' => 'Terra Lite Backpack',
            'brand' => 'Nomad Co.',
            'category' => 'Apparel',
            'rating' => 4.5,
            'rating_count' => 162,
            'price' => 129.0,
            'sale_price' => 99.0,
            'currency' => 'USD',
            'sale' => true,
            'stock' => 112,
            'weight' => '0.71kg',
            'images' => [
                'https://images.unsplash.com/photo-1500336624523-d727130c3328?auto=format&fit=crop&w=900&q=80'
            ],
            'description' => 'Weatherproof shell, padded laptop sleeve, and trolley sleeve for business travel.',
            'reviews' => [
                ['user' => 'Sara', 'rating' => 5, 'comment' => 'Solidly built and versatile.', 'date' => '2026-07-20']
            ],
            'tags' => ['Top selling', 'Travel']
        ],
        [
            'id' => 4,
            'slug' => 'solis-solar-speaker',
            'name' => 'Solis Solar Speaker',
            'brand' => 'Helios Audio',
            'category' => 'Audio',
            'rating' => 4.9,
            'rating_count' => 304,
            'price' => 79.95,
            'sale_price' => 59.95,
            'currency' => 'USD',
            'sale' => true,
            'stock' => 38,
            'weight' => '0.9kg',
            'images' => [
                'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80'
            ],
            'description' => 'Portable speaker with conference-call mic, IPX6 rating, and integrated solar cells.',
            'reviews' => [
                ['user' => 'Devi', 'rating' => 5, 'comment' => 'Loud for its size and charges under daylight.', 'date' => '2026-07-22']
            ],
            'tags' => ['Top selling', 'Sale']
        ],
        [
            'id' => 5,
            'slug' => 'lumen-smart-light-strip',
            'name' => 'Lumen Smart Light Strip',
            'brand' => 'BrightMind',
            'category' => 'Home',
            'rating' => 4.4,
            'rating_count' => 94,
            'price' => 59.0,
            'sale_price' => null,
            'currency' => 'USD',
            'sale' => false,
            'stock' => 73,
            'weight' => '0.12kg',
            'images' => [
                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=900&q=80'
            ],
            'description' => 'Voice-enabled lighting solutions with adaptive color temperature.',
            'reviews' => [
                ['user' => 'Amir', 'rating' => 4, 'comment' => 'Nice mood lighting but app needs polish.', 'date' => '2026-07-10']
            ],
            'tags' => ['Trending']
        ]
    ];

    public static function products(array $filters = []): array
    {
        $products = self::$products;

        if (isset($filters['category'])) {
            $products = array_values(array_filter($products, fn ($product) => strtolower($product['category']) === strtolower($filters['category'])));
        }

        if (!empty($filters['sale_only'])) {
            $products = array_values(array_filter($products, fn ($product) => $product['sale']));
        }

        if (!empty($filters['search'])) {
            $term = strtolower($filters['search']);
            $products = array_values(array_filter($products, fn ($product) => strpos(strtolower($product['name']), $term) !== false));
        }

        if (!empty($filters['limit'])) {
            $products = array_slice($products, 0, max(1, (int) $filters['limit']));
        }

        return $products;
    }

    public static function productBySlug(string $slug): ?array
    {
        foreach (self::$products as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    public static function categories(): array
    {
        return [
            ['id' => 1, 'name' => 'Audio', 'slug' => 'audio', 'image' => 'https://images.unsplash.com/photo-1470229538611-16ba8c7ffbd7?auto=format&fit=crop&w=900&q=80'],
            ['id' => 2, 'name' => 'Wearables', 'slug' => 'wearables', 'image' => 'https://images.unsplash.com/photo-1517430816045-df4b7de11d0d?auto=format&fit=crop&w=900&q=80'],
            ['id' => 3, 'name' => 'Travel & Bags', 'slug' => 'travel', 'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=900&q=80'],
            ['id' => 4, 'name' => 'Home', 'slug' => 'home', 'image' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80']
        ];
    }

    public static function banners(): array
    {
        return [
            ['id' => 'hero', 'title' => 'Experience ShopG', 'subtitle' => 'Curated catalog, instant checkout, and admin-ready insights.', 'image' => 'https://images.unsplash.com/photo-1503602642458-232111445657?auto=format&fit=crop&w=1400&q=80'],
            ['id' => 'sale', 'title' => 'Summer Sale', 'subtitle' => 'Up to 30% off on selected travel essentials.', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=1400&q=80']
        ];
    }

    public static function cart(): array
    {
        $item = self::$products[0];
        $quantity = 2;
        $unitPrice = $item['sale_price'] ?? $item['price'];
        $subtotal = $unitPrice * $quantity;

        return [
            'currency' => 'USD',
            'items' => [
                [
                    'product' => $item,
                    'quantity' => $quantity,
                    'total' => round($subtotal, 2)
                ],
                [
                    'product' => self::$products[2],
                    'quantity' => 1,
                    'total' => self::$products[2]['sale_price'] ?? self::$products[2]['price']
                ]
            ],
            'shipping' => 12.0,
            'discount' => 10.0,
            'grand_total' => round($subtotal + 12.0 - 10.0, 2)
        ];
    }

    public static function orders(): array
    {
        return [
            [
                'id' => 1348,
                'status' => 'Delivered',
                'items' => self::products(['limit' => 2]),
                'total' => 320.75,
                'placed_at' => '2026-07-19'
            ],
            [
                'id' => 1342,
                'status' => 'Processing',
                'items' => [self::$products[3]],
                'total' => 59.95,
                'placed_at' => '2026-07-23'
            ]
        ];
    }

    public static function profile(): array
    {
        return [
            'name' => 'Maya Patel',
            'email' => 'maya.patel@example.com',
            'phone' => '+1-907-555-0143',
            'gender' => 'Female',
            'default_address' => '124 The Plaza, Springfield, IL',
            'reward_points' => 820
        ];
    }

    public static function adminDashboard(): array
    {
        return [
            'metrics' => [
                'orders_today' => 32,
                'delivered' => 286,
                'pending' => 18,
                'cancelled' => 5,
                'revenue' => 49230,
                'refunds' => 8120
            ],
            'top_products' => array_slice(self::$products, 0, 3),
            'recent_orders' => self::orders()
        ];
    }
}
