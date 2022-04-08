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
              <li><a class="nav-link" href="{{ route('feature.order.index') }}">{{ __('menu.order_all') }}</a></li>
              <li><a class="nav-link" href="{{ route('feature.order.index',0) }}">{{ __('menu.order_pending') }}</a></li>
              <li><a class="nav-link" href="{{ route('feature.order.index',1) }}">{{ __('menu.order_process') }}</a></li>
              <li><a class="nav-link" href="{{ route('feature.order.index',2) }}">{{ __('menu.order_shipped') }}</a></li>
              <li><a class="nav-link" href="{{ route('feature.order.index',3) }}">{{ __('menu.order_completed') }}</a></li>
              <li><a class="nav-link" href="{{ route('feature.order.index',4) }}">{{ __('menu.order_canceled') }}</a></li>
            </ul>
          </li>
        </ul>
    </aside>
  </div>