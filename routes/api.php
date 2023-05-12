<?php

use App\Http\Controllers\AuditoryController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Mail\EmailConfirmEmail;
use Illuminate\Support\Facades\Mail;

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

Route::group(['middleware' => ['auth:sanctum' /*, VerfiedAndActuveUser::class*/]], function() {
    Route::get('/logout', function (Request $request) {
        $request->user()->tokens()->where('id', request()->user()->currentAccessToken()->id)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    });

    Route::get('/logout-all-devices', function(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success',
        ], 200);
    });

    Route::get('/token-list', function (Request $request) {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $request->user()->tokens(),
        ], 200);
    });

    Route::get('/valid-token', function (Request $request) {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'validToken' => true,
            ],
        ], 200);
    });

    Route::get('/user-data', function (Request $request) {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'userName' => $request->user()->name,
                'userEmail' => $request->user()->email,
            ],
        ], 200);
    });

    Route::get('/user-form', function (Request $request) {
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => [
                'userName' => $request->user()->name,
                'userEmail' => $request->user()->email,
                'userPhone' => $request->user()->phone_number,
            ],
        ], 200);
    });

    Route::post('/auditory/save', [AuditoryController::class, 'saveAuditory']);
    Route::post('/auditory/update/{id}', [AuditoryController::class, 'updateAuditory']);
    Route::get('/auditory/list', [AuditoryController::class, 'getAuditoriesList']);
    Route::get('/auditory/count', [AuditoryController::class, 'getAuditoriesCount']);
    Route::get('/auditory/form/{id}', [AuditoryController::class, 'getForm']);
});

Route::post('/login', function (Request $request) {
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
        ],
    ], 200);
});

route::post('/register', function(Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'phone_number' => 'required',
        'key' => 'required',
    ]);
    // $data = ['message' => 'Bienvenido!'];

    // $result = Mail::to('sergioalf03@gmail.com')->send(new EmailConfirmEmail($data));

    // return $result;

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

    return response()->json([
        'code' => 200,
        'message' => 'Success',
        'data' => [
            'id' => $userResult['id'],
            'token' => $randomString,
        ],
    ], 200);
});

route::post('/confirm-email', function(Request $request) {
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
});

route::post('/forget-password', function(Request $request) {
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

    return response()->json([
        'code' => 200,
        'message' => 'Success',
        'data' => [
            'id' => $userResult['id'],
            'token' => $randomString,
        ],
    ], 200);
});

route::post('/change-password', function(Request $request) {
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
});
