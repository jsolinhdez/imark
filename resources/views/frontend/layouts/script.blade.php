<!-- JavaScript Libraries -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>

<script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('frontend//mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{ asset('frontend/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!-- Import from backend-->
<!-- Bootstrap -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<script>
    setTimeout(function (){
        $('#alert').slideUp();
    },2000);
</script>
<!-- sweetalert2-->
<script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>


@yield('scripts')
