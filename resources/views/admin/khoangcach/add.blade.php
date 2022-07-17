@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
    <div class="card-header">
        <h4>Thêm khoảng cách</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-khoangcach')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                

                <div class="col-md-4 mb-3">
                    <label for="">Tên trường</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select" name="id_trg">
                            <option value=""></option>
                            @foreach ($truong as $tr)
                                <option value="{{$tr->id}}">{{$tr->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="">Tên khu trọ</label>
                    <div class="form-control" style="border:#fff;padding:0">
                        <select class="form-select" name="id_kt">
                            <option value=""></option>
                            @foreach ($khutro as $kt)
                                <option value="{{$kt->id}}">{{$kt->ten}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

               
                <div class="col-md-3 mb-3">
                    <label for="">Khoảng cách (m)</label>
                    <input type="text" class="form-control" name="khoangcach">
                </div>  

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection