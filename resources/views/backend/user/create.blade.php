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
                                <h3 class="card-title">Add Banner</h3>
                            </div>
                            <form action="{{ route('user.store') }}" method="POST">
                                @csrf
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="">Full Name<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="full_name"
                                               value="{{ old('full_name') }}"
                                               placeholder="Enter full name">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">User Name</label>
                                            <input type="text" class="form-control" name="username"
                                                   value="{{ old('username') }}"
                                                   placeholder="Enter user name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}"
                                                   placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Phone</label>
                                            <input type="text" class="form-control" name="phone"
                                                   value="{{ old('phone') }}"
                                                   placeholder="Enter phone">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{ old('address') }}"
                                                   placeholder="Enter address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="status">Status<span class="text-danger"> *</span></label>
                                        <select name="status" class="custom-select rounded-0">
                                            <option value="">--Chosse status--</option>
                                            <option value="active" {{ old('status'== 'active' ? 'selected' : '') }}>
                                                Activo
                                            </option>
                                            <option
                                                value="inactive" {{ old('status'== 'inactive' ? 'selected' : '') }} >
                                                Inactivo
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="">Role<span class="text-danger"> *</span></label>
                                        <select name="role" class="custom-select rounded-0">
                                            <option value="">--Chosse role--</option>
                                            <option value="admin" {{ old('role'== 'admin' ? 'selected' : '') }}>Admin</option>
                                            <option value="vendor" {{ old('role'== 'vendor' ? 'selected' : '') }} >Vendor</option>
                                            <option value="customer" {{ old('role'== 'customer' ? 'selected' : '') }} >Customer</option>

                                        </select>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Password<span class="text-danger"> *</span></label>
                                        <input type="password" class="form-control" name="password"
                                               value="{{ old('password') }}"
                                               placeholder="Enter password">
                                    </div>
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
                                                <input id="thumbnail" class="form-control" type="text" name="photo">
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
                                                    class="form-control">{{ old('description') }}

                                          </textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>

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
