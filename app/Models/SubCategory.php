<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategory extends Model
{
    use HasFactory;

    public static function getSubCategory()
    {
        $sub_category = SubCategory::with('category')->get();
        return $sub_category;
    }

    public static function storeSubCategory(Request $request)
    {
        $data = $request->all();

        $rules = array(
            'cate_id' => 'required',
            'name' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $category = new SubCategory();
        $category->cate_id = $request->cate_id;
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 200,
            'message' => 'Sub Category Added Sucessfully',
        ]);
    }

    public static function editSubCategory($id)
    {
        $sub_category = SubCategory::find($id);
        $category = Category::all();
        return response()->json([
            'sub_category' => $sub_category,
            'category' => $category,
        ]);
    }

    public static function updateSubCategory($request)
    {
        $data = $request->all();

        $rules = array(
            'cate_id' => 'required',
            'name' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $category = SubCategory::find($request->sub_category_id);
        $category->cate_id = $request->cate_id;
        $category->name = $request->name;
        $category->update();

        return response()->json([
            'status' => 200,
            'message' => 'Sub Category Update Sucessfully',
        ]);
    }

    public static function deleteSubCategory($id)
    {
        $category = SubCategory::find($id);
        if($category->delete())
        {
            return response()->json([
                'status' => 200,
                'message' => 'Sub Category Delete Sucessfully',
            ]);
        }
    }

    //Relation with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id','id');
    }
}
