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
            'isAdmin' => true,
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'admin 1',
            'address' => 'jl. admin 1',
            'city' => 'Malang',
            'phone' => '081234567890',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/UserImages%2Ferik.jpg?alt=media&token=89b54691-39fe-46d4-a103-d7fa5bbd5d97&_gl=1*1skg2xy*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5MDMuMC4wLjA.',
        ]);

        User::create([
            'isAdmin' => true,
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('password'),
            'name' => 'admin 2',
            'address' => 'jl. admin 2',
            'city' => 'Makassar',
            'phone' => '089876543210',
            'image' => 'https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/UserImages%2Ferik.jpg?alt=media&token=89b54691-39fe-46d4-a103-d7fa5bbd5d97&_gl=1*1skg2xy*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5MDMuMC4wLjA.',
        ]);

        Category::create([
            'name' => "Hasil Hutan Bukan Kayu",
            'slug' => "hhbk",
        ]);

        Category::create([
            'name' => "Hasil Hutan Kayu",
            'slug' => "hhk",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 1',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, nesciunt.',
            'price' => 10000,
            'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2FHITAM.jpg?alt=media&token=2a410084-ee28-4b2f-acd5-f94a38364c42&_gl=1*6wzegx*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5NzcuMC4wLjA.",
        ]);

        Product::create([
            'user_id' => 1,
            'category' => json_encode([
                ['id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'slug' => 'hhk'],
            ]),
            'name' => 'produk admin 1 lagi',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, culpa?',
            'price' => 11000,
            'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2FHITAM.jpg?alt=media&token=2a410084-ee28-4b2f-acd5-f94a38364c42&_gl=1*6wzegx*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5NzcuMC4wLjA.",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['id' => 1, 'category_name' => 'Hasil Hutan Bukan Kayu', 'slug' => 'hhbk'],
            ]),
            'name' => 'produk admin 2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, maiores.',
            'price' => 20000,
            'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2FHITAM.jpg?alt=media&token=2a410084-ee28-4b2f-acd5-f94a38364c42&_gl=1*6wzegx*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5NzcuMC4wLjA.",
        ]);

        Product::create([
            'user_id' => 2,
            'category' => json_encode([
                ['id' => 2, 'category_name' => 'Hasil Hutan Kayu', 'slug' => 'hhk'],
            ]),
            'name' => 'produk admin 2 lagi',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, veniam!',
            'price' => 22000,
            'image' => "https://firebasestorage.googleapis.com/v0/b/firestore-cff6b.appspot.com/o/ProductImages%2FHITAM.jpg?alt=media&token=2a410084-ee28-4b2f-acd5-f94a38364c42&_gl=1*6wzegx*_ga*MTk2NzQ1NzczNC4xNjg1NDU3Nzc0*_ga_CW55HF8NVT*MTY4NjEzODc4OC4yOS4xLjE2ODYxMzg5NzcuMC4wLjA.",
        ]);
    }
}
