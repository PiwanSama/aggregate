<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UniversityController;
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
Route::apiResource('universities', UniversityController::class)->only('index', 'show');
Route::apiResource('combinations', CombinationController::class)->only('index', 'show');
Route::apiResource('field', CombinationController::class)->only('index', 'show');
Route::post('/getPointsAdvanced', [CombinationController::class, 'calculatePointsAdvanced']);
Route::post('/getPointsOrdinary', [CombinationController::class, 'calculatePointsOrdinary']);
Route::post('/getWeightsOrdinary', [CombinationController::class, 'calculateWeightsOrdinary']);
Route::get('/getUniversityDetails', [UniversityController::class, 'universityWithDetails']);

Route::post('/sampleMail', [MailController::class, 'notifyNewUser']);