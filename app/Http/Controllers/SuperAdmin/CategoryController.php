<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function Category()
    {
        return view('superadmin-side.category.index');
    }

    public function getCategory(Request $request)
    {
        return Category::getCategory();
    }

    public function storeCategory(Request $request)
    {
        return Category::storeCategory($request);
    }

    public function editCategory(Request $request)
    {
        return Category::editCategory($request->id);
    }

    public function updateCategory(Request $request)
    {
        return Category::updateCategory($request);
    }

    public function deleteCategory(Request $request)
    {
        return Category::deleteCategory($request->id);
    }

    //Sub Category Functons
    public function SubCategory()
    {
        $data['categories'] = Category::all();
        return view('superadmin-side.subcategory.index', compact('data'));
    }

    public function getSubCategory()
    {
        return SubCategory::getSubCategory();
    }

    public function storeSubCategory(Request $request)
    {
        return SubCategory::storeSubCategory($request);
    }

    public function editSubCategory(Request $request)
    {
        return SubCategory::editSubCategory($request->id);
    }

    public function updateSubCategory(Request $request)
    {
        return SubCategory::updateSubCategory($request);
    }

    public function deleteSubCategory(Request $request)
    {
        return SubCategory::deleteSubCategory($request->id);
    }
}
