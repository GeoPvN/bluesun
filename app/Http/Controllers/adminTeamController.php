<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Position;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminTeamController extends Controller
{

    public function index()
    {

        $teams = DB::table('teams')
            ->leftJoin('photos', 'teams.photo_id', '=', 'photos.id')
            ->leftJoin('positions', 'teams.position_id', '=', 'positions.id')
            ->select('teams.*', 'photos.name as p_name', 'positions.name as position_name')
            ->get();

        $positions = Position::all();

        return view('admin.team.index', compact('teams','positions'));

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

                $user = Team::create($input);


                return response($user);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $team = Team::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {

                if ($file = $request->file('photo_id')) {

                    if ($team->photo_id != 0) {

                        $old_photo = Photo::findOrFail($team->photo_id);

                        unlink(public_path() .'/images/'. $old_photo->name);

                        Photo::findOrFail($team->photo_id)->delete();

                    }

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images', $name);

                    $photo = Photo::create(['name' => $name]);

                    $input['photo_id'] = $photo->id;

                }

                $team->update($input);

                return response($team);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $aervices = DB::table('teams')
            ->leftJoin('photos', 'teams.photo_id', '=', 'photos.id')
            ->leftJoin('positions', 'teams.position_id', '=', 'positions.id')
            ->select('teams.*', 'photos.name as p_name', 'positions.name as position_name')
            ->orderBy('teams.id','desc')
            ->get();

        return response($aervices);

    }

    public function edit(Request $request)
    {

        $aervices = DB::table('teams')
            ->leftJoin('photos', 'teams.photo_id', '=', 'photos.id')
            ->select('teams.*', 'photos.name as p_name')
            ->where('teams.id', '=', $request->id)
            ->first();

        return response()->json($aervices);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            DB::table('teams')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }

}
