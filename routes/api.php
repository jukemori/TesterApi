<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\API\AuthController;

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
    Route::middleware('auth:sanctum')->group(function () {
        // Your protected routes here
        Route::resource('projects', ProjectController::class);
    
        Route::resource('projects.tests', TestController::class);

        // Explicitly define the route for codes using parameters {projectId} and {testId}
        Route::get('projects/{projectId}/tests/{testId}/codes', [CodeController::class, 'index']);
        Route::post('projects/{projectId}/tests/{testId}/codes', [CodeController::class, 'store']);
        Route::delete('projects/{projectId}/tests/{testId}/codes/{codeId}', [CodeController::class, 'destroy']);
        Route::resource('projects.tests.codes', CodeController::class);
    });
    
    

    Route::resource('suggestions', SuggestionController::class);

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
    });

