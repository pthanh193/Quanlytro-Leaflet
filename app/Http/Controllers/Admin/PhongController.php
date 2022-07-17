<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaiphong;
use App\Models\Phong;
use App\Models\Khutro;

class PhongController extends Controller
{
    public function index(){
        $phong = Phong::paginate(5);
        return view('admin.phong.index', compact('phong'));
    }

    public function add(){
        $khutro = Khutro::all();
        $loaiphong = Loaiphong::all();
        $phong = Phong::all();
        return view('admin.phong.add',compact('khutro', 'loaiphong', 'phong'));
    }

    public function insert(Request $request){
        $p = new Phong();
        $p->id_kt = $request->input('id_kt');
        $p->id_lp = $request->input('id_lp');
        $p->stt = $request->input('stt');
        $p->tinhtrang = $request->input('tinhtrang');
        $p->save();
        return redirect('phong')->with('status', 'Thêm phòng thành công.');
    }

    public function edit($id){
        $phong = Phong::find($id);
        $loaiphong = Loaiphong::all();
        $khutro = Khutro::all();
        return view('admin.phong.edit', compact('khutro', 'loaiphong', 'phong'));
    }

    public function update(Request $request,$id){
        $p = Loaiphong::find($id);
        $p->id_kt = $request->input('id_kt');
        $p->id_lp = $request->input('id_lp');
        $p->stt = $request->input('stt');
        $p->tinhtrang = $request->input('tinhtrang');
        $p->update();
        return redirect('phong')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $p = Phong::find($id);
        $p->delete();
        return back();
    }

}
