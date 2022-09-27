<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function Agent()
    {
        return view('superadmin-side.agent.index');
    }

    public function getAgent(Request $request)
    {
        return Agent::getAgent();
    }

    public function storeAgent(Request $request)
    {
        return Agent::storeAgent($request);
    }

    public function editAgent(Request $request)
    {
        $agent = Agent::find($request->id);
        return response()->json([
            'agent' => $agent,
        ]);
    }

    public function updateAgent(Request $request)
    {
        $data = $request->all();

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'joined_date' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $agent = Agent::find($request->edit_agent_id);
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->joined_date = $request->joined_date;

        if ($request->hasFile('image')) {

            $path = 'storage/app/public/uploads/agents/' . $agent->image;
            if (File::exists($path)) {
                File::delete($path);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/app/public/uploads/agents/', $filename);
            $agent->image = $filename;
        }

        $agent->update();

        return response()->json([
            'status' => 200,
            'message' => 'Agent Update Sucessfully',
        ]);
    }

    public function deleteAgent(Request $request)
    {
        $agent = Agent::find($request->id);
        if($agent){
            $path = 'storage/app/public/uploads/agents/' . $agent->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $agent->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Agent Delete Successfully',
            ]);
        }
    }
}
