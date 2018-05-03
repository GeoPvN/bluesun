<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminNewsController extends Controller
{

    public function index()
    {

        $services = DB::table('services')
            ->leftJoin('photos', 'services.photo_id', '=', 'photos.id')
            ->select('services.*', 'photos.name as p_name')
            ->get();

        return view('admin.news.index', compact('services'));

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

                $user = Services::create($input);


                return response($user);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request)
    {

        $service = Services::findOrFail($request->hidden_id);


        $validator = Validator::make($request->all(),[

            'name' => 'required|string'

        ]);

        $input = $request->all();

        if($validator->passes())
        {

            if($request->ajax()) {

                if ($file = $request->file('photo_id')) {

                    if ($service->photo_id != 0) {

                        $old_photo = Photo::findOrFail($service->photo_id);

                        unlink(public_path() .'/images/'. $old_photo->name);

                        Photo::findOrFail($service->photo_id)->delete();

                    }

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images', $name);

                    $photo = Photo::create(['name' => $name]);

                    $input['photo_id'] = $photo->id;

                }

                $service->update($input);

                return response($service);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $aervices = DB::table('services')
            ->leftJoin('photos', 'services.photo_id', '=', 'photos.id')
            ->select('services.*', 'photos.name as p_name')
            ->orderBy('services.id','desc')
            ->get();

        return response($aervices);

    }

    public function edit(Request $request)
    {

        $aervices = DB::table('services')
            ->leftJoin('photos', 'services.photo_id', '=', 'photos.id')
            ->select('services.*', 'photos.name as p_name')
            ->where('services.id', '=', $request->id)
            ->first();

        return response()->json($aervices);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            DB::table('services')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }

}
