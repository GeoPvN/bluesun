<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminIndexController extends Controller
{

    public function index()
    {

        $order = Order::orderBy('id', 'desc')->get();

        return view('admin.index', compact( 'order'));

    }

    public  function  update(Request $request){

        $order = Order::find($request->hidden_id);

        $validator = Validator::make($request->all(),[

            'status' => 'required'

        ]);
        
        if($validator->passes())
        {

            if($request->ajax()) {

                $order->status = $request->status;

                $order->save();

                return response($order);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $order = Order::orderBy('id','desc')->get();

        return response($order);

    }

    public function edit(Request $request)
    {

        $order = Order::where('id', '=', $request->id)
            ->with('nleague')
            ->with('cleague')
            ->with('ndivision')
            ->with('cdivision')
            ->with('server')
            ->with('queue')
            ->first();

        return response()->json($order);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            $order = Order::find($request->id)->delete();

            return response()->json($order);
        }

    }

}
