<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleRequest;
use App\Models\House;
use App\Models\Partic;
use App\Models\People;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){

        //$data['counter'] = Partic::all()->count();
        $data['people'] = Partic::all();
        $data['counter'] = $data['people']->count();
        $data['houses'] = House::orderBy('created_at', 'desc')->first();

        $data['time'] = Carbon::now()->format('H:i:s');
        // $tim = '15:00:00';
        // $data['time2'] = Carbon::createFromFormat('H:i:s',$tim)->format('H:i:s');
        //return $data['time'];


        return view('people.index',$data);

    }



    public function create(PeopleRequest $request){



        $house = House::orderBy('created_at', 'desc')->first();

        $msg =__('investor.persone');
        $msg1 =__('investor.number');
        $msg2 =__('investor.remember');
        $msg3 =__('participant.text22');
        $msg4 = __('participant.text19');

        $erroMsg =__('investor.personerror');


        try{

            $people = Partic::create([
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'time' => Carbon::now()->format('H:i:s'),
            ]);

            // $tim = '15:00:00';
            // $time2 = Carbon::createFromFormat('H:i:s',$tim)->format('H:i:s');

            $hour = $house->last_periode;
            $msg5 = __('participant.text21');

            if ( $house->first_hour >= $people->time ) {
                $hour = $house->first_periode;
                $msg5 = __('participant.text20');
            }


            return redirect()->route('person.index')->with(['success'=> $msg .'
            '.$msg1.'
            '.$people->id.'
            '.$msg2.'
            '. $msg3.'
            '.$house->wing.'
            '.$msg4.'
            '.$hour.'
            '.$msg5 ]) ;

        }catch(Exception $ex){

            return redirect()->back()->with(['error' => $erroMsg]);

        }




    }
}
