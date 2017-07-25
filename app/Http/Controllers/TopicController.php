<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Posts;
use App\Interested;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
class TopicController extends Controller
{
    //
    public function index($id){

        $user_id = Auth::user()->id;
        $topic_name = $id;
        $posts =  DB::table('users')->join('posts', 'users.id', '=', 'posts.user_id')->where('topic_name' ,$id )->orderBy('posts.id', 'desc')->get();
        $user_interesting = DB::table('users-interestings')->where([['user_id', '=', $user_id], ['topic_name', '=', $topic_name]])->first();

        return view('topic')->with(['posts' => $posts , 'topic_name' => $topic_name , 'user_interesting' => $user_interesting]);
    }// end method

    public function do_interest(Request $req){

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $interest = new Interested;
            $interest->topic_name = $req->topic_name;

            $interest->user_id = $user_id ;
            $interest->save();

            return response()->json($interest);


        }else{
            return redirect()->guest('login');
        }// end else


    }// end method

    public function remove_interest(Request $req){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            DB::table('users-interestings')->where('user_id', '=', $user_id)->delete();
            return response()->json();
        }else{
            return redirect()->guest('login');
        }// end else
    }// end method
}// end class
