@extends('layouts.admin')
@section('content')
    <div class="card" style="margin-top:95px">
        <div class="card-header">
            <h4>Thay đổi thông tin khu trọ</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-khutro/'.$khutro->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="">Tên khu trọ</label>
                    <input type="text" class="form-control" value="{{$khutro->ten}}" name="ten">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tên chủ trọ</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select" name="id_ct">                       
                            @foreach ($chutro as $ct)
                                <option value="{{$ct->id}}">{{$ct->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-9 mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{$khutro->diachi}}" name="diachi">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tên chủ trọ</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select" name="id_phuong">                       
                            @foreach ($phuong as $p)
                                <option value="{{$p->id}}">{{$p->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3 mb-3"></div>
                <div class="col-md-3 mb-3"></div>


                <div class="col-md-3 mb-3">
                    <label for="">Vĩ độ</label>
                    <input type="text" class="form-control" value="{{$khutro->latitude}}" name="latitude">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Kinh độ</label>
                    <input type="text" class="form-control" value="{{$khutro->longitude}}" name="longitude">
                </div>

                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection