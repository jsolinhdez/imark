@extends('backend.layouts.master')


@section('content')


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="liveAlertPlaceholder"></div>

                        @include('backend.layouts.notifications')
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $number = explode('-',$order->order_number)
                                        @endphp
                                        <tr>
                                            <td>{{ $number[1] }}</td>
                                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->payment_method == "cod" ? "Cash on Delivery" : $order->payment_method}}</td>
                                            <td>{{ ucfirst($order->payment_status)}}</td>
                                            <td>{{ number_format($order->total_amount,2)}}</td>
                                            <td><span class="badge @if($order->condition=='pending')badge-info
                                                                             @elseif($order->condition=='proccessing')badge-warning
                                                                             @elseif($order->condition=='delivered')badge-success
                                                                             @elseif($order->condition=='cancelled')badge-danger
                                                @endif">{{ $order->condition }}</span> </td>
                                            <td>
                                                <a href="{{ route('order.show', $order->id) }}"
                                                   class="btn float-left btn-sm btn-outline-secondary"
                                                   data-toggle="tooltip"
                                                   title="View" data-popper-placement="bottom"><i
                                                        class=" icon-eye"></i></a>
                                                <form class="float-left ml-2"
                                                      action="{{ route('order.destroy',$order->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-toggle="tooltip" data-id="{{ $order->id }}"
                                                       title="delete" data-popper-placement="bottom"><i
                                                            class=" icon-trash"></i></a>
                                                </form>


                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
    <script>
        $('input[name=toogle]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{ route('coupon.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        const randomId = `banner-alert-${Math.floor(Math.random() * 1000)}`
                        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                        const alert = (message, type) => {
                            const wrapper = document.createElement('div')
                            wrapper.innerHTML = [
                                `<div class="alert-dismissible fade show alert alert-${type} alert-dismissible" id="${randomId}" role="alert">`,
                                `   <div>${message}</div>`,
                                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                '</div>'
                            ].join('')

                            alertPlaceholder.append(wrapper)
                            setTimeout(function () {
                                const query = "#" + randomId
                                $(query).slideUp();
                            }, 1500);
                        }

                        alert('Nice, you edit this banner status!', 'success')
                    } else {
                        alert('please try again');
                    }

                }
            })
        });

    </script>
@endsection








