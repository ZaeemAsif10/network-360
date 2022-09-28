<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function projectList()
    {
        $data['projects'] = Project::projectList();
        return view('superadmin-side.projects.index', compact('data'));
    }

    public function createProject()
    {
        $data['sub_categories'] = SubCategory::createProperty();
        return view('superadmin-side.projects.create_projects', compact('data'));
    }

    public function storeProject(Request $request)
    {
        return Project::storeProject($request);
    }

    public function editProject(Request $request)
    {
        $data['project'] = Project::find($request->id);
        $data['subcates'] = SubCategory::all();
        return view('superadmin-side.projects.edit', compact('data'));
    }

    public function updateProject(Request $request)
    {
        return Project::updateProject($request);
    }

    public function deleteProject(Request $request)
    {
        $project = Project::find($request->id);
        if ($project) {
            $path = 'storage/app/public/uploads/project/' . $project->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $project->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Project Delete Successfully',
        ]);
    }
}
