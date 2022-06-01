<?php

use App\Auth\AuthenticationController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EnregistrementBeneficiaireController;
use App\Http\Controllers\EnregistrementCoutController;
use App\Http\Controllers\EnregistrementPrestationController;
use App\Http\Controllers\MutuelleDeSanteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('hello-word', function () {
    return 'hello';
});
Route::post('auth/login', [AuthenticationController::class, 'login']);
Route::post('auth/logout', [AuthenticationController::class, 'logout']);
Route::post('auth/register/{id}', [AuthenticationController::class, 'register']);
Route::get('register/check', 'App\Auth\VerificationController@check')->name('register.check');
Route::get('register/update', 'App\Auth\VerificationController@update')->name('register.update');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('email/verify', 'App\Auth\VerificationController@verify')->name('email.verify');
    Route::get('user/{user}/email/resend', 'App\Auth\VerificationController@resend')->name('email.resend');

    Route::post('users/{user}/account-edit', [UserController::class, 'accountEdit']);


    Route::apiResource('users', 'App\Http\Controllers\UserController');
    Route::apiResource('type-mutuelles', 'App\Http\Controllers\TypeMutuelleDeSanteController');
    Route::apiResource('type-prestations', 'App\Http\Controllers\TypePrestationController');
    Route::apiResource('regions', 'App\Http\Controllers\RegionController');

    Route::apiResource('enregistrement-couts', 'App\Http\Controllers\EnregistrementCoutController');
    Route::apiResource('enregistrement-prestations', 'App\Http\Controllers\EnregistrementPrestationController');
    Route::apiResource('enregistrement-beneficiaires', 'App\Http\Controllers\EnregistrementBeneficiaireController');
    Route::post('enregistrement-couts/bulk', [EnregistrementCoutController::class, 'storeBulkEnregistrement']);
    Route::post('enregistrement-prestations/bulk', [EnregistrementPrestationController::class, 'storeBulkEnregistrement']);
    Route::post('enregistrement-beneficiaires/bulk', [EnregistrementBeneficiaireController::class, 'storeBulkEnregistrement']);

    Route::get('regions/{region}/departements', [DepartementController::class, 'getByRegion']);
    Route::apiResource('departements', 'App\Http\Controllers\DepartementController');

    Route::get('departements/{departement}/communes', [CommuneController::class, 'getByDepartement']);
    Route::apiResource('communes', 'App\Http\Controllers\CommuneController');

    Route::get('communes/{commune}/types/{type}/mutuelles', [MutuelleDeSanteController::class, 'getByCommuneAndByType']);
    Route::apiResource('mutuelles', 'App\Http\Controllers\MutuelleDeSanteController');
});
