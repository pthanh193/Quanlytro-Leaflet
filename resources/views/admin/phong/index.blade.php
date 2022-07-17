@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Phòng</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-phong') }}" class="btn btn-success ">Thêm phòng</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="width:20px;text-align:left;" scope="col">STT</th>
                    <th scope="col" style="text-align:left;">Số phòng</th>
                    <th scope="col" style="text-align:left;">Tên khu trọ</th>
                    <th scope="col" style="text-align:left;">Tên loại phòng</th>
                    <th scope="col" style="text-align:left;">Tình trạng</th>                                  
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($phong as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->stt}}</td>  
                        <td>{{$p->khutro->ten}}</td>
                        <td>{{$p->loaiphong->ten}}</td>                       
                        <td>{{$p->tinhtrang}}</td>                                         
                        <td style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-phong/'.$p->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$p->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$phong->links()}}

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
                    swal("Xóa phòng thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Phòng chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection