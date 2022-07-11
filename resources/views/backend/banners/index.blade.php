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
                                <h3 class=" card-title">All Banners</h3>
                                <p class="float-right">Total Banners: <strong>{{ \App\Models\Banner::count() }}</strong></p>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Condition</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td><img src="{{ $item->photo }}" style="max-width:150px;max-height:90px;"
                                                     alt="banner image"></td>
                                            <td>
                                                @if($item->condition=='banner')
                                                    <span class="badge badge-success">{{ $item->condition }}</span>
                                                @else
                                                    <span class="badge badge-primary">{{ $item->condition }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                       {{ $item->status=='active' ? 'checked' : '' }}
                                                       data-toggle="switchbutton" id="liveAlertBtn"
                                                       data-onlabel="active" data-offlabel="inactive"
                                                       data-onstyle="success" data-offstyle="danger" data-size="sm">

                                            </td>
                                            <td>
                                                <a href="{{ route('banner.edit', $item->id) }}"
                                                   class="btn float-left btn-sm btn-outline-warning" data-toggle="tooltip"
                                                   title="Edit" data-popper-placement="bottom"><i
                                                        class=" icon-note"></i></a>
                                                <form class="float-left ml-2" action="{{ route('banner.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('banner.destroy', $item->id) }}" class="btn btn-sm btn-outline-danger"
                                                       data-toggle="tooltip" data-id="{{ $item->id }}"
                                                       title="Delete" data-popper-placement="bottom"><i
                                                            class="dltBtn icon-trash"></i></a>
                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Photo</th>
                                        <th>Condition</th>
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
        $('.dltBtn').click(function (e){
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
                url: "{{ route('banner.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                        const alert = (message, type) => {
                            const wrapper = document.createElement('div')
                            wrapper.innerHTML = [
                                `<div class="alert alert-${type} alert-dismissible" id="banner-alert" role="alert">`,
                                `   <div>${message}</div>`,
                                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                '</div>'
                            ].join('')

                            alertPlaceholder.append(wrapper)
                        }

                        alert('Nice, you edit this banner status!', 'success')
                    } else {
                        alert('please try again');
                    }

                }
            })
        });
        setTimeout(function () {
            $('#banner-alert').slideUp();
        }, 3000);
    </script>
@endsection







