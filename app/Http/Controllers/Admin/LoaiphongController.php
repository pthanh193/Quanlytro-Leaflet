<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loaiphong;
use App\Models\Khutro;



class LoaiphongController extends Controller
{
    public function index(){
        $loaiphong = Loaiphong::paginate(5);
        return view('admin.loaiphong.index', compact('loaiphong'));
    }

    public function add(){
        $khutro = Khutro::all();
        $loaiphong = Loaiphong::all();
        return view('admin.loaiphong.add',compact('khutro', 'loaiphong'));
    }

    public function insert(Request $request){
        $lp = new Loaiphong();
        $lp->ten = $request->input('ten');
        $lp->songuoi = $request->input('songuoi');
        $lp->id_kt = $request->input('id_kt');
        $lp->dientich = $request->input('dientich');
        $lp->gia = $request->input('gia');
        $lp->soluong = $request->input('soluong');
        $lp->save();
        return redirect('loaiphong')->with('status', 'Thêm loại phòng thành công.');
    }

    public function edit($id){
        $loaiphong = Loaiphong::find($id);
        $khutro = Khutro::all();
        return view('admin.loaiphong.edit', compact('khutro', 'loaiphong'));
    }

    public function update(Request $request,$id){
        $lp = Loaiphong::find($id);
        $lp->ten = $request->input('ten');
        $lp->songuoi = $request->input('songuoi');
        $lp->id_kt = $request->input('id_kt');
        $lp->dientich = $request->input('dientich');
        $lp->gia = $request->input('gia');
        $lp->soluong = $request->input('soluong');
        $lp->update();
        return redirect('loaiphong')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $lp = Loaiphong::find($id);
        $lp->delete();
        return back();
    }

}
