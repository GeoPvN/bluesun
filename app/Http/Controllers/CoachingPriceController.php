<?php

namespace App\Http\Controllers;

use App\CoachingPrice;
use App\Leagues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CoachingPriceController extends Controller
{
    public function index()
    {

        $divisions = CoachingPrice::all();

        $leagues = Leagues::all();

        return view('admin.division.index', compact('divisions','leagues'));

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'name' => 'required|string',
            'league_id' => 'required|string',
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

                $user = CoachingPrice::create($input);


                return response($user);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $league = CoachingPrice::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string',
            'league_id' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {

                $league->update($input);

                return response($league);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $divisions = DB::table('divisions')
            ->leftJoin('leagues', 'divisions.league_id', '=', 'leagues.id')
            ->leftJoin('photos', 'divisions.photo_id', '=', 'photos.id')
            ->select('divisions.*', 'photos.name as p_name', 'leagues.name as league')
            ->orderBy('divisions.id','desc')
            ->get();

        return response($divisions);

    }

    public function edit(Request $request)
    {

        $divisions = DB::table('divisions')
            ->leftJoin('photos', 'divisions.photo_id', '=', 'photos.id')
            ->select('divisions.*', 'photos.name as p_name')
            ->where('divisions.id', '=', $request->id)
            ->first();

        return response()->json($divisions);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            DB::table('divisions')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }
}
