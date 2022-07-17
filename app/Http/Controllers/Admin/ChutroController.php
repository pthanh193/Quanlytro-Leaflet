<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chutro;
use App\Models\Khutro;


class ChutroController extends Controller
{
    public function index(){
        $chutro = Chutro::paginate(5);
        return view('admin.chutro.index', compact('chutro'));
    }

    public function add(){
        return view('admin.chutro.add');
    }

    public function insert(Request $request){
        $ct = new Chutro();
        $ct->ten = $request->input('ten');
        $ct->gioitinh = $request->input('gioitinh');
        $ct->sdt = $request->input('sdt');
        $ct->save();
        return redirect('chutro')->with('status', 'Thêm chủ trọ thành công.');
    }

    public function edit($id){
        $chutro = Chutro::find($id);
        return view('admin.chutro.edit', compact('chutro'));
    }

    public function update(Request $request,$id){
        $ct = Chutro::find($id);
        $ct->ten = $request->input('ten');
        $ct->gioitinh = $request->input('gioitinh');
        $ct->sdt = $request->input('sdt');
        $ct->update();
        return redirect('chutro')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $ct = Chutro::find($id);
        $ct->delete();
        return back();
    }
}
