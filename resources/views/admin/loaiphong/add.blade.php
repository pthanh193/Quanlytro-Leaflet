@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h4>Thêm loại phòng</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-loaiphong')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-3 mb-3">
                    <label for="">Tên loại phòng</label>
                    <input type="text" class="form-control" name="ten">
                </div>

                <div class="col-md-9 mb-3">
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

                <div class="col-md-3 mb-3">
                    <label for="">Số người</label>
                    <input type="number" class="form-control" name="songuoi">
                </div>        

                <div class="col-md-3 mb-3">
                    <label for="">Diện tích (m2)</label>
                    <input type="number" class="form-control" name="dientich">
                </div>  

                <div class="col-md-6 mb-3"></div>

                <div class="col-md-3 mb-3">
                    <label for="">Giá</label>
                    <input type="number" class="form-control" name="gia">
                </div>  

                <div class="col-md-3 mb-3">
                    <label for="">Số lượng</label>
                    <input type="number" class="form-control" name="soluong">
                </div>  

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection