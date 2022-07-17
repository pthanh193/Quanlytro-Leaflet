@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h4>Thêm trường học</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-truong')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-4 mb-3">
                    <label for="">Tên trường</label>
                    <input type="text" class="form-control" name="ten">
                </div>

                <div class="col-md-5 mb-3">
                    <label for="">Icon</label>
                    <input type="file" class="form-control" name="icon">
                </div>

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