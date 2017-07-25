<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Hamadas;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
class HamadaController extends Controller
{
    //

    public function index(Request $request){
        //$records = Hamadas::all();
        //return view('hamada')->with(['records' => $records]);

            $rules = array (
                'name' => 'required'
            );
            $validator = Validator::make ( Input::all (), $rules );
            if ($validator->fails ())
                return Response::json ( array (

                    'errors' => $validator->getMessageBag ()->toArray ()
                ) );
            else {
                $data = new Hamadas() ;
                $data->Firstname = $request->name;

                $data->save ();
                return response ()->json ( $data );
            }

    }
    public function read(Request $req) {
        $data = Hamadas::all ();
        return view ( 'hamada' )->withData ( $data );
    }
}// end class
