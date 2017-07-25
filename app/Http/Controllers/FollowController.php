<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Follow;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input;
class FollowController extends Controller
{
    //

    public function do_follow(Request $req){

        if(Auth::check()){
            $user_id = Auth::user()->id;
            $interest = new Follow;
            $interest->following_id = $req->following_id;

            $interest->user_id = $user_id ;
            $interest->save();

            return response()->json($interest);


        }else{
            return redirect()->guest('login');
        }// end else


    }// end method

    public function remove_follow(Request $req){
        if(Auth::check()){
            $user_id = Auth::user()->id;
            DB::table('users-followings')->where('user_id', '=', $user_id)->delete();
            return response()->json();
        }else{
            return redirect()->guest('login');
        }// end else
    }// end method


}// end class
