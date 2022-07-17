@extends('layouts.admin')
@section('content')
    <div class="card" style="margin-top:95px">
        <div class="card-header">
            <h4>Thay đổi thông tin khoảng cách</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-khoangcach/'.$kc->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-3 mb-3">
                        <label for="">Tên trường</label>
                        <div class="form-control" style="border:#fff;padding:0">
                            <select class="form-select" value="{{$kc->id_trg}}" name="id_trg">
                                <option value=""></option>
                                @foreach ($truong as $tr)
                                    <option value="{{$tr->id}}">{{$tr->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="">Tên khu trọ</label>
                        <div class="form-control" style="border:#fff;padding:0">
                            <select class="form-select" value="{{$kc->id_kt}}" name="id_kt">
                                <option value=""></option>
                                @foreach ($khutro as $kt)
                                    <option value="{{$kt->id}}">{{$kt->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                
                    <div class="col-md-3 mb-3">
                        <label for="">Khoảng cách (m)</label>
                        <input type="text" class="form-control" value="{{$kc->khoangcach}}" name="khoangcach">
                    </div>  

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection