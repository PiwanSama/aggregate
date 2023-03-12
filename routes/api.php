<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\CombinationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;

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
Route::apiResource('subjects', SubjectController::class)->only('index', 'show');
Route::apiResource('combinations', CombinationController::class)->only('index', 'show');
Route::apiResource('field', CombinationController::class)->only('index', 'show');

Route::get('/auth/google/signin', [AuthController::class, 'initiateGoogleLogin']);
Route::get('/auth/google/callback', [AuthController::class, 'googleLoginCallback']);
Route::get('/callback-url', [AuthController::class, 'googleLoginCallback']);
Route::post('/register', [AuthController::class, 'registerUser']);

Route::get('/universities', [UniversityController::class, 'listAll']);
Route::get('/universities/{id}', [UniversityController::class, 'getUniversityProfile']);
Route::get('/universities/faculty/{id}/programs', [FacultyController::class, 'getFacultyPrograms']);
Route::post('/getPointsAdvanced', [CombinationController::class, 'calculatePointsAdvanced']);
Route::post('/getPointsOrdinary', [CombinationController::class, 'calculatePointsOrdinary']);
Route::post('/getWeightsOrdinary', [CombinationController::class, 'calculateWeightsOrdinary']);
Route::post('/sampleMail', [MailController::class, 'notifyNewUser']);