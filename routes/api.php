<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\SuggestionController;

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



    // Projects Routes
    Route::resource('projects', ProjectController::class);

    // Tests Routes (Nested under Projects)
    Route::resource('projects.tests', TestController::class);

    // Codes Routes (Nested under Tests)
    Route::resource('projects.tests.codes', CodeController::class);

    // Suggestions Routes (Not nested under Codes)
    Route::resource('suggestions', SuggestionController::class);

