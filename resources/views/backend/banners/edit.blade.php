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
                            <form action="{{ route('banner.update',$banner->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="title">Título<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ $banner->title }}"
                                               placeholder="Introduzca el título">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Descripción
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                          <textarea rows="3" name="description" id="description"
                                                    placeholder="Escriba <em>algun</em> <u>texto</u> <strong>aquí</strong>"
                                                    class="form-control">{{ $banner->description }}

                                          </textarea>
                                            </div>
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
                                                   <i class="fa fa-picture-o"></i> Seleccione
                                                 </a>
                                               </span>
                                                <input id="thumbnail" class="form-control" type="text" name="photo"
                                                       value="{{$banner->photo}}">
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="condition">Condition<span class="text-danger"> *</span></label>
                                        <select name="condition" class="custom-select rounded-0">
                                            <option value="">--Chosse condition--</option>
                                            <option value="banner" {{  $banner->condition == 'banner' ? 'selected' : '' }}>
                                                Bannner
                                            </option>
                                            <option value="promo" {{ $banner->condition == 'promo' ? 'selected' : '' }} >
                                                Promo
                                            </option>
                                        </select>
                                    </div>


                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <input class="btn btn-outline-secondary" type="button" value="Cancel" onclick="history.back()"/>

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
