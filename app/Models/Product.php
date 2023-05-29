<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];

    public function scopeFilter($query, array $filters)
    {
        $query->when(($filters['search']) ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['user'] ?? false, fn($query, $user) =>
            $query->whereHas('user', fn($query) =>
                $query->where('username', $user)
            )
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

// class Product
// {
//     private static $store_products = [
//         [
//             "title" => "Minuman Soda",
//             "slug" => "minuman-soda",
//             "owner" => "admin",
//             "price" => "10000",
//             "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat harum nesciunt non! Officiis temporibus rerum, ipsum, unde quod nisi ea totam illum sequi est nulla provident! Quis, in sapiente minus facere voluptatibus molestiae doloremque vero modi quo earum illum ex dolores necessitatibus quisquam. Rerum iusto amet provident assumenda hic nihil.",
//         ],
//         [
//             "title" => "Makanan Ringan",
//             "slug" => "makanan-ringan",
//             "owner" => "admin2",
//             "price" => "20000",
//             "description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque quas iusto quae nihil, excepturi, rerum hic accusamus soluta voluptatibus tenetur accusantium recusandae atque fugiat tempore sapiente ipsam temporibus quisquam, asperiores fugit odio odit earum non. Est error quam cum, blanditiis atque incidunt ex hic doloribus architecto iure quidem doloremque! Atque, blanditiis cupiditate quidem rerum exercitationem numquam non assumenda reiciendis totam, iusto magnam fuga amet accusantium deleniti nihil dolorum! Hic aperiam ipsa voluptate omnis ipsum voluptatem, necessitatibus error sint possimus, unde nemo dolores neque mollitia explicabo, fugiat dolor? Voluptate maxime placeat nemo dicta. Eos, ipsum? Natus labore beatae consectetur quae dolore!",
//         ],
//     ];

//     public static function all()
//     {
//         return collect(self::$store_products);
//     }

//     public static function find($slug)
//     {
//         $products = static::all();
//         return $products->firstWhere('slug', $slug);
//     }
// }
