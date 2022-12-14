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

        $data['counter_rekmaz'] = Investor::where('doshtu','==',0)->sum('counter');

        $data['counter_doshtu'] = (Investor::sum('counter') - $data['counter_rekmaz']);
        return view('investor.index',$data);

    }



    public function create(InvestorRequest $request){

            //return $request;

        try{

            DB::beginTransaction();

            // $city = City::updateOrCreate([
            //     'name' => $request->city,
            //     'country_id' => $request->country,
            // ]);
            if (!$request->has('project')){
                return redirect()->route('investor.index')->with(['toast_error' => 'There is problem']);
            }

            $rekmaz = 0 ;
            $doshtu = 1;
            if ($request->project == 'rekmaz') {

                $rekmaz = 1;
                $doshtu = 0;
            }

            $counter = ($request->share_number)/Option::first()->step;

            $investor = Investor::create([
                'first_name'=> $request->first_name,
                'last_name' =>$request->last_name,
                'phone' =>$request->phone,
                'email' =>$request->email,
                'country_id' =>$request->country,
                //'city_id' =>$city->id,
                'counter' =>$counter,
                'doshtu' => $doshtu,
                'rekmaz' => $rekmaz,
            ]);


            $msg =__('investor.success');
            $erroMsg =__('investor.error');



            $share = Share::create([
                'investor_id' =>$investor->id,
                'investment_value' =>$request->investment_value,
                'share_value' =>$request->share_value,
                'share_number' =>$request->share_number,

            ]);

            DB::commit();
            return redirect()->route('investor.index')->with(['toast_success'=>$msg]);
        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('investor.index')->with(['toast_error' => $erroMsg]);
        }

    }



    public function getCity(Request $request)
    {
        $data['cities'] = City::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }


public function policies(){

        return view('investor.policies');
    }

}
