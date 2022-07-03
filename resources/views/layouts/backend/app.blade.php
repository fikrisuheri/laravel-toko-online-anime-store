<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.backend.data.styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.backend.data.navbar')
            @include('layouts.backend.data.sidebar')
            <div class="main-content">
                <section class="section">
                    @include('layouts.backend.data.breadcrumbs')
                    @if (session()->has('error') || session()->has('success'))
                        <div class="container-fluid">
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error ! </strong> {{ session()->get('error') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Yeay ! </strong> {{ session()->get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                </div>
                            @endif
                        </div>
                    @endif
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            @stack('modal')
            @include('layouts.backend.data.footer')
        </div>
    </div>w
    @include('layouts.backend.data.scripts')
</body>

</html>
