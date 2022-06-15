  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto"> 
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
         {{Auth::guard('web')->user()->name}}
          <i class="far fa-user mr-2 ml-2"></i>
          <i class="fa fa-chevron-down" style="font-size: 10px;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{route('logout')}}"  class="dropdown-item">
            <i class="fas fa-times mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
