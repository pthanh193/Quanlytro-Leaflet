@extends('layouts.admin')
@section('content')
    <div class="card" style="margin-top:95px">
        <div class="card-header">
            <h4>Thay đổi thông tin trường học</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-truong/'.$truong->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label for="">Tên trường</label>
                        <input type="text" class="form-control" value="{{$truong->ten}}" name="ten">
                    </div>
                    <div class="col-md-8 mb-3"></div>

                    <div class="col-md-4 mb-3">
                        <label for="">Icon</label>
                        <input type="file" class="form-control" value="{{$truong->icon}}" name="icon">
                    </div>
                    @if($truong->icon)
                        <img src="{{asset('admin/images/'.$truong->icon)}}" alt="" class="icon-img">
                    @endif
                    <div class="col-md-6 mb-3"></div>

                    <div class="col-md-3 mb-3">
                        <label for="">Vĩ độ</label>
                        <input type="text" class="form-control" value="{{$truong->latitude}}" name="latitude">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Kinh độ</label>
                        <input type="text" class="form-control" value="{{$truong->longitude}}" name="longitude">
                    </div>

                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection