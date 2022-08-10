<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<!-- JavaScript Libraries -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>


<!-- Contact Javascript File -->
<script src="{{ asset('frontend//mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{ asset('frontend/mail/contact.js') }}"></script>


<!-- Import from backend-->
<!-- Bootstrap -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>


<!-- sweetalert2-->
<script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>


<!--animatet-->
<script src="{{ asset('frontend/animatet/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('frontend/animatet/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('frontend/animatet/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<script src="{{ asset('frontend/animatet/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{ asset('frontend/animatet/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>


<script src="{{ asset('frontend/js/bootstrap-notify.min.js') }}"></script>

<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        $.notify("Success: {{ \Illuminate\Support\Facades\Session::get('success') }}", {
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        });
    @endif
    @php
        \Illuminate\Support\Facades\Session::forget('success')
    @endphp

    @if(\Illuminate\Support\Facades\Session::has('error'))
    $.notify("Error: {{ \Illuminate\Support\Facades\Session::get('error') }}", {
        animate: {
            enter: 'animated fadeInRight',
            exit: 'animated fadeOutRight'
        }
    });
    @endif
    @php
        \Illuminate\Support\Facades\Session::forget('error')
    @endphp


</script>


@yield('scripts')
<script>
    setTimeout(function () {
        $('#alert').slideUp();
    }, 2000);
</script>
