<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyValue;
use App\Models\SubCategory;
use App\Models\SubCategoryFeature;
use Illuminate\Http\Request;

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
        $data['details'] = Property::where('id',$id)->first();
        $data['details_images'] = PropertyImage::where('property_id', $id)->get();
        $data['details_features'] = SubCategoryFeature::where('subcate_id', $data['details']->subcate_id)->get();
        $data['sub_cates'] = Property::where('subcate_id',$data['details']->subcate_id)->get();
        return view('web-side.details', compact('data'));
    }
}
