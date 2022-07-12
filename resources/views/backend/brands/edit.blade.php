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
                            <form action="{{ route('brand.update',$brand->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="title">Título</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $brand->title }}"
                                               placeholder="Introduzca el título">
                                    </div>


                                    <div class="form-group">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Photo<span class="text-danger"> *</span>
                                                </h3>
                                            </div>
                                            <div class="input-group">
                                               <span class="input-group-btn">
                                                 <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                   <i class="fa fa-picture-o"></i> Seleccione
                                                 </a>
                                               </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo"
                                                       value="{{$brand->photo}}">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>




                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('brand.index') }}">Cancel</a>


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
