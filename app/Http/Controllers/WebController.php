<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Project;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

use function PHPUnit\Framework\returnSelf;

class WebController extends Controller
{
    public function index()
    {
        $data['properties'] = Property::propertyList();
        return view('web-side.index', compact('data'));
    }

    public function homeDetails($id)
    {
        $data['details'] = Property::where('id', $id)->first();
        $data['details_images'] = PropertyImage::where('property_id', $id)->get();
        $data['details_features'] = SubCategoryFeature::where('subcate_id', $data['details']->subcate_id)->get();
        $data['sub_cates'] = Property::where('subcate_id', $data['details']->subcate_id)->get();
        return view('web-side.details', compact('data'));
    }

    public function Agents()
    {
        $data['agents'] = Agent::all();
        return view('web-side.agents.index', compact('data'));
    }

    public function viewAgentDetail($id)
    {
        $data['details'] = Agent::find($id);
        $data['pro_by_agents']  = Property::where('agent_id',$data['details']->id)->get();
        return view('web-side.agents.view_detail', compact('data'));
    }

    public function Property()
    {
        $data['properties'] = Property::propertyList();
        return view('web-side.property.index', compact('data'));
    }

    public function Projects()
    {
        $data['projects'] = Project::all();
        return view('web-side.project.index', compact('data'));
    }
}
