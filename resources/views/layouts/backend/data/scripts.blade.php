
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="{{ asset('datatables') }}/datatables.min.js"></script>

  <script src="{{ asset('stisla') }}/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla') }}/modules/owlcarousel2/owl.carousel.min.js"></script>
  <script src="{{ asset('stisla') }}/modules/summernote/summernote-bs4.js"></script>
  <script src="{{ asset('stisla') }}/js/scripts.js"></script>
  <script src="{{ asset('stisla') }}/js/custom.js"></script>
  {{-- <script src="{{ asset('stisla') }}/js/page/modules-datatables.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="{{ LarapexChart::cdn() }}"></script>
 

  <script>
    $(() => {
      $("#table-1").dataTable({
        responsive : true
      });
    })
    
    $('.btn-delete').click(function(e) {
      e.preventDefault();
      var url = $(this).attr('href');
      swal({
        title: "{{ __('message.dialog_title') }}",
        text: "{{ __('message.dialog_delete') }}",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = url;
        }
      });
    });
  </script>
  @stack('js')