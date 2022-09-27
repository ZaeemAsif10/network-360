<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Project extends Model
{
    use HasFactory;

    public static function projectList()
    {
        return Project::all();
    }

    public static function storeProject(Request $request)
    {
        $request->validate([
            'subcat_id' => 'required',
            'title' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);
        $project = new Project();
        $project->subcat_id = $request->subcat_id;
        $project->title = $request->title;
        $project->location = $request->location;
        $project->lat = $request->lat;
        $project->long = $request->long;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/app/public/uploads/project/', $filename);
            $project->image = $filename;
        }

        $project->save();
        return back()->with('success', 'Project Added Successfully');
    }

    public static function updateProject(Request $request)
    {
        $request->validate([
            'subcat_id' => 'required',
            'title' => 'required',
            'location' => 'required',
            'image' => 'required',
        ]);
        $project = Project::find($request->edit_project_id);
        $project->subcat_id = $request->subcat_id;
        $project->title = $request->title;
        $project->location = $request->location;
        $project->lat = $request->lat;
        $project->long = $request->long;

        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/project/' . $project->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/app/public/uploads/project/', $filename);
            $project->image = $filename;
        }

        $project->update();
        return back()->with('success', 'Project Updated Successfully');
    }


    // Relation with Sub Category
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id', 'id');
    }
}
