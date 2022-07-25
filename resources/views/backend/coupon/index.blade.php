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
                                        <th>S.N.</th>
                                        <th>Code</th>
                                        <th>Type</th>
                                        <th>Value</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($coupons as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>
                                                @if($item->type=='fixed')
                                                    <span class="badge badge-success">{{ $item->type }}</span>
                                                @else
                                                    <span class="badge badge-primary">{{ $item->type }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->value }} %</td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                       {{ $item->status=='active' ? 'checked' : '' }}
                                                       data-toggle="switchbutton" id="liveAlertBtn"
                                                       data-onlabel="active" data-offlabel="inactive"
                                                       data-onstyle="success" data-offstyle="danger" data-size="sm">

                                            </td>
                                            <td>
                                                <a href="{{ route('coupon.edit', $item->id) }}"
                                                   class="btn float-left btn-sm btn-outline-warning"
                                                   data-toggle="tooltip"
                                                   title="Edit" data-popper-placement="bottom"><i
                                                        class=" icon-note"></i></a>
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
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Code</th>
                                        <th>Value</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                    </tfoot>
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







