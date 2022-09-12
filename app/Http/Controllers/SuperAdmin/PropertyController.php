<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function createProperty()
    {
        $data['sub_categories'] = SubCategory::all();
        return view('superadmin-side.property.index', compact('data'));
    }

    public function getSubCateFeature(Request $request)
    {
        return SubCategoryFeature::where('subcate_id',$request->subcate_id)->get();
    }

    public function storeProperty(Request $request)
    {
        return dd($request->all());
    }
}
