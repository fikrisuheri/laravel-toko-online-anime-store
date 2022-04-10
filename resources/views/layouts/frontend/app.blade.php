<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.frontend.data.styles')
</head>

<body class="layout-3" >
    <div id="app">
        <div class="main-wrapper container ">
          
            @include('layouts.frontend.data.navbar')
            @include('layouts.frontend.data.sidebar')
          
            <!-- Main Content -->
            <div class="main-content">
              <section class="section">
                <div class="section-body mt-2">
                @yield('content')
                </div>
              </section>
            </div>
          </div>
          @include('layouts.frontend.data.footer')
    </div>
    @include('layouts.frontend.data.scripts')
</body>

</html>
