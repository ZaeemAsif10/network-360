<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SuperAdmin\CategoryController;
use App\Http\Controllers\SuperAdmin\PropertyController;
use App\Http\Controllers\SuperAdmin\SuperadminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    // Route::get('/', function () {
    //     return view('auth.login');
    // });

    Route::get('admin/dashboard', [AdminController::class, 'index']);
    Route::get('admin/agents', [AdminController::class, 'Agents']);
    Route::get('create-agents-property', [AdminController::class, 'createAgentsProperty']);
    Route::post('store-agents-property', [AdminController::class, 'storeAgentsProperty']);
    Route::get('agents-property-details/{id}', [AdminController::class, 'agentsPropertyDetail']);

});
