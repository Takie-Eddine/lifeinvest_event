<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleRequest;
use App\Models\Partic;
use App\Models\People;
use Exception;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){

        $data['counter'] = Partic::all()->count();

        return view('people.index',$data);

    }



    public function create(PeopleRequest $request){


        $msg =__('investor.persone');
        $msg1 =__('investor.number');
        $msg2 =__('investor.remember');
        $erroMsg =__('investor.personerror');

        try{

            $people = Partic::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
            ]);

            return redirect()->route('person.index')->with(['success'=> $msg .' '.$msg1.' '.$people->number.' '.$msg2 ]) ;

        }catch(Exception $ex){

            return redirect()->back()->with(['error' => $erroMsg]);

        }




    }
}
