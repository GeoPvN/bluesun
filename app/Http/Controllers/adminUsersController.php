<?php

namespace App\Http\Controllers;

use App\Member;
use App\Photo;
use App\Sex;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class adminUsersController extends Controller
{

    public function index(){

        $sex = Sex::all();

        $member = Member::all();

        $users = DB::table('users')
            ->leftJoin('sex', 'users.sex_id', '=', 'sex.id')
            ->leftJoin('member', 'users.member_id', '=', 'member.id')
            ->leftJoin('photos', 'users.photo_id', '=', 'photos.id')
            ->join('active', 'users.active_id', '=', 'active.id')
            ->select('users.*', 'member.name as m_name', 'sex.name as s_name', 'active.name as a_name', 'photos.name as p_name')
            ->orderBy('users.id','DESC')
            ->get();

        return view('admin.users.index', compact('sex', 'member', 'users'));

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'fname' => 'required|string',
            'lname' => 'required|string',
            'date' => 'required|date',
            'sex_id' => 'required',
            'member_id' => 'required',
            'name' => 'required|string|max:12',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        if($validator->passes())
        {

            if($request->ajax())
            {

                $input = $request->all();

                $input['password'] = bcrypt($request->password);

                if($file = $request->file('photo_id')){

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images',$name);

                    $photo = Photo::create(['name'=>$name]);

                    $input['photo_id'] = $photo->id;

                }

                $user = User::create($input);

                return response($user);

            }

        }

        return response()->json(['error'=>$validator->errors()->all()]);

    }

    public  function  update(Request $request){

        $validator = Validator::make($request->all(),[

            'fname' => 'required|string',
            'lname' => 'required|string',
            'date' => 'required|date',
            'sex_id' => 'required',
            'member_id' => 'required',
            'name' => 'required|string|max:12'

        ]);

        $user = User::findOrFail($request->hidden_id);

        if(trim($request->password) == '')
        {

            $input = $request->except('password');

            $validator = Validator::make($request->all(),[

                'fname' => 'required|string',
                'lname' => 'required|string',
                'date' => 'required|date',
                'sex_id' => 'required',
                'member_id' => 'required',
                'name' => 'required|string|max:12'

            ]);

        }
        else
        {

            $validator = Validator::make($request->all(),[

                'fname' => 'required|string',
                'lname' => 'required|string',
                'date' => 'required|date',
                'sex_id' => 'required',
                'member_id' => 'required',
                'name' => 'required|string|max:12',
                'password' => 'required|string|min:6|confirmed'

            ]);

            $input = $request->all();

            $input['password'] = bcrypt($request->password);

        }

        if($validator->passes())
        {

            if($request->ajax()) {

                if ($file = $request->file('photo_id')) {

                    if ($user->photo_id != 0) {

                        $old_photo = Photo::findOrFail($user->photo_id);

                        unlink(public_path() .'/images/'. $old_photo->name);

                        Photo::findOrFail($user->photo_id)->delete();

                    }

                    $name = time() . $file->getClientOriginalName();

                    $file->move('images', $name);

                    $photo = Photo::create(['name' => $name]);

                    $input['photo_id'] = $photo->id;

                }

                $user->update($input);

                return response($user);

            }
        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function loadTable()
    {

        $users = DB::table('users')
                    ->leftJoin('sex', 'users.sex_id', '=', 'sex.id')
                    ->leftJoin('member', 'users.member_id', '=', 'member.id')
                    ->leftJoin('photos', 'users.photo_id', '=', 'photos.id')
                    ->join('active', 'users.active_id', '=', 'active.id')
                    ->select('users.*', 'member.name as m_name', 'sex.name as s_name', 'active.name as a_name', 'photos.name as p_name')
                    ->orderBy('users.id','desc')
                    ->get();

        return response($users);

    }

    public function edit(Request $request)
    {

        $user = DB::table('users')
                    ->leftJoin('sex', 'users.sex_id', '=', 'sex.id')
                    ->leftJoin('member', 'users.member_id', '=', 'member.id')
                    ->leftJoin('photos', 'users.photo_id', '=', 'photos.id')
                    ->join('active', 'users.active_id', '=', 'active.id')
                    ->select('users.*', 'member.name as m_name', 'sex.name as s_name', 'active.name as a_name', 'photos.name as p_name')
                    ->where('users.id', '=', $request->id)
                    ->first();

        return response()->json($user);

    }

    public function delete(Request $request)
    {
        if($request->ajax()) {
            $user = DB::table('users')
                ->whereIn('id', $request->id)
                ->delete();

            return response()->json($request);
        }

    }

}
