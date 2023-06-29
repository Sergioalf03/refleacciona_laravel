<?php

use App\Http\Controllers\AuditoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/logout-all-devices', [UserController::class, 'logoutAllDevices']);
    Route::get('/token-list', [UserController::class, 'tokenList']);
    Route::get('/valid-token', [UserController::class, 'validToken']);
    Route::get('/user-data', [UserController::class, 'userData']);
    Route::get('/user-form', [UserController::class, 'userForm']);
    Route::post('/update-user', [UserController::class, 'updateUser']);
    Route::post('/update-logo', [UserController::class, 'updateLogo']);

    Route::get('/version/last', [VersionController::class, 'getLastVersion']);
    Route::get('/version/get-last-version', [VersionController::class, 'getNewRows']);

    Route::post('/auditory/save', [AuditoryController::class, 'saveAuditory']);
    Route::post('/auditory/update/{id}', [AuditoryController::class, 'updateAuditory']);
    Route::get('/auditory/list', [AuditoryController::class, 'getAuditoriesList']);
    Route::get('/auditory/count', [AuditoryController::class, 'getAuditoriesCount']);
    Route::get('/auditory/form/{id}', [AuditoryController::class, 'getForm']);
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/confirm-email', [UserController::class, 'confirmEmail']);
Route::post('/forget-password', [UserController::class, 'forgetPassword']);
Route::post('/change-password', [UserController::class, 'changePassword']);
