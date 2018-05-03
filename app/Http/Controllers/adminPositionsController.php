<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminPositionsController extends Controller
{

    public function index()
    {

        $positions = Position::all();

        return view('admin.positions.index', compact('positions'));

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'name' => 'required|string'

        ]);

        if($validator->passes())
        {

            if($request->ajax())
            {

                $input = $request->all();

                $position = Position::create($input);


                return response($position);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $position = Position::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {


                $position->update($input);

                return response($position);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $position = Position::all();

        return response($position);

    }

    public function edit(Request $request)
    {

        $position = DB::table('positions')
            ->where('id', '=', $request->id)
            ->first();

        return response()->json($position);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            DB::table('positions')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }

}
