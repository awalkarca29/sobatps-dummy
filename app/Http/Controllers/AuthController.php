<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = User::create([
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        if ($user) {
            return response()->json($user);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->user();
        $user = User::find($user->id);

        if ($request->has('image')) {
            if ($user->image) {
                $oldData = $user->image;
                $oldUri = explode('/', $oldData);
                $filename = explode('?', $oldUri[5])[0];
                $old_firebase_storage_path = $oldUri[4] . '/' . $filename;
                app('firebase.storage')->getBucket()->object($old_firebase_storage_path)->delete();
            }

            $imageData = $request->input('image');
            // $base64Image = substr($imageData, strpos($imageData, ',') + 1);
            $imageData = base64_decode($imageData);

            $fileName = date('Ymdhis') . $user->id . '.jpg';
            $firebaseStoragePath = "UserImages/{$fileName}";

            Storage::disk('local')->put("public/UserImages/{$fileName}", $imageData);

            $uploadedFile = fopen(storage_path("app/public/UserImages/{$fileName}"), 'r');
            app('firebase.storage')->getBucket()->upload($uploadedFile, ['name' => $firebaseStoragePath]);

            Storage::disk('local')->delete("public/UserImages/{$fileName}");

            $expiresAt = new DateTime('2030-01-01');
            $imageReference = app('firebase.storage')->getBucket()->object($firebaseStoragePath);
            $imageUrl = $imageReference->signedUrl($expiresAt);

            $user->image = $imageUrl;
        }

        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->phone = $request->input('phone');
        $user->save();

        return response()->json($user);
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
