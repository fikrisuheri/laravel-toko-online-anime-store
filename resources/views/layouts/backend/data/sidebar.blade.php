<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Menu Admin</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i><span>Master</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.category') }}</a></li>
              <li><a class="nav-link" href="{{ route('master.product.index') }}">{{ __('menu.product') }}</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>{{ __('menu.order') }}</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.order_all') }}</a></li>
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.order_pending') }}</a></li>
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.order_process') }}</a></li>
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.order_completed') }}</a></li>
              <li><a class="nav-link" href="{{ route('master.category.index') }}">{{ __('menu.order_canceled') }}</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>