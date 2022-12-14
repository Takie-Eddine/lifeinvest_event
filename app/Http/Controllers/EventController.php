<?php

namespace App\Http\Controllers;

use App\Exports\PersoneExport;
use App\Http\Requests\PersonetRequest;
use App\Models\Persone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel ;

class EventController extends Controller
{


    public function index(){


        return view('event.index');

    }


    public function create(PersonetRequest $request){



        try{
            DB::beginTransaction();

            if (!$request->has('doshtu')){
                $request->request->add(['doshtu' => 0]);
            }else{
                $request->request->add(['doshtu' => 1]);
            }

            if (!$request->has('rekmaz')){
                $request->request->add(['rekmaz' => 0]);
            }else{
                $request->request->add(['rekmaz' => 1]);
            }

            $fileName= '';
            if ($request->has('photo')) {
                $file = $request->photo;
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('assets/Image'), $fileName);
            }

        $persone = Persone::create([
            'first_name'=> $request->first_name,
            'last_name' =>$request->last_name,
            'phone' =>$request->phone,
            'email' =>$request->email,
            'photo' =>$fileName,
            'doshtu' =>$request->doshtu,
            'rekmaz' =>$request->rekmaz,
            'note' => $request->note,
        ]);

        DB::commit();
            return redirect()->route('event.index')->with(['toast_success'=>'ok']);

        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('event.index')->with(['error' => 'not ok']);
        }



    }



}
