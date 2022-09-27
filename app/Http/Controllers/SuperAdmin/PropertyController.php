<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PropertyController extends Controller
{
    public function createProperty()
    {
        $data['sub_categories'] = SubCategory::createProperty();
        $data['agents'] = Agent::all();
        return view('superadmin-side.property.create_property', compact('data'));
    }

    public function getSubCateFeature(Request $request)
    {
        return SubCategoryFeature::getSubCateFeature($request);
    }

    public function storeProperty(Request $request)
    {
        return Property::storeProperty($request);
    }

    public function propertyList()
    {
        $data['properties'] = Property::propertyList();
        return view('superadmin-side.property.index', compact('data'));
    }

    public function statusUpdate(Request $request)
    {
        $status_update = Property::where('id', $request->id)->first();
        if ($status_update->status == 1) {
            $status_update->status = 0;
            $status_update->update();
        } else if ($status_update->status == 0) {
            $status_update->status = 1;
            $status_update->update();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Status Update Successfully',
        ]);
    }

    public function propertyDetails($id)
    {
        return Property::propertyDetails($id);
    }
}
