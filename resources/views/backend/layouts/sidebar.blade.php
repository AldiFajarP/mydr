<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin/panel" class="nav-link {{ Request::is('admin/panel') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/rekamdata" class="nav-link {{ (request()->segment(2) == 'rekamdata') ? 'active' : '' }}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Rekam Data
              </p>
            </a>
          </li>   
          <li class="nav-item {{ (request()->segment(2) == 'user') ? 'show menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/user/biasa" class="nav-link {{ Request::is('admin/user/biasa') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Biasa</p>
                </a>
              </li>
              @if($Role[0]->name=='admin')
              <li class="nav-item">
                <a href="/admin/user/backend" class="nav-link {{ (request()->segment(3) == 'backend') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Backend</p>
                </a>
              </li>
              @endif
            </ul>
          </li>          
        </ul>
      </nav>