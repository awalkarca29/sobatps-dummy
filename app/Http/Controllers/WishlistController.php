<?php

// namespace App\Http\Controllers;

// use App\Models\User;
// use App\Models\Wishlist;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

// class WishlistController extends Controller
// {
//     public function indexAll()
//     {
//         $wishlist = Wishlist::all();
//         return response()->json($wishlist);
//     }

//     public function index(Request $request)
//     {
//         $user = auth()->user();
//         $user = User::find($user->id);

//         $wishlist = Wishlist::with('product')->where('user_id', $user->id)->latest()->get();

//         return response()->json($wishlist);
//     }

//     public function store(Request $request)
//     {
//         $validator = Validator::make(request()->all(), [
//             'product_id' => 'required',
//         ]);

//         if ($validator->fails()) {
//             return response()->json($validator->messages(), 422);
//         }

//         $user = auth()->user();

//         $wishlist = Wishlist::create([
//             'user_id' => $user->id,
//             'product_id' => request('product_id'),
//         ]);

//         $wishlist->save();

//         return response()->json($wishlist);
//     }

//     public function destroy($id)
//     {
//         $user = auth()->user();
//         $wishlist = Wishlist::find($id);

//         if ($user->id != $wishlist->user_id) {
//             return response()->json([
//                 "success" => false,
//                 "message" => "You're not the owner of the Wishlist!",
//             ], 403);
//         }

//         $wishlist->delete();

//         return response()->json($wishlist);
//     }
// }
