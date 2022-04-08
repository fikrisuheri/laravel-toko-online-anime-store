<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.frontend.data.styles')
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
              <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
              <div class="navbar-nav">
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
              </div>
              <form class="form-inline ml-auto mr-2">
                <ul class="navbar-nav">
                  <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Cari Produk" aria-label="Search" data-width="250">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                  <div class="search-backdrop"></div>
                  <div class="search-result">
                    <div class="search-header">
                      Histories
                    </div>
                    <div class="search-item">
                      <a href="#">How to hack NASA using CSS</a>
                      <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="search-item">
                      <a href="#">Kodinger.com</a>
                      <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="search-item">
                      <a href="#">#Stisla</a>
                      <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="search-header">
                      Result
                    </div>
                    <div class="search-item">
                      <a href="#">
                        <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                        oPhone S9 Limited Edition
                      </a>
                    </div>
                    <div class="search-item">
                      <a href="#">
                        <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                        Drone X2 New Gen-7
                      </a>
                    </div>
                    <div class="search-item">
                      <a href="#">
                        <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                        Headphone Blitz
                      </a>
                    </div>
                    <div class="search-header">
                      Projects
                    </div>
                    <div class="search-item">
                      <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                          <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                      </a>
                    </div>
                    <div class="search-item">
                      <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                          <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                      </a>
                    </div>
                  </div>
                </div>
              </form>
              <ul class="navbar-nav navbar-right">
               @auth
               <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Notifications
                    <div class="float-right">
                      <a href="#">Mark All As Read</a>
                    </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Template update is available now!
                        <div class="time text-primary">2 Min Ago</div>
                      </div>
                    </a>
                  </div>
                  <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </li>
              <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('stisla') }}/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-title">Logged in 5 min ago</div>
                  <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                  </a>
                  <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                  </a>
                  <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                  </a>
                </div>
              </li>
               @endauth
              </ul>
            </nav>
      
            <nav class="navbar navbar-secondary navbar-expand-lg">
              <div class="container">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a href="#" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-list-alt"></i><span>Kategori</span></a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                      <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                        <ul class="dropdown-menu">
                          <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                          <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                            <ul class="dropdown-menu">
                              <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                              <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                              <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            </ul>
                          </li>
                          <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item active">
                    <a href="#" class="nav-link"><i class="fa fa-sign-in-alt"></i><span>Masuk</span></a>
                  </li>
                </ul>
              </div>
            </nav>
      
            <!-- Main Content -->
            <div class="main-content">
              <section class="section">
                <div class="section-body">
                @yield('content')
                </div>
              </section>
            </div>
            <footer class="main-footer">
              <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
              </div>
              <div class="footer-right">
                2.3.0
              </div>
            </footer>
          </div>
    </div>
    @include('layouts.frontend.data.scripts')
</body>

</html>
