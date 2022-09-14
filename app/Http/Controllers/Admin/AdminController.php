<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
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
}
