<!-- Js Plugins -->
<script src="{{ asset('ashion') }}/js/jquery-3.3.1.min.js"></script>
<script src="{{ asset('ashion') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('ashion') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('ashion') }}/js/jquery-ui.min.js"></script>
<script src="{{ asset('ashion') }}/js/mixitup.min.js"></script>
<script src="{{ asset('ashion') }}/js/jquery.countdown.min.js"></script>
<script src="{{ asset('ashion') }}/js/jquery.slicknav.js"></script>
<script src="{{ asset('ashion') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('ashion') }}/js/jquery.nicescroll.min.js"></script>
<script src="{{ asset('ashion') }}/js/main.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stack('js')
<script>
    $(document).ready(function() {
        $('.select-2').select2();
    });

    function rupiah(angka) {

        var number_string = angka.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp ' + rupiah;
    }
</script>
@if (session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
        }).showToast();
    </script>
@endif
