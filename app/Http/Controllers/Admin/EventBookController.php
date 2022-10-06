<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partic;
use Illuminate\Http\Request;

class EventBookController extends Controller
{
    public function index(){
        $data['partics'] = Partic::all();


        return view('admin.winners',$data);
    }

    public function delete($id){
        $investor = Partic::find($id);

        if ( !$investor) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $investor->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }
}
