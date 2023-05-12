<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jl. admin 1',
            'phone' => '081234567890',
        ]);

        User::create([
            'name' => 'admin 2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'address' => 'jl. admin 2',
            'phone' => '089876543210',
        ]);

        Category::create([
            'category_name' => "Obat",
        ]);

        Category::create([
            'category_name' => "Makanan",
        ]);

        Category::create([
            'category_name' => "Bahan Baku",
        ]);

        Category::create([
            'category_name' => "Lainnya",
        ]);

        Product::create([
            'categories' => json_encode([
                ['id' => 1, 'category_name' => 'Obat'],
                ['id' => 2, 'category_name' => 'Makanan'],
            ]),
            'title' => 'produk admin 1',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, nesciunt.',
            'price' => 10000,
            'stock' => 1,
            'user_id' => 1,
        ]);

        Product::create([
            'categories' => json_encode([
                ['id' => 2, 'category_name' => 'Makanan'],
                ['id' => 3, 'category_name' => 'Herbal'],
            ]),
            'title' => 'produk admin 1 lagi',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, culpa?',
            'price' => 11000,
            'stock' => 11,
            'user_id' => 1,
        ]);

        Product::create([
            'categories' => json_encode([
                ['id' => 3, 'category_name' => 'Herbal'],
                ['id' => 1, 'category_name' => 'Obat'],
            ]),
            'title' => 'produk admin 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, maiores.',
            'price' => 20000,
            'stock' => 2,
            'user_id' => 2,
        ]);

        Product::create([
            'categories' => json_encode([
                ['id' => 4, 'category_name' => 'Lainnya'],
            ]),
            'title' => 'produk admin 2 lagi',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, veniam!',
            'price' => 22000,
            'stock' => 22,
            'user_id' => 2,
        ]);
    }
}
