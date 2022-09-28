<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class SubCategoryFeature extends Model
{
    use HasFactory;

    public static function getFeature()
    {
        $feature = SubCategoryFeature::with('subcat')->get();
        return $feature;
    }

    public static function storeFeature($request)
    {
        if ($request->feature != NULL) {
            $size = count($request->feature);

            $data = $request->all();

            $rules = array(
                'subcate_id' => 'required',
                'feature' => 'required',
            );

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()->all()]);
            }

            $c = 0;
            if ($request->has('icon')) {
                $c++;
                foreach ($request->file('icon') as $image) {
                    $uniqueid = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $name = Carbon::now()->format('Ymd') . '_' . $c . $uniqueid . '.' . $extension;
                    $path = $image->storeAs('storage/app/public/uploads/icons/', $name);
                }
                for ($i = 0; $i < $size; $i++) {
                    $feature = new SubCategoryFeature();
                    $feature->icon = $name;
                    $feature->subcate_id = $request->subcate_id;
                    $feature->feature = $request->feature[$i];
                    $feature->save();
                }
            }

            return response()->json([
                'status' => 200,
                'success' => 'Feature Added Sucessfully',
            ]);
        }
    }

    public static function editFeature($id)
    {
        $feature = SubCategoryFeature::find($id);
        $sub_category = SubCategory::all();
        return response()->json([
            'feature' => $feature,
            'sub_category' => $sub_category,
        ]);
    }

    public static function updateFeature($request)
    {
        $data = $request->all();
        $rules = array(
            'subcate_id' => 'required',
            'feature' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $feature = SubCategoryFeature::find($request->feature_id);
        $feature->subcate_id = $request->subcate_id;
        $feature->feature = $request->feature;
        $feature->update();

        return response()->json([
            'status' => 200,
            'success' => 'Feature Update Sucessfully',
        ]);
    }

    public static function deleteFeature($id)
    {
        $category = SubCategoryFeature::find($id);
        if ($category->delete()) {
            return response()->json([
                'status' => 200,
                'success' => 'Feature Delete Sucessfully',
            ]);
        }
    }

    public static function getSubCateFeature(Request $request)
    {
        return SubCategoryFeature::where('subcate_id', $request->subcate_id)->get();
    }



    // Relation with Sub Category
    public function subcat()
    {
        return $this->belongsTo(SubCategory::class, 'subcate_id', 'id');
    }
}
