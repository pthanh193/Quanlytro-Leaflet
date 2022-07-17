<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chutro;
use App\Models\Khutro;
use App\Models\Loaiphong;
use App\Models\Phong;
use App\Models\Truong;
use App\Models\Khoangcach;

class FrontendController extends Controller
{
    public function index(){
        $kt = Khutro::count();
        $khutro = Khutro::all();
        $chutro = Chutro::count();
        $lp = Loaiphong::count();
        $phong = Phong::count();
        $truong = Truong::count();
        return view('admin.index', compact('khutro','kt','chutro','lp','phong','truong'));
    }

    public function search(Request $request){
        $chutro = Chutro::where('ten', 'like','%'.$request->input('search').'%')->get();
        if($chutro){    
            foreach($chutro as $ct){ 
                $id_chutro  = $ct->id;
                $result = Khutro::where('id_ct', $id_chutro)->get();
            }
        }else{
            $result = Khutro::where('ten', 'like','%'.$request->input('search').'%')->get();
        }

        $result = Khutro::where('ten', 'like','%'.$request->input('search').'%')->get();       

        return view('admin.search',['khutro'=>$result]);
    }

    public function routing($id){
        $khutro = Khutro::find($id);
        $truong = Truong::all();
        return view('admin.routing',compact('khutro','truong'));
    }
}
