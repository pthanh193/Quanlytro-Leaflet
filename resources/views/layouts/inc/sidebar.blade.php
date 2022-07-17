<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo" >
        <a  href="{{ url('/') }}" >
          <img src="{{asset('img/logo.png')}}" alt="logo" style="width:150px" class="center"/>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="{{Request::is('/') ? 'active':''; }}">
            <a href="{{ url('/') }}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{Request::is('chutro') ? 'active':''; }}">
            <a href="{{ url('/chutro') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Chủ trọ</p>
            </a>
          </li>
          <li class="{{Request::is('khutro') ? 'active':''; }}">
            <a href="{{ url('/khutro') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Khu trọ</p>
            </a>
          </li>
          <li class="{{Request::is('loaiphong') ? 'active':''; }}">
            <a href="{{ url('/loaiphong') }}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Loại phòng</p>
            </a>
          </li>
          <li class="{{Request::is('phong') ? 'active':''; }}">
            <a href="{{ url('/phong') }}">
              <i class="nc-icon nc-shop"></i>
              <p>Phòng</p>
            </a>
          </li>
          <li class="{{Request::is('truong') ? 'active':''; }}">
            <a href="{{ url('/truong') }}">
              <i class="nc-icon nc-istanbul"></i>
              <p>Trường học</p>
            </a>
          </li>
          <li class="{{Request::is('khoangcach') ? 'active':''; }}">
            <a href="{{ url('/khoangcach') }}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Khoảng cách</p>
            </a>
          </li>
        </ul>
      </div>
    </div>