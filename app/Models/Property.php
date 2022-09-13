<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $fillable = [
        'subcate_id',
        'name',
        'price',
        'property_type',
        'cover_image',
        'video',
    ];

    public static function storeProperty(Request $request)
    {
        if ($request->values != NULL) {

            $size = count($request->values);

            $validatedData = $request->validate([
                'subcat_id' => 'required',
                'name' => 'required',
                'price' => 'required',
                'property_type' => 'required',
                'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'video' => 'mimes:mp4,mov,ogg | max:20000',
                'multi_images' => 'required',
                'values' => 'required',
              ]);

            $prop = new Property();
            $prop->subcate_id = $request->subcat_id;
            $prop->name = $request->name;
            $prop->price = $request->price;
            $prop->property_type = $request->property_type;
            //Cover image store with base64
            $cover_image = base64_encode(file_get_contents($request->file('cover_image')));

            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('storage/app/public/uploads/property/', $filename);
                $prop->video = $filename;
            }
            $prop->cover_image = $cover_image;
            $prop->save();




            //Save Multiple images of Property
            $c = 0;
            if ($request->has('multi_images')) {
                $c++;
                foreach ($request->file('multi_images') as $image) {

                    $uniqueid = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $name = Carbon::now()->format('Ymd') . '_' . $c . $uniqueid . '.' . $extension;
                    $path = $image->storeAs('public/uploads/', $name);

                    $image = new PropertyImage();
                    $image->multi_images = $name;
                    $image->property_id = $prop->id;
                    $image->save();
                }
            }


            //Save Multiple Variation of Property
            for ($i = 0; $i < $size; $i++) {
                $prop_value = new PropertyValue();
                $prop_value->property_id = $prop->id;
                $prop_value->subcate_feature_id = $request->subcate_feature_id[$i];
                $prop_value->values = $request->values[$i];
                $prop_value->save();
            }

            return back()->with('success', 'Property Added Successfully');
        } else {
            $prop = new Property();
            $prop->subcate_id = $request->subcat_id;
            $prop->name = $request->name;
            $prop->price = $request->price;
            $prop->property_type = $request->property_type;
            //Cover image store with base64
            $cover_image = base64_encode(file_get_contents($request->file('cover_image')));

            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('storage/app/public/uploads/property/', $filename);
                $prop->video = $filename;
            }
            $prop->cover_image = $cover_image;

            $prop->save();

            //Save Multiple images of Property
            $c = 0;
            if ($request->has('multi_images')) {
                $c++;
                foreach ($request->file('multi_images') as $image) {

                    $uniqueid = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $name = Carbon::now()->format('Ymd') . '_' . $c . $uniqueid . '.' . $extension;
                    $path = $image->storeAs('public/uploads/', $name);

                    $image = new PropertyImage();
                    $image->multi_images = $name;
                    $image->property_id = $prop->id;
                    $image->save();
                }
            }

            return back()->with('success', 'Property Added Successfully');
        }
    }


    // Relation with Sub Category
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcate_id','id');
    }
}
