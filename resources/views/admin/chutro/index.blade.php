@extends('layouts.admin')
<title>Quản lý nhà trọ - Chủ trọ</title>
@section('content')

    <div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Chủ trọ</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-chutro') }}" class="btn btn-success ">Thêm chủ trọ</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="text-align:left;" scope="col">STT</th>
                    <th scope="col" style="width:320px;text-align:left;">Tên chủ trọ</th>
                    <th style="text-align:left;" scope="col">Giới tính</th>
                    <th style="text-align:left;width:170px;" scope="col">Số điện thoại</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($chutro as $ct)
                    <tr>
                        <td>{{$ct->id}}</td>
                        <td >{{$ct->ten}}</td>
                        <td>{{$ct->gioitinh}}</td>
                        <td>{{$ct->sdt}}</td>
                        <td style="width:200px;text-align:center;"> 
                            <a href="{{ url('edit-chutro/'.$ct->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$ct->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$chutro->links()}}

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
                    window.location = "del-chutro/"+del+""
                    swal("Xóa chủ trọ thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Chủ trọ chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection