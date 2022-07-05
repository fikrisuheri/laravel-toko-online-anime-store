<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $app_name }}</title>
  <link rel="shortcut icon" href="{{ $app_logo }}" type="image/x-icon">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla') }}/modules/owlcarousel2/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('stisla') }}/modules/owlcarousel2/owl.theme.default.min.css">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('stisla') }}/css/components.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('datatables') }}/datatables.min.css"/>
  @stack('css')