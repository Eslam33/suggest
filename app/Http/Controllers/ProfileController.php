<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Users;
use App\Posts;
use Validator;
use Response;
//use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $userdata = DB::table('users')->where('id' ,$user_id )->get()->first();
            $posts =  DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->where('user_id' ,$user_id )->orderBy('posts.id', 'desc')->get();
            $topics = DB::table('users-interestings')->where('user_id' ,$user_id )->get();
            $following = DB::table('users-followings')->join('users', 'users.id', '=', 'users-followings.following_id')->where('user_id' ,$user_id )->get();
            $followers = DB::table('users-followings')->join('users', 'users.id', '=', 'users-followings.user_id')->where('following_id' ,$user_id )->get();
            return view('profile')->with(['userdata' => $userdata , 'posts' => $posts , 'topics' => $topics , 'following' => $following , 'followers' => $followers]);

        }else{
            return redirect()->guest('login');
        }

    }// end function

    public function update(Request $req){

        $rules = array(

            'user_name'  => 'required|min:2|unique:users,name',
            'email'            => 'required|email',
            'current_job'             => 'required',
            'previous_job'             => 'required'
        );
        $validator = Validator::make(Input::all(), $rules );
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            if(Auth::check()){

                $user_id = Auth::user()->id;

                $result1 = DB::table('users')->where('id', $user_id)->update(['name' => $req->user_name , 'email' => $req->email , 'current_job' => $req->current_job , 'previous_job' => $req->previous_job ]);


                return response()->json(['name' => $req->user_name , 'email' => $req->email , 'current_job' => $req->current_job , 'previous_job' => $req->previous_job ]);
            }else{
                return redirect()->guest('login');
            }

        }// end else*/
////////////////////////////////////////

    }// end update function


    public function user_profile($id){
        if(Auth::check()){
            $my_id = Auth::user()->id;
            $user_name = $id;
            $userdata = DB::table('users')->where('name' ,$user_name )->get()->first();
            $user_id = $userdata->id;
            if($user_id == $my_id){
                return redirect('/profile');
            }
            $posts =  DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->where('user_id' ,$user_id )->get();
            $topics = DB::table('users-interestings')->where('user_id' ,$user_id )->get();
            $user_following = DB::table('users-followings')->where([['user_id', '=', $my_id], ['following_id', '=', $user_id]])->first();
            $following = DB::table('users-followings')->join('users', 'users.id', '=', 'users-followings.following_id')->where('user_id' ,$user_id )->get();
            $followers = DB::table('users-followings')->join('users', 'users.id', '=', 'users-followings.user_id')->where('following_id' ,$user_id )->get();

            return view('user_profile')->with(['userdata' => $userdata , 'posts' => $posts , 'topics' => $topics , 'user_following' => $user_following , 'following' => $following , 'followers' => $followers]);


        }else{
            return redirect()->guest('login');
        }
    }// end function

    public function edit(Request $request){

        $rules = array(
            'name'             => 'required|max:50|alpha_num',
            'email'            => 'required|alpha_num',
            'password'         => 'required|max:50|min:5|alpha_num',
            'Carrier'             => 'required|max:50|alpha_num',
            'current_job'             => 'required|max:50|alpha_num',
            'previous_job'             => 'required|max:50|alpha_num',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Users();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = $request->password;
            $data->carrier = $request->carrier;
            $data->Current_job = $request->current_job;
            $data->pervious_job = $request->pervious_job;
            $data->timestamp = timestamp();

            $data->save();

            return response()->json($data);
        }





    }//end edit method






}// end class
