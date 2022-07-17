@extends('layouts.admin')

@section('content')
<div class="card" style="margin-top:95px">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h1>Loại phòng</h1>
                </div>
                <div class="col-md-6" style="text-align:right">
                    <a href="{{ url('add-loaiphong') }}" class="btn btn-success ">Thêm loại phòng</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <table class="table">
                <thead style="text-align:center;">
                <tr>
                    <th style="width:20px;text-align:left;" scope="col">STT</th>
                    <th scope="col" style="text-align:left;">Tên loại phòng</th>
                    <th scope="col" style="text-align:left;">Tên khu trọ</th>
                    <th scope="col" style="text-align:left;">Số người</th>
                    <th scope="col" style="text-align:left;">Diện tích</th>                   
                    <th scope="col" style="text-align:left;">Giá</th>   
                    <th scope="col" style="text-align:left;">Số lượng</th>                   
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody >
                    @foreach($loaiphong as $lp)
                    <tr>
                        <td>{{$lp->id}}</td>
                        <td>{{$lp->ten}}</td>
                        <td>{{$lp->khutro->ten}}</td>
                        <td>{{$lp->songuoi}}</td>                       
                        <td>{{$lp->dientich}} m2</td>                       
                        <td>{{number_format($lp->gia,0, ',','.')}}</td>
                        <td>{{$lp->soluong}}</td>                       
                        <td style="width:180px;text-align:center;"> 
                            <a href="{{ url('edit-loaiphong/'.$lp->id) }}" class="btn btn-primary">Sửa</a>
                            <a href="#" class="btn btn-danger delete" data-id="{{$lp->id}}">Xóa</a>                
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{$loaiphong->links()}}

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
                    window.location = "del-loaiphong/"+del+""
                    swal("Xóa loại phòng thành công.", {
                    icon: "success",
                    });
                } else {
                    swal("Loại phòng chưa được xóa!");
                }
            });
    })
})
    
</script>    
@endsection