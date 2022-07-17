@extends('layouts.frontend')
<title>
    Tìm trọ | Kết quả tìm kiếm
</title>
@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Kết quả tìm kiếm </h2>
            <div class="col-md-12">
                @if($khutro != "")
                <div class="row">
                    <div class="col-md-4">   
                        <p>Khu trọ: {{$khutro->ten}}</p>
                        <p>Tên chủ trọ: {{$khutro->chutro->ten}}</p>
                        <p>Địa chỉ: {{$khutro->diachi}}</p>
                    </div> 
                    <div class="col-md-3">   
                        <p style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-khutro/'.$khutro->id) }}" class="btn btn-primary">Hiển thị</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$khutro->id}}">Chỉ đường</a>                
                        </p>
                    </div> 
                    </div>
                </div>
                @elseif($chutro !="")
                <div class="row">
                    <div class="col-md-4">   
                    @foreach($chutro as $ct)
                        <p>Chủ trọ: {{$ct->ten}}</p>
                        <p>Số điện thoại: {{$ct->sdt}}</p>
                        
                        <p>Khu trọ: {{$ct->khutro->ten}}</p>
                    @endforeach
                    </div> 
                    <div class="col-md-3">   
                        <p style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-chutro/'.$chutro->id) }}" class="btn btn-primary">Hiển thị</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$chutro->id}}">Chỉ đường</a>                
                        </p>
                    </div> 
                    </div>
                </div>
                @endif
        </div>
    </div>
    </div>
@endsection