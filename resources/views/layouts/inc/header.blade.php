<!-- Bottom Bar Start -->
<div class="bottom-bar cus-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                
                <a href="{{url('/')}}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="center" style="width:180px" />
                </a>
                
            </div>
            <div class="col-md-9">
                <div class="search">
                    <form action="{{url('search')}}">
                        <div class="form-group">
                            <input class="form-control cus-input-search" type="text" name="search" placeholder="Nhập tên khu trọ hoặc tên chủ trọ...">
                        </div>
                        <button type="submit" class="cus-btn-search fa fa-search"></button>   
                    </form>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Vị trí các khu trọ</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Danh sách các phòng trọ</button>
            </li>
        </ul>
        
    </div>
</div>