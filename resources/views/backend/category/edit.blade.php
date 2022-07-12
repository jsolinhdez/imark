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
                                <h3 class="card-title">Edit Category</h3>
                            </div>
                            <form action="{{ route('category.update',$category->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $category->title }}"
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
                                                    class="form-control">{{ $category->summary }}

                                          </textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="">Is Parent :<span class="text-danger"> *</span></label>
                                        <input id="is_parent" name="is_parent" value="{{$category->is_parent}}" type="checkbox" {{ $category->is_parent == 1 ? 'checked' : '' }}> Yes
                                    </div>


                                    <div class="col-md-6 form-group {{ $category->is_parent == 1 ? 'd-none' : '' }}"
                                         id="parent_cat_id">
                                        <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" class="custom-select rounded-0 show-tick">
                                            <option value="">--Chosse parent category--</option>
                                            @foreach($parent_cats as $pcats)
                                                <option
                                                    value="{{$pcats->id}}" {{ $pcats->id == $category->parent_id ? 'selected' : '' }}>{{$pcats->title}}</option>
                                            @endforeach
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
                                                <input id="thumbnail" class="form-control" type="text" name="photo"
                                                       value="{{ $category->photo }}">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>


                                </div>

                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('category.index') }}">Cancel</a>


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
    <script>
        $('#is_parent').change(function (e) {
            e.preventDefault();
            var is_checked = $('#is_parent').prop('checked');
            // alert(is_checked);
            if (is_checked) {
                $('#parent_cat_id').addClass('d-none');
                $('#is_parent').val('1');
            } else {
                $('#parent_cat_id').removeClass('d-none');
            }
        })
    </script>
@endsection
