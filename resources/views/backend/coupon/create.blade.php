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
                                <h3 class="card-title">Add Coupon</h3>
                            </div>
                            <form action="{{ route('coupon.store') }}" method="POST">
                                @csrf
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="title">Coupon Code<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="code" value="{{ old('code') }}"
                                               placeholder="eg. HAPPY">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Coupon Value<span class="text-danger"> *</span></label>
                                        <input type="number" class="form-control" name="value" value="{{ old('value') }}"
                                               placeholder="eg. 10%">
                                    </div>



                                    <div class="col-md-6 form-group">
                                        <label for="status">Type<span class="text-danger"> *</span></label>
                                        <select name="type" class="custom-select rounded-0">
                                            <option value="">--Chosse type--</option>
                                            <option value="fixed" {{ old('type'== 'fixed' ? 'selected' : '') }}>
                                                Fixed
                                            </option>
                                            <option
                                                value="percent" {{ old('type'== 'percent' ? 'selected' : '') }} >
                                                Percentage
                                            </option>
                                        </select>
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



                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('coupon.index') }}" class="btn btn-secondary">Cancel</a>

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
            $('#summary').summernote()

        })
    </script>
    <script>
        $('#is_parent').change(function (e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            // alert(is_checked);
            if (is_checked) {
                $('#parent_cat_id').addClass('d-none');
                $('#parent_cat_id').val('');
            } else {
                $('#parent_cat_id').removeClass('d-none');
            }
        })
    </script>
@endsection
