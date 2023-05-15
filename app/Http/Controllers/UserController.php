<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(auth()->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // !! MASIH ERROR
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required|unique:users',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
        $user = User::find($user->id);

        $data = request('image');
        $uri = explode(';', $data);
        $decode = explode(',', $uri[1]);
        $data = base64_decode($decode[1]);
        // $data = base64_decode(request('image'));
        $ekstensi = explode('/', $uri[0]);
        $ekstensi = $ekstensi[1];
        $fileName = date('Ymdhis') . $user->id . '.' . $ekstensi;
        $user->image = "UserImage/" . $fileName;
        file_put_contents('../storage/app/UserImage/' . $fileName, $data);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->save();

        return response()->json([
            "success" => true,
            "message" => "User has been updated!",
            "data" => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
