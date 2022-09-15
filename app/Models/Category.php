<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    use HasFactory;

    public static function getCategory()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public static function storeCategory(Request $request)
    {
        $data = $request->all();

        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return response()->json([
            'status' => 200,
            'message' => 'Category Added Sucessfully',
        ]);
    }

    public static function editCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category,
        ]);
    }

    public static function updateCategory($request)
    {
        $data = $request->all();

        $rules = array(
            'name' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $category = Category::find($request->category_id);
        $category->name = $request->name;
        $category->update();

        return response()->json([
            'status' => 200,
            'message' => 'Category Update Sucessfully',
        ]);
    }

    public static function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category->delete())
        {
            return response()->json([
                'status' => 200,
                'message' => 'Category Delete Sucessfully',
            ]);
        }
    }
}
