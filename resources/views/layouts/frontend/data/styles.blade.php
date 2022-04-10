<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Blank Page &mdash; Stisla</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('stisla') }}/css/style.css">
<link rel="stylesheet" href="{{ asset('stisla') }}/css/components.css">
<link rel="stylesheet" type="text/css" href="{{ asset('datatables') }}/datatables.min.css" />
<style>
    /* body {
      background-color: #fff
    } */
    .product-img {
        width: 100%;
        height: 100%;
        background-color: #ddd;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .navbar-bg-mobile {
        content: ' ';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #6777ef;
        z-index: -1;
    }

    .pr-0 {
        padding-right: 0px !important;
    }

    .left-0 {
        left: 0px !important;
    }

    .text-product {
        font-weight: 600;
        font-size: 16px;
    }

    .text-price {
        color: #000;
        font-weight: 800;
        font-size: 20px;
    }

    @media only screen and (max-width: 768px) {
        .navbar {
            background-color: white;
        }

        .navbar .nav-link.nav-link-user {
            color: #6777ef;
        }

        .icon-notification {
            color: #6777ef;
        }

        .text-product {
            font-weight: 600;
            font-size: 12px;
        }

        .text-price {
            color: #000;
            font-weight: 800;
            font-size: 16px;
        }
    }

</style>
@stack('css')
