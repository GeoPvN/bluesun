<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Leagues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminLeaguesController extends Controller
{

    public function index()
    {

        $leagues = Leagues::all();

        return view('admin.leagues.index', compact('leagues'));

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'name' => 'required|string',
            'division' => 'required|string',
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

                $user = Leagues::create($input);


                return response($user);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $league = Leagues::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string',
            'division' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {

                if ($file = $request->file('photo_id')) {

                    if ($league->photo_id != 0) {

                        $old_photo = Photo::findOrFail($league->photo_id);

                        unlink(public_path() .'/images/'. $old_photo->name);

                        Photo::findOrFail($league->photo_id)->delete();

                    }

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images', $name);

                    $photo = Photo::create(['name' => $name]);

                    $input['photo_id'] = $photo->id;

                }

                $league->update($input);

                return response($league);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $leagues = DB::table('leagues')
            ->leftJoin('photos', 'leagues.photo_id', '=', 'photos.id')
            ->select('leagues.*', 'photos.name as p_name')
            ->orderBy('leagues.id','desc')
            ->get();

        return response($leagues);

    }

    public function edit(Request $request)
    {

        $leagues = DB::table('leagues')
            ->leftJoin('photos', 'leagues.photo_id', '=', 'photos.id')
            ->select('leagues.*', 'photos.name as p_name')
            ->where('leagues.id', '=', $request->id)
            ->first();

        return response()->json($leagues);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            DB::table('leagues')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }

}
