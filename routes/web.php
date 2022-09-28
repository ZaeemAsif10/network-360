<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\WebController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::controller(WebController::class)->group(function () {

    Route::get('/','index');
    Route::get('home-details/{id}','homeDetails');
    Route::get('agents','Agents');
    Route::get('view-agent-detail/{id}','viewAgentDetail');
    Route::get('property','Property');

    Route::get('projects','Projects');

});
