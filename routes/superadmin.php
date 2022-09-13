<?php

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

Route::get('superadmin/dashboard', [SuperadminController::class, 'index']);

// Super Admin Categoy
Route::get('superadmin/category', [CategoryController::class, 'Category'])->name('superadmin.category');
Route::get('get-category', [CategoryController::class, 'getCategory']);
Route::post('store-category', [CategoryController::class, 'storeCategory']);
Route::get('edit-category', [CategoryController::class, 'editCategory']);
Route::post('update-category', [CategoryController::class, 'updateCategory']);
Route::get('delete-category', [CategoryController::class, 'deleteCategory']);

// Super Admin Sub Categoy
Route::get('superadmin/sub-category', [CategoryController::class, 'SubCategory']);
Route::get('get-sub-category', [CategoryController::class, 'getSubCategory']);
Route::post('store-sub-category', [CategoryController::class, 'storeSubCategory']);
Route::get('edit-sub-category', [CategoryController::class, 'editSubCategory']);
Route::post('update-sub-category', [CategoryController::class, 'updateSubCategory']);
Route::get('delete-sub-category', [CategoryController::class, 'deleteSubCategory']);

// Super Admin Sub Categoy Feature
Route::get('superadmin/create-feature', [CategoryController::class, 'createFeature']);
Route::post('store-feature', [CategoryController::class, 'storeFeature']);
Route::get('get-feature', [CategoryController::class, 'getFeature']);
Route::get('edit-feature', [CategoryController::class, 'editFeature']);
Route::post('update-feature', [CategoryController::class, 'updateFeature']);
Route::get('delete-feature', [CategoryController::class, 'deleteFeature']);

// Super Admin Property Feature
Route::get('superadmin/create-property', [PropertyController::class, 'createProperty']);
Route::get('get-sub-cate-feature', [PropertyController::class, 'getSubCateFeature']);
Route::post('store-property', [PropertyController::class, 'storeProperty']);
Route::get('property-list', [PropertyController::class, 'propertyList']);
Route::get('status-update', [PropertyController::class, 'statusUpdate']);
