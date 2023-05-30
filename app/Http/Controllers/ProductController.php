<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductShow;
use App\Models\Category;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function indexCategory()
    {
        $category = Category::all();
        return response()->json($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->get();

        if ($request['search_category']) {
            $searchCategory = $request['search_category'];
            $products = Product::where('categories', 'like', '%' . $searchCategory . '%')->latest()->get();
        }

        if ($request['search_product']) {
            $searchProduct = $request['search_product'];
            $products = Product::where('title', 'like', '%' . $searchProduct . '%')->latest()->get();
        }

        foreach ($products as $key => $val) {
            $products[$key]['categories'] = json_decode($val['categories']);
        }

        return response()->json(
            // [
            // "success" => true,
            // "message" => "Product has been showed!",
            // "data" =>
            $products,
            // ]
        );

        // $category = Category::all();
        // return response()->json($category);
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
            'categories' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'isSold' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();

        $data = request('image');
        $uri = explode(';', $data);
        $decode = explode(',', $uri[1]);
        $data = base64_decode($decode[1]);
        // $data = base64_decode(request('image'));
        $ekstensi = explode('/', $uri[0]);
        $ekstensi = $ekstensi[1];

        $product = $user->products()->create([
            'categories' => request('categories'),
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'stock' => request('stock'),
            'isSold' => request('isSold'),
        ]);

        $fileName = date('Ymdhis') . $product->id . '.' . $ekstensi;

        $firebase_storage_path = 'Images/';
        $localfolder = public_path('storage\ProductImage\\');
        if (file_put_contents($localfolder . $fileName, $data)) {
            $uploadedfile = fopen($localfolder . $fileName, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $fileName]);
            unlink($localfolder . $fileName);
        }
        $expiresAt = new DateTime('2030-01-01');
        $imageReference = app('firebase.storage')->getBucket()->object($firebase_storage_path . $fileName);
        $imageurl = $imageReference->signedUrl($expiresAt);

        $product->image = $imageurl;
        // $product->image = "storage/ProductImage/" . $fileName;
        // file_put_contents('../storage/app/public/ProductImage/' . $fileName, $data);
        $product->save();

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

        return response()->json(
            // [
            // "success" => true,
            // "message" => "Product has been showed!",
            // "data" =>
            new ProductShow($products),
            // ]
        );
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
            'categories' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'isSold' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        // !! DATA DI POSTMAN KELUARNYA INTEGER
        // $product = Product::where('id', $id)->update([
        //     'title' => request('title'),
        //     'description' => request('description'),
        //     'price' => request('price'),
        //     'stock' => request('stock'),
        // ]);

        $user = auth()->user();
        $product = Product::find($id);

        if ($user->id != $product->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the product!",
            ], 403);
        }

        if ($request->image != "") {
            Storage::delete($product->image);
            $data = $request->image;
            $uri = explode(';', $data);
            $decode = explode(',', $uri[1]);
            $data = base64_decode($decode[1]);
            // $data = base64_decode(request('image'));
            $ekstensi = explode('/', $uri[0]);
            $ekstensi = $ekstensi[1];
            $fileName = date('Ymdhis') . $product->id . '.' . $ekstensi;
            $product->image = "ProductImage/" . $fileName;
            file_put_contents('../storage/app/public/ProductImage/' . $fileName, $data);
        }

        $product->categories = $request->categories;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->isSold = $request->isSold;
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

        if ($user->id != $product->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the product!",
            ], 403);
        }

        if ($product->image) {
            Storage::delete($product->image);
        }

        $product->delete();

        return response()->json([
            "success" => true,
            "message" => "Product has been deleted!",
            "data" => $product,
        ]);
    }
}
