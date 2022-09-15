<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvestorRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Investor;
use App\Models\Option;
use App\Models\Share;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
{
    public function index(){

        $data['countries'] = Country::all();
        //$data['shares'] = Share::all();
        $data['options'] = Option::first();

        $data['counter'] = Investor::sum('counter');

        return view('investor.index',$data);

    }



    public function create(InvestorRequest $request){

        try{

            DB::beginTransaction();

            $city = City::updateOrCreate([
                'name' => $request->city,
                'country_id' => $request->country,
            ]);

            $counter = ($request->share_number)/Option::first()->step;

            $investor = Investor::create([
                'first_name'=> $request->first_name,
                'last_name' =>$request->last_name,
                'phone' =>$request->phone,
                'country_id' =>$request->country,
                'city_id' =>$city->id,
                'counter' =>$counter,
            ]);

            $share = Share::create([
                'investor_id' =>$investor->id,
                'investment_value' =>$request->investment_value,
                'share_value' =>$request->share_value,
                'share_number' =>$request->share_number,
            ]);

            DB::commit();
            return redirect()->route('investor.index')->with(['success' => 'ok']);
        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('investor.index')->with(['error' => 'not ok']);
        }

    }



    public function getCity(Request $request)
    {
        $data['cities'] = City::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }




}
