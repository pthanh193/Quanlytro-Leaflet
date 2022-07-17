<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Truong;
use Illuminate\Support\Facades\File;

class TruongController extends Controller
{
    public function index(){
        $truong = Truong::paginate(3);
        return view('admin.truong.index', compact('truong'));
    }

    public function add(){
        $truong = Truong::all();
        return view('admin.truong.add',compact('truong'));
    }

    public function insert(Request $request){
        $t = new Truong();
        $t->ten = $request->input('ten');
        $t->latitude = $request->input('latitude');
        $t->longitude = $request->input('longitude');
        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("admin/images/",$filename);
            $t->icon = $filename;
        }
        $t->save();
        return redirect('truong')->with('status', 'Thêm trường học thành công.');
    }

    public function edit($id){
        $truong = Truong::find($id);
        return view('admin.truong.edit', compact('truong'));
    }

    public function update(Request $request,$id){
        $t = Truong::find($id);
        $t->ten = $request->input('ten');
        $t->latitude = $request->input('latitude');
        $t->longitude = $request->input('longitude');
        if($request->hasfile('icon')){
            $path = 'admin/images/'.$t->icon;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('icon');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move("admin/images/",$filename);
            $t->icon = $filename;
        }
        $t->update();
        return redirect('truong')->with('status', 'Thay đổi thông tin thành công.');

    }

    public function destroy($id){
        $t = Truong::find($id);
        $t->delete();
        return back();
    }
}
