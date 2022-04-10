<nav class="navbar navbar-secondary navbar-expand-lg">
  <div class="container">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a href="#" class="nav-link"><i class="fa fa-home"></i><span>Home</span></a>
      </li>
      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fa fa-list-alt"></i><span>Kategori</span></a>
        <ul class="dropdown-menu">
          @foreach ($siteCategories as $siteCategorie)
          <li class="nav-item"><a href="#" class="nav-link">{{ $siteCategorie->name }}</a></li>
          @endforeach
        </ul>
      </li>
      <li class="nav-item active">
        <a href="#" class="nav-link"><i class="fa fa-sign-in-alt"></i><span>Masuk</span></a>
      </li>
    </ul>
  </div>
</nav>