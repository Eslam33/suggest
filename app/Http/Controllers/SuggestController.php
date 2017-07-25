<?php

namespace App\Http\Controllers;

use DB;
use App\Posts;
use App\Topics;
use function Sodium\add;
use Validator;
use Response;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Input;

class SuggestController extends Controller
{
    //

    public function index(){
        return view('suggest');
    }
    // suggest post
    public function create(Request $req){

        $rules = array(
            'content2' => 'bail|required|min:2',
            'topic_name' => 'bail|required|min:2',
        );
        $validator = Validator::make(Input::all(), $rules );
        if ($validator->fails()) {
            return Response::json(array(
                //'errors' => $validator->getMessage()->toArray() ,
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            if(Auth::check()){
                $user_id = Auth::user()->id;
              //  $user_name =Auth::user()->name;
                $topic = new Topics;
                $user_topics = DB::table('topics')->where('name', '=', $req->topic_name)->first();
                if (is_null($user_topics)) {
                    // It does not exist -
                    $topic->name = $req->topic_name;
                    $topic->save();
                }
                // It exists - remove from favorites button will show
                $post = new Posts;
                $post->content = $req->content2;
                $post->topic_name = $req->topic_name;
                $post->user_id = $user_id;
                $post->save();
              //  $post->append('name' , $user_name);
                return response()->json($post );
            }else{
                return redirect()->guest('login');
            }

        }// end else*/

    }// end metod

    public function edit_topic(Request $req){

        $rules = array(
            'e_topic_name' => 'bail|required|min:2|unique:topics,name'
        );
        $validator = Validator::make(Input::all(), $rules );
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            if(Auth::check()){

                $topic = DB::table('topics')
                    ->where('name', $req->e_id_topic)
                    ->update(['name' => $req->e_topic_name]);
                return response()->json($topic);
            }else{
                return redirect()->guest('login');
            }

        }// end else*/

    }// end metod
    public function edit_content(Request $req){

        $rules = array(
            'e_content2' => 'bail|required|min:2'
        );
        $validator = Validator::make(Input::all(), $rules );
        if ($validator->fails()) {
            return Response::json(array(
                'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            if(Auth::check()){

                $post = DB::table('posts')
                    ->where('id', $req->e_id_post)
                    ->update(['content' => $req->e_content2]);

                return response()->json($post);


            }else{
                return redirect()->guest('login');
            }

        }// end else*/

    }// end metod

    public function delete(Request $req)
    {
            //DB::table('topics')->where('name', $req->d_id)->delete();
        DB::table('topics')->where('name', '=', $req->d_id)->delete();


        return response()->json();
    }


}// end class
