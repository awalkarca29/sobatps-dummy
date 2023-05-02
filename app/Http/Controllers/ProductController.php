<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductShow;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(2);

        return response()->json([
            "success" => true,
            "message" => "Product has been showed!",
            "data" => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();

        $product = $user->products()->create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock'),
        ]);

        return response()->json([
            "success" => true,
            "message" => "Product has been added!",
            "data" => $product,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);

        return response()->json([
            "success" => true,
            "message" => "Product has been showed!",
            "data" => new ProductShow($products) ,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        // $product = Product::where('id', $id)->update([
        //     'title' => request('title'),
        //     'description' => request('description'),
        //     'price' => request('price'),
        //     'stock' => request('stock'),
        // ]);

        $user = auth()->user();
        $product = Product::find($id);

        if($user->id != $product->user_id) {
            return response()->json([
            "success" => false,
            "message" => "You're not the owner of the product!"
        ], 403);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return response()->json([
            "success" => true,
            "message" => "Product has been updated!",
            "data" => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $product = Product::find($id);

        if($user->id != $product->user_id) {
            return response()->json([
            "success" => false,
            "message" => "You're not the owner of the product!"
        ], 403);
        }

        $product->delete();

        return response()->json([
            "success" => true,
            "message" => "Product has been deleted!",
            "data" => $product,
        ]);
    }
}
