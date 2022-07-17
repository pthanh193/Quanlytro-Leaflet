@extends('layouts.admin')
@section('content')
    <div class="card" style="margin-top:95px">
        <div class="card-header">
            <h4>Thay đổi thông tin phòng</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-phong/'.$phong->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="">Số phòng</label>
                        <input type="text" class="form-control" value="{{$phong->stt}}" name="stt">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tên khu trọ</label>
                        <div class="form-control" style="border:#fff;padding:0">
                            <select class="form-select"name="id_kt">
                                <option value=""></option>
                                @foreach ($khutro as $kt)
                                    <option value="{{$kt->id}}">{{$kt->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tên loại phòng</label>
                        <div class="form-control" style="border:#fff;padding:0">
                            <select class="form-select"name="id_lp">
                                <option value=""></option>
                                @foreach ($loaiphong as $lp)
                                    <option value="{{$lp->id}}">{{$lp->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Tình trạng</label>
                        <input type="text" class="form-control" value="{{$phong->tinhtrang}}" name="tinhtrang">
                    </div>  

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection