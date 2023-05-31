<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        if ($user) {
            return response()->json(
                // [
                // "success" => true,
                // "message" => "Registration Success!",
                // "data" =>
                $user,
                // ]
            );
        } else {
            return response()->json(['message' => 'Registration Failed']);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
        $user = User::find($user->id);

        if ($request->image != '') {

            if ($user->image) {
                $oldData = $user->image;
                $oldUri = explode('/', $oldData);
                $filename = explode('?', $oldUri[5])[0];
                $old_firebase_storage_path = $oldUri[4] . '/' . $filename;
                app('firebase.storage')->getBucket()->object($old_firebase_storage_path)->delete();
            }

            $data = request('image');
            $uri = explode(';', $data);
            $decode = explode(',', $uri[1]);
            $data = base64_decode($decode[1]);
            // $data = base64_decode(request('image'));
            $ekstensi = explode('/', $uri[0]);
            $ekstensi = $ekstensi[1];

            $fileName = date('Ymdhis') . $user->id . '.' . $ekstensi;

            $firebase_storage_path = 'UserImages/';
            $localfolder = public_path('storage\UserImages\\');
            if (file_put_contents($localfolder . $fileName, $data)) {
                $uploadedfile = fopen($localfolder . $fileName, 'r');
                app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $fileName]);
                unlink($localfolder . $fileName);
            }
            $expiresAt = new DateTime('2030-01-01');
            $imageReference = app('firebase.storage')->getBucket()->object($firebase_storage_path . $fileName);
            $imageurl = $imageReference->signedUrl($expiresAt);

            $user->image = $imageurl;
            // $product->image = "storage/ProductImage/" . $fileName;
            // file_put_contents('../storage/app/public/ProductImage/' . $fileName, $data);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->city = $request->city;
        $user->phone = $request->phone;
        $user->save();

        return response()->json(
            // [
            // "success" => true,
            // "message" => "User has been updated!",
            // "data" =>
            $user,
            // ]
        );
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }
}
