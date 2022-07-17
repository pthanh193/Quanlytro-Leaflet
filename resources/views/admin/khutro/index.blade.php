@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Khu trọ</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-khutro') }}" class="btn btn-success ">Thêm khu trọ</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="width:20px;text-align:left;" scope="col">STT</th>
                    <th scope="col" style="width:180px;text-align:left;">Tên khu trọ</th>
                    <th scope="col" style="width:180px;text-align:left;">Tên chủ trọ</th>
                    <th scope="col" style="width:320px;text-align:left;">Địa chỉ</th>                   
                    <th style="text-align:left;" scope="col">Vị trí</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($khutro as $kt)
                    <tr>
                        <td>{{$kt->id}}</td>
                        <td>{{$kt->ten}}</td>
                        <td>{{$kt->chutro->ten}}</td>
                        <td>{{$kt->diachi}}</td>                       
                        <td>{{$kt->latitude}}, {{$kt->longitude}}</td>
                        <td style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-khutro/'.$kt->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$kt->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$khutro->links()}}

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
                    window.location = "del-khutro/"+del+""
                    swal("Xóa khu trọ thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Khu trọ chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection