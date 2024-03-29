<?php

use App\Http\Controllers\AuditoryController;
use App\Http\Controllers\BeltAuditoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GeneralCountAuditoryController;
use App\Http\Controllers\HelmetAuditoryController;
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

    Route::get('/auditory/list', [AuditoryController::class, 'getList']);
    Route::get('/auditory/detail/{id}', [AuditoryController::class, 'getDetail']);
    Route::get('/auditory/pdf/{id}', [AuditoryController::class, 'downloadPdf']);
    Route::post('/auditory/import', [AuditoryController::class, 'import']);
    Route::post('/auditory/upload-auditory-evidence', [AuditoryController::class, 'uploadAuditoryEvidence']);
    Route::post('/auditory/upload-answer-evidence', [AuditoryController::class, 'uploadAnswerEvidence']);

    Route::get('/helmet-auditory/list', [HelmetAuditoryController::class, 'getList']);
    Route::get('/helmet-auditory/detail/{id}', [HelmetAuditoryController::class, 'getDetail']);
    Route::get('/helmet-auditory/pdf/{id}', [HelmetAuditoryController::class, 'downloadPdf']);
    Route::post('/helmet-auditory/import', [HelmetAuditoryController::class, 'import']);
    Route::post('/helmet-auditory/upload-auditory-evidence', [HelmetAuditoryController::class, 'uploadAuditoryEvidence']);

    Route::get('/belt-auditory/list', [BeltAuditoryController::class, 'getList']);
    Route::get('/belt-auditory/detail/{id}', [BeltAuditoryController::class, 'getDetail']);
    Route::get('/belt-auditory/pdf/{id}', [BeltAuditoryController::class, 'downloadPdf']);
    Route::post('/belt-auditory/import', [BeltAuditoryController::class, 'import']);
    Route::post('/belt-auditory/upload-auditory-evidence', [BeltAuditoryController::class, 'uploadAuditoryEvidence']);

    Route::get('/general-count-auditory/list', [GeneralCountAuditoryController::class, 'getList']);
    Route::get('/general-count-auditory/detail/{id}', [GeneralCountAuditoryController::class, 'getDetail']);
    Route::get('/general-count-auditory/pdf/{id}', [GeneralCountAuditoryController::class, 'downloadPdf']);
    Route::post('/general-count-auditory/import', [GeneralCountAuditoryController::class, 'import']);
    Route::post('/general-count-auditory/upload-auditory-evidence', [GeneralCountAuditoryController::class, 'uploadAuditoryEvidence']);
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/confirm-email', [UserController::class, 'confirmEmail']);
Route::post('/forget-password', [UserController::class, 'forgetPassword']);
Route::post('/change-password', [UserController::class, 'changePassword']);

// Web Panel
Route::get('/dashboard/all-locations', [GeneralController::class, 'getAllLocations']);
Route::get('/dashboard/auditory-locations/{date}', [GeneralController::class, 'getAuditoryLocations']);
Route::get('/dashboard/belt-locations/{date}', [GeneralController::class, 'getBeltLocations']);
Route::get('/dashboard/helmet-locations/{date}', [GeneralController::class, 'getHelmetLocations']);
Route::get('/dashboard/general-locations/{date}', [GeneralController::class, 'getGeneralLocations']);

Route::post('/w-auditory/list', [AuditoryController::class, 'getPaginatedList']);
Route::get('/w-auditory/detail/{id}', [AuditoryController::class, 'getWebDetail']);
Route::get('/w-auditory/pdf/{id}', [AuditoryController::class, 'downloadWebPdf']);

Route::post('/w-helmet/list', [HelmetAuditoryController::class, 'getPaginatedList']);
Route::get('/w-helmet/detail/{id}', [HelmetAuditoryController::class, 'getWebDetail']);
Route::get('/w-helmet/pdf/{id}', [HelmetAuditoryController::class, 'downloadWebPdf']);

Route::post('/w-belt/list', [BeltAuditoryController::class, 'getPaginatedList']);
Route::get('/w-belt/detail/{id}', [BeltAuditoryController::class, 'getWebDetail']);
Route::get('/w-belt/pdf/{id}', [BeltAuditoryController::class, 'downloadWebPdf']);

Route::post('/w-general/list', [GeneralCountAuditoryController::class, 'getPaginatedList']);
Route::get('/w-general/detail/{id}', [GeneralCountAuditoryController::class, 'getWebDetail']);
Route::get('/w-general/pdf/{id}', [GeneralCountAuditoryController::class, 'downloadWebPdf']);
