<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phong;
use App\Models\Khutro;
use App\Models\Chutro;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $phong = Phong::all();
        $khutro = Khutro::all();
        return view('frontend.index', compact('phong','khutro'));
    }

//     public function search(Request $request){
//         $result = Khutro::where('ten', 'like','%'.$request->input('search').'%')->first();
//         $kq = Chutro::where('ten', 'like','%'.$request->input('search').'%')->get();
//         return view('frontend.search',['khutro'=>$result],['chutro'=>$kq]);
//     }
}
