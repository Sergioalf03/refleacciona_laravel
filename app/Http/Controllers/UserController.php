<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailConfirmEmail;
use App\Mail\ForgetPasswordEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        $request->user()->tokens()->where('id', request()->user()->currentAccessToken()->id)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function logoutAllDevices(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function tokenList(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $request->user()->tokens(),
        ], 200);
    }

    public function validToken(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'validToken' => true,
            ],
        ], 200);
    }

    public function userData(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'userName' => $request->user()->name,
                'userEmail' => $request->user()->email,
            ],
        ], 200);
    }

    public function userForm(Request $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'userName' => $request->user()->name,
                'userEmail' => $request->user()->email,
                'userPhone' => $request->user()->phone_number,
            ],
        ], 200);
    }

    public function updateUser(Request $request)
    {
        $userId = $request->user()->id;

        $user = new User;
        $userRes = $user::where('id', $userId)
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
            ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function updateLogo(Request $request)
    {
        $userId = $request->user()->id;

        Storage::disk('local')->put($userId. '.jpeg', file_get_contents($request['image']));

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // return $user;

        if (!$user || !Hash::check($request->password, $user->password)) {
            return abort(409, 'Las credenciales son incorrectas');
        }

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'token' => $user->createToken($request->device_name)->plainTextToken,
                'userName' =>  $user->name,
                'userEmail' =>  $user->email,
                'userPhone' => $user->phone_number,
                'userId' => $user->id,
            ],
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'phone_number' => 'required',
            'key' => 'required',
        ]);

        $userDb = new user;
        $userResult = $userDb::where('email', $request['email'])
            ->first();

        if (isset($userResult)) {
            return abort(409, 'El correo ya está registrado');
        }

        $randomString = mt_rand(100000, 999999) . '';

        $userResult = $userDb::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'password' => Hash::make($request['password']),
            'key' => Hash::make($randomString),
            'img' => 'nop', // to save img
        ]);

        $mailResult = Mail::to($request['email'])->send(new EmailConfirmEmail($randomString));

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'id' => $userResult['id'],
                'mail' => $mailResult,
            ],
        ], 200);
    }

    public function confirmEmail(Request $request)
    {
        $user = new User;
        $userResult = $user::where('id', $request['id'])
            ->where('status', 2)
            ->first();

        if (!$userResult || !Hash::check($request['token'], $userResult->key)) {
            return abort(409, 'No se encontró el usuario');
        }

        $userResult->fill([
            'status' => 1,
            'key' => 'nop',
        ])->save();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }

    public function forgetPassword(Request $request)
    {
        $userDb = new user;
        $userResult = $userDb::where('email', $request['email'])
            ->where('status', 1)
            ->select('id')
            ->first();

        if (!isset($userResult)) {
            return abort(409, 'No se encontró el usuario');
        }

        $randomString = mt_rand(100000, 999999) . '';

        $userDb::where('email', $request['email'])
            ->update([
                'key' => Hash::make($randomString),
            ]);

        $mailResult = Mail::to($request['email'])->send(new ForgetPasswordEmail($randomString));

        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'id' => $userResult['id'],
            ],
        ], 200);
    }

    public function changePassword(Request $request)
    {
        $userDb = new user;
        $userResult = $userDb::where('email', $request['email'])
            ->where('status', 1)
            ->select(
                'key',
                'password',
            )
            ->first();

        if (!$userResult || !Hash::check($request['token'], $userResult->key)) {
            return abort(409, 'No se encontró el usuario');
        }

        $userDb::where('email', $request['email'])
            ->update([
                'key' => 'nop',
                'password' => Hash::make($request['password']),
            ]);

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    }
}
