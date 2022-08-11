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
                                <h3 class=" card-title">All Coupons
                                    <a class="btn ml-2 btn-outline-secondary" href=" {{ route('coupon.create') }}"><i
                                            class="mr-1 icon-plus"></i>Add Coupon</a></h3>
                                <p class="float-right">Total Coupons:
                                    <strong>{{ \App\Models\Coupon::count() }}</strong></p>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S. N.</th>
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
                                    @forelse($orders as $item)
                                        @php
                                            $number = explode('-',$item->order_number)
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $number[1] }}</td>
                                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->payment_method == "cod" ? "Cash on Delivery" : $item->payment_method}}</td>
                                            <td>{{ ucfirst($item->payment_status)}}</td>
                                            <td>{{ number_format($item->total_amount,2)}}</td>
                                            <td><span class="badge @if($item->condition=='pending')badge-info
                                                                             @elseif($item->condition=='proccessing')badge-warning
                                                                             @elseif($item->condition=='delivered')badge-success
                                                                             @elseif($item->condition=='cancelled')badge-danger
                                                @endif">{{ $item->condition }}</span> </td>
                                            <td>
                                                <a href="{{ route('coupon.edit', $item->id) }}"
                                                   class="btn float-left btn-sm btn-outline-secondary"
                                                   data-toggle="tooltip"
                                                   title="View" data-popper-placement="bottom"><i
                                                        class=" icon-eye"></i></a>
                                                <form class="float-left ml-2"
                                                      action="{{ route('coupon.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-toggle="tooltip" data-id="{{ $item->id }}"
                                                       title="delete" data-popper-placement="bottom"><i
                                                            class=" icon-trash"></i></a>
                                                </form>


                                            </td>
                                        </tr>
                                    @empty
                                        <tr><h4>No Orders</h4></tr>
                                    @endforelse
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







