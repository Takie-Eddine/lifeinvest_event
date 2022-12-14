<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvestorExport;
use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Models\Option;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvestorController extends Controller
{
    public function index(){
        $data['options'] = Option::first();
        $data['investors'] = Investor::all();
        $data['counter'] = Investor::sum('counter');


        return view('admin.investor',$data);
    }


    public function store(){


    }


    public function edit(Request $request ,$id){
        $option = Option::find($id);
        if (!$option) {
            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }

        $option->update([
            'min_inv'=>$request->min_inv,
            'step'=>$request->step,
            'share_value'=>$request->share_value,
            'max_value'=>$request->max_value,
            'doshtu_max' =>$request-> doshtu_max,
            'rekmaz_max' =>$request->rekmaz_max
        ]);

        return redirect()->back()->with((['toast_success'=>'Updated with success']));

    }


    public function delete($id){

        $investor = Investor::find($id);
        //$participant = participant::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);
    }



    public function exportods(){


        return Excel::download(new InvestorExport,'investor.ods');
    }

    public function exportxls(){


        return Excel::download(new InvestorExport,'investor.xls');
    }

    public function exportcls(){


        return Excel::download(new InvestorExport,'investor.csv');
    }
}
