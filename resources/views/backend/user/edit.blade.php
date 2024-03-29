@extends('backend.layouts.master')


@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Banners</h3>
                            </div>
                            <form action="{{ route('user.update',$user->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="">Full Name<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="full_name"
                                               value="{{ $user->full_name }}"
                                               placeholder="Enter full name">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">User Name</label>
                                            <input type="text" class="form-control" name="username"
                                                   value="{{ $user->username  }}"
                                                   placeholder="Enter user name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ $user->email }}"
                                                   placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ $user->phone }}"
                                                   placeholder="Enter phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{ $user->address }}"
                                                   placeholder="Enter address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Role<span class="text-danger"> *</span></label>
                                        <select name="role" class="custom-select rounded-0">
                                            <option value="">--Chosse role--</option>
                                            <option value="admin" {{ $user->role== 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="vendor" {{ $user->role== 'vendor' ? 'selected' : '' }} >Vendor</option>
                                            <option value="customer" {{ $user->role== 'customer' ? 'selected' : '' }} >Customer</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Photo
                                                </h3>
                                            </div>
                                            <div class="input-group">
                                               <span class="input-group-btn">
                                                 <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                   <i class="fa fa-picture-o"></i> Chosse
                                                 </a>
                                               </span>
                                                <input id="thumbnail" class="form-control" value="{{ $user->photo }}" type="text" name="photo">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Description
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                          <textarea rows="3" name="description" id="description"
                                                    placeholder="Escriba <em>algun</em> <u>texto</u> <strong>aquí</strong>"
                                                    class="form-control">{{ $user->description }}

                                          </textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('user.index') }}">Cancel</a>


                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
        $(function () {
            // Summernote
            $('#description').summernote()

        })
    </script>
@endsection
