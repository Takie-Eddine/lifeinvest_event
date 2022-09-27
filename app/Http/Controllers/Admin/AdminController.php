<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Option;
use App\Models\participant;
use App\Models\Persone;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $data['options'] = Option::first();
        $data['participants'] = participant::all();
        $data['investors'] = Investor::all();
        $data['counter'] = Investor::sum('counter');
        $data['persones'] = Persone::all();


        return view('admin.dashboard' ,$data);

    }

    public function edit(Request $request ,$id){

        //return $request ;

        $option = Option::find($id);
        if (!$option) {
            return redirect()->back()->with(['error'=>'There is a problem']);
        }

        $option->update([
            'min_inv'=>$request->min_inv,
            'step'=>$request->step,
            'share_value'=>$request->share_value,
            'max_value'=>$request->max_value,
        ]);

        return redirect()->route('admin.index')->with((['success'=>'Updated with success']));
    }

    public function deleteparticipant($id){

        //$investor = Investor::find($id);
        $participant = participant::find($id);


        if ( !$participant) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $participant->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }

    public function deleteinvestor($id){

        $investor = Investor::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }



    public function deletepersone($id){

        $investor = Persone::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['success'=>'Deleted with success']);


    }


}
