<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\participant;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class ParticipantController extends Controller
{
    public function index(){

        $data['countries'] = Country::all();
        $data['participants'] = participant::all()->count();
        return view('participant.index',$data);

    }


    public function create(ParticipantRequest $request){

        $city = City::updateOrCreate([
            'name' => $request->city,
            'country_id' => $request->country,
        ]);

        $participant = participant::create([
            'first_name'=> $request->first_name,
            'last_name' =>$request->last_name,
            'phone' =>$request->phone,
            'company_name' =>$request->company_name,
            'country_id' =>$request->country,
            'city_id' => $city->id,
        ]);

        return redirect()->route('participant.index')->with(['success' => 'ok']);

    }
}
