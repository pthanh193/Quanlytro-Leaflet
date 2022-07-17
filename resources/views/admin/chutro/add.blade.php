@extends('layouts.admin')
<title>Quản lý nhà trọ - Thêm chủ trọ</title>

@section('content')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h4>Thêm chủ trọ</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-chutro')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-6 mb-3">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" name="ten">
                </div>


                <div class="col-md-6 mb-3">
                    <label for="">Giới tính</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select" name="gioitinh">
                            <option value=""></option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="sdt">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection