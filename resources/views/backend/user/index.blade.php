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
                                <h3 class=" card-title">All Users
                                    <a class="btn ml-2 btn-outline-secondary" href=" {{ route('user.create') }}"><i
                                            class="mr-1 icon-plus"></i>Add User</a></h3>

                                <p class="float-right">Total Users: <strong>{{ \App\Models\User::count() }}</strong></p>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center"><img src="{{ $item->photo }}"
                                                     style="max-width:150px;max-height:90px;border-radius: 50%"
                                                     alt="user image"></td>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->role }}</td>

                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                       {{ $item->status=='active' ? 'checked' : '' }}
                                                       data-toggle="switchbutton" id="liveAlertBtn"
                                                       data-onlabel="active" data-offlabel="inactive"
                                                       data-onstyle="success" data-offstyle="danger" data-size="sm">

                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   class="btn ml-2 float-left btn-sm btn-outline-info "
                                                   data-toggle="tooltip" data-bs-toggle="modal"
                                                   data-bs-target="#userID{{$item->id}}"
                                                   title="view" data-popper-placement="bottom"><i
                                                        class=" icon-eye"></i></a>
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                   class="btn float-left btn-sm ml-2 btn-outline-warning"
                                                   data-toggle="tooltip"
                                                   title="Edit" data-popper-placement="bottom"><i
                                                        class=" icon-note"></i></a>
                                                <form class="float-left ml-2"
                                                      action="{{ route('user.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-toggle="tooltip" data-id="{{ $item->id }}"
                                                       title="delete" data-popper-placement="bottom"><i
                                                            class=" icon-trash"></i></a>
                                                </form>


                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="userID{{$item->id}}"
                                                 data-bs-backdrop="static"
                                                 data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                    @php
                                                        $user = \App\Models\User::where('id',$item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                        <div class="text-center m-4">
                                                            <img class="ml-2" src="{{ $user->photo }}"
                                                                 style="border-radius: 50%;max-width: 200px;">

                                                        </div>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                {{$user->full_name}} </h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <strong >User</strong>
                                                            <span class="ml-2">{{$user->username}}</span>

                                                            <div class="mt-3 row">
                                                                <div class="col-md-6">
                                                                    <strong>Email</strong>
                                                                    <p>{{ $user->email }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Address</strong>
                                                                    <p>{{ $user->address }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Phone</strong>
                                                                    <p>{{ $user->phone }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Role</strong>
                                                                    <p>{{ $user->role }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Status</strong>
                                                                    @if($user->status=='active')
                                                                        <p class="badge badge-success">{{ $user->status }}</p>
                                                                    @else
                                                                        <p class="badge badge-secondary">{{ $user->status }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal"> Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
                url: "{{ route('user.status') }}",
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

                        alert('Nice, you edit this user status!', 'success')
                    } else {
                        alert('please try again');
                    }

                }
            })
        });

    </script>
@endsection







