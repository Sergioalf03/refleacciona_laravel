<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/1', function(Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Las credenciales son incorrectas'],
        ]);
    }

    return response()->json([
        'code' => 200,
        'message' => 'Success',
        'data' => [
            'token' => $user->createToken($request->device_name),
            'user_name' =>  $user->name,
            'user_email' =>  $user->email,
        ],
    ], 200);
});

route::post('/register', function(Request $request) {
    $userDb = new user;
    $userResult = $userDb::where('email', $request['email'])
        ->first();

    if (isset($userResult)) {
        return abort(409, 'El correo ya está registrado');
    }

    $randomString = Str::random(64);

    $userResult = $userDb::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone_number' => $request['phone_number'],
        'password' => Hash::make($request['password']),
        'key' => Hash::make($randomString),
        'img' => 'nop', // to save img
    ]);

    return response()->json([
        'code' => 200,
        'message' => 'Success',
        'data' => [
            'id' => $userResult['id'],
        ],
    ], 200);
});

// remove tokens

// Revoke all tokens...
// $user->tokens()->delete();

// Revoke a specific token...
// $user->tokens()->where('id', $tokenId)->delete();
