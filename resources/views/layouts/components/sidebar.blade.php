<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/logo3.PNG')}}" alt="logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tracking Covid</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
               <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
            
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-globe-americas"></i>
              <p>
                Global
                <i class="right fas fa-angle-double-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('negara.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Negara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kasus.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Kasus</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-chart-pie"></i>
              <p>
                Indonesia
                <i class="right fas fa-angle-double-down"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{ route('provinsi.index')}}"class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Provinsi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kota.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Kota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kecamatan.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Kecamatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('kelurahan.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Kelurahan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rw.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>RW</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tracking.index')}}" class="nav-link">
                  <i class="fas fa-edit"></i>
                  <p>Kasus</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="nav-link">  <i class="fas fa-unlock-alt nav-icon"></i>Logout
                  </a>
                </a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                  </form>
            </ul>
          </li>
            
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>