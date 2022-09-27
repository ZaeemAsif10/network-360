<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Agent extends Model
{
    use HasFactory;

    public static function getAgent()
    {
        $agent = Agent::all();
        return response()->json($agent);
    }

    public static function storeAgent(Request $request)
    {
        $data = $request->all();

        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'joined_date' => 'required',
            'image' => 'required',
        );

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->joined_date = $request->joined_date;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('storage/app/public/uploads/agents/', $filename);
            $agent->image = $filename;
        }

        $agent->save();

        return response()->json([
            'status' => 200,
            'message' => 'Agent Added Sucessfully',
        ]);
    }
}
