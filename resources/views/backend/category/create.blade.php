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
                                <h3 class="card-title">Add Category</h3>
                            </div>
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                               placeholder="Enter title">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Summary
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                          <textarea rows="3" name="summary" id="summary"
                                                    placeholder="write <em>some</em> <u>text</u> <strong>here</strong>"
                                                    class="form-control">{{ old('summary') }}

                                          </textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="">Is Parent :<span class="text-danger"> *</span></label>
                                        <input id="is_parent" name="is_parent" value="1" type="checkbox" checked> Yes
                                    </div>


                                    <div class="col-md-6 form-group d-none" id="parent_cat_id">
                                        <label for="">Parent Category</label>
                                        <select name="parent_id" class="custom-select rounded-0">
                                            <option value="">--Chosse parent category--</option>
                                            @foreach($parent_cats as $pcats)
                                                <option value="{{$pcats->id}}" {{ old('parent_id') == $pcats->id ? 'selected' : '' }}>{{$pcats->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="status">Status</label>
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


                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
