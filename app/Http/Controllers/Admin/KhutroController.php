<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Khutro;
use App\Models\Chutro;
use App\Models\Phuong;


class KhutroController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ten' => ['required', 'string', 'max:255'],
            'diachi' => ['required', 'string', 'max:255'],
            'id_ct' => ['required', 'string', 'max:255', 'unique:chutro'],
            'vido' => ['required', 'double'],
            'kinhdo' => ['required', 'double'],
        ]);
    }


    public function index(){
        $khutro = Khutro::paginate(5);
        return view('admin.khutro.index', compact('khutro'));
    }

    public function add(){
        $khutro = Khutro::all();
        $chutro = Chutro::all();
        $phuong = Phuong::all();
        return view('admin.khutro.add',compact('khutro', 'chutro','phuong'));
    }

    public function insert(Request $request){
        $kt = new Khutro();
        $kt->ten = $request->input('ten');
        $kt->diachi = $request->input('diachi');
        $kt->id_ct = $request->input('id_ct');
        $kt->id_phuong = $request->input('id_phuong');
        $kt->latitude = $request->input('latitude');
        $kt->longitude = $request->input('longitude');
        $kt->save();
        return redirect('khutro')->with('status', 'Thêm khu trọ thành công.');
    }

    public function edit($id){
        $khutro = Khutro::find($id);
        $chutro = Chutro::all();
        $phuong = Phuong::all();
        return view('admin.khutro.edit', compact('khutro', 'chutro','phuong'));
    }

    public function update(Request $request,$id){
        $kt = Khutro::find($id);
        $kt->ten = $request->input('ten');
        $kt->diachi = $request->input('diachi');
        $kt->id_ct = $request->input('id_ct');
        $kt->id_phuong = $request->input('id_phuong');
        $kt->latitude = $request->input('latitude');
        $kt->longitude = $request->input('longitude');
        $kt->update();
        return redirect('khutro')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $kt = Khutro::find($id);
        $kt->delete();
        return back();
    }
}
