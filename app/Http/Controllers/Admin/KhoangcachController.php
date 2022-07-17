<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truong;
use App\Models\Khoangcach;
use App\Models\Khutro;

class KhoangcachController extends Controller
{
    public function index(){
        $kc = Khoangcach::paginate(5);
        return view('admin.khoangcach.index', compact('kc'));
    }

    public function add(){
        $khutro = Khutro::all();
        $truong = Truong::all();
        $kc = Khoangcach::all();
        return view('admin.khoangcach.add',compact('khutro', 'kc', 'truong'));
    }

    public function insert(Request $request){
        $kc = new Khoangcach;
        $kc->id_kt = $request->input('id_kt');
        $kc->id_trg = $request->input('id_trg');
        $kc->khoangcach = $request->input('khoangcach');
        $kc->save();
        return redirect('khoangcach')->with('status', 'Thêm khoảng cách thành công.');
    }

    public function edit($id){
        $truong = Truong::find($id);
        $kc = Khoangcach::all();
        $khutro = Khutro::all();
        return view('admin.khoangcach.edit', compact('khutro', 'kc', 'truong'));
    }

    public function update(Request $request,$id){
        $kc = Khoangcach::find($id);
        $kc->id_kt = $request->input('id_kt');
        $kc->id_trg = $request->input('id_trg');
        $kc->khoangcach = $request->input('khoangcach');
        $kc->update();
        return redirect('khoangcach')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $kc = Khoangcach::find($id);
        $kc->delete();
        return back();
    }
}
