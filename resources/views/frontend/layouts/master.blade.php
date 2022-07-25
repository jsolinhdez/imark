<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.head')

</head>

<body>

<nav id="nav-ajax">
    @include('frontend.layouts.nav')
</nav>




<div class="row">
    <div class="col-md-12 text-center notification-div">
        @include('backend.layouts.notifications')
    </div>
</div>

@yield('content')
<!-- Vendor End -->

@include('frontend.layouts.footer')


@include('frontend.layouts.script')

<script>

    $(document).on('click', '.cart_delete', function (e) {
        e.preventDefault();
        var cart_id = $(this).data('id');

        var token = "{{ csrf_token() }}";
        var path = "{{ route('cart.delete') }}";

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            success: function (data) {
                $('body #nav-ajax').html(data['nav']);
                if (data['status']) {
                    swal.fire({
                        title: "Good job",
                        text: data['message'],
                        icon: "success",
                        button: "Aww yiss!",
                    });
                }
            },
            error:function (err){
                console.log(err);
            }
        });

    });


</script>
</body>

</html>
