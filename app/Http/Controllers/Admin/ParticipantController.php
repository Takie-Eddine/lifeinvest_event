<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(){
        $data['participants'] = participant::all();
        return view('admin.participant',$data);
    }


    public function delete($id){
        $participant = participant::find($id);


        if ( !$participant) {

            return redirect()->back()->with(['toast_error'=>'There is a problem']);
        }
        $participant->delete();
        return redirect()->back()->with(['toast_success'=>'Deleted with success']);

    }
}
