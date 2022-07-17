@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Khoảng cách</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-khoangcach') }}" class="btn btn-success ">Thêm khoảng cách</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="width:20px;text-align:left;" scope="col">STT</th>
                    <th scope="col" style="text-align:left;">Tên trường</th>
                    <th scope="col" style="text-align:left;">Tên khu trọ</th>
                    <th scope="col" style="text-align:left;">Khoảng cách</th>                                  
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($kc as $m)
                    <tr>
                        <td>{{$m->id}}</td>
                        <td>{{$m->truong->ten}}</td>  
                        <td>{{$m->khutro->ten}}</td>                      
                        <td>{{$m->khoangcach}} km</td>                                         
                        <td style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-khoangcach/'.$m->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$m->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$kc->links()}}

        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.delete').click(function(){
        var del = $(this).attr('data-id');
        swal({
            title: "Bạn chắc chắn muốn xóa không?",
            text: "Bạn sẽ không thể khôi phục được dữ liệu đã xóa!",
            icon: "warning",
            buttons: ["Hủy", "Xóa"],
            dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "del-phong/"+del+""
                    swal("Xóa khoảng cách thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Khoảng cách chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection