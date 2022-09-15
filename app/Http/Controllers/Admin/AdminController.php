<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-side.index');
    }

    public function Agents()
    {
        $data['agent_properties'] = Property::propertyList();
        return view('admin-side.agents.index', compact('data'));
    }

    public function createAgentsProperty()
    {
        $data['sub_categories'] = SubCategory::createProperty();
        return view('admin-side.agents.create_agent_property', compact('data'));
    }

    public function storeAgentsProperty(Request $request)
    {
        return Property::storeProperty($request);
    }

    public function agentsPropertyDetail($id)
    {
        $data['agent_details'] = Property::find($id);
        $data['agent_details_images'] = PropertyImage::where('property_id', $id)->get();
        $data['agent_details_values'] = PropertyValue::where('property_id', $id)->get();
        return view('admin-side.agents.agent_property_details', compact('data'));
    }
}
