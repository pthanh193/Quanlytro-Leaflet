@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Trường học</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-truong') }}" class="btn btn-success ">Thêm trường học</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="width:20px;text-align:left;" scope="col">STT</th>
                    <th scope="col" style="width:320px;text-align:left;">Trường</th>
                    <th scope="col" style="width:180px;text-align:left;">Icon</th>
                    <th scope="col" style="width:200px;text-align:left;">Vị trí</th>                   
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($truong as $t)
                    <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->ten}}</td>
                        <td>
                            <img src="{{asset('admin/images/'.$t->icon)}}" class="icon-img">
                        </td>                       
                        <td>{{$t->latitude}}, {{$t->longitude}}</td>
                        <td style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-truong/'.$t->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$t->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$truong->links()}}

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
                    swal("Xóa trường học thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Trường học chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection