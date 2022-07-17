@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h4>Thêm khu trọ</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-khutro')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-6 mb-3">
                    <label for="">Tên khu trọ</label>
                    <input type="text" class="form-control" name="ten">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Tên chủ trọ</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select"name="id_ct">
                            <option value=""></option>
                            @foreach ($chutro as $ct)
                                <option value="{{$ct->id}}">{{$ct->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-9 mb-3">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Quận</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select"name="id_phuong">
                            <option value=""></option>
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
                    <input type="text" class="form-control" name="latitude">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Kinh độ</label>
                    <input type="text" class="form-control" name="longitude">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection