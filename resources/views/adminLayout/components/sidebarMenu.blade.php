<!-- Sidebar user (optional) -->
{{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="{{ asset('/') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block">Alexander Pierce</a>
  </div>
</div> --}}
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview">
        <a href="{{ url('admin/dashboard') }}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="{{ url('/admin/list_admin') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-users"></i>
          <p>
            Admin
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="{{ url('admin/product') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-box"></i>
          <p>
            Produk
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="{{ url('admin/article') }}" class="nav-link">
          <i class="nav-icon fas fa-solid fa-book"></i>
          <p>
            Artikel
            <i class="right fas fa-angle-right"></i>
          </p>
        </a>
      </li>
    </ul>
  </nav>