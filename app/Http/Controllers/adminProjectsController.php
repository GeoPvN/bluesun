<?php

namespace App\Http\Controllers;

use App\Photo;
use App\projects;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminProjectsController extends Controller
{

    public function index(){

        $services = Services::all();

        $projects = DB::table('projects')
                    ->leftJoin('photos', 'projects.photo_id', '=', 'photos.id')
                    ->leftJoin('services', 'projects.services_id', '=', 'services.id')
                    ->select('projects.*', 'photos.name as p_name','services.name as s_name')
                    ->get();

        return view('admin.projects.index', compact('projects','services'));

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'name' => 'required|string',
            'photo_id' => 'required'

        ]);

        if($validator->passes())
        {

            if($request->ajax())
            {

                $input = $request->all();

                if($file = $request->file('photo_id')){

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images',$name);

                    $photo = Photo::create(['name'=>$name]);

                    $input['photo_id'] = $photo->id;

                }

                $project = Projects::create($input);

                return response($project);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $project = Projects::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {

                if ($file = $request->file('photo_id')) {

                    if ($project->photo_id != 0) {

                        $old_photo = Photo::findOrFail($project->photo_id);

                        unlink(public_path() .'/images/'. $old_photo->name);

                        Photo::findOrFail($project->photo_id)->delete();

                    }

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images', $name);

                    $photo = Photo::create(['name' => $name]);

                    $input['photo_id'] = $photo->id;

                }

                $project->update($input);

                return response($project);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $aervices = DB::table('projects')
                    ->leftJoin('photos', 'projects.photo_id', '=', 'photos.id')
                    ->leftJoin('services', 'projects.services_id', '=', 'services.id')
                    ->select('projects.*', 'photos.name as p_name','services.name as s_name')
                    ->orderBy('projects.id','desc')
                    ->get();

        return response($aervices);

    }

    public function edit(Request $request)
    {

        $aervices = DB::table('projects')
                    ->leftJoin('photos', 'projects.photo_id', '=', 'photos.id')
                    ->leftJoin('services', 'projects.services_id', '=', 'services.id')
                    ->select('projects.*', 'photos.name as p_name','services.name as s_name')
                    ->where('projects.id', '=', $request->id)
                    ->first();

        return response()->json($aervices);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {

            DB::table('projects')
            ->whereIn('id', $request->id)
            ->delete();

            return response()->json($request);
        }

    }

}
