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
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <form action="{{ route('product.store') }}" method="POST">
                                @csrf
                                <div class="row card-body">
                                    <div class="form-group col-md-6">
                                        <label for="">Title<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                               placeholder="Enter title">
                                    </div>

                                    <div class="form-group col-md-2 ">
                                        <label for="">Price<span class="text-danger"> *</span></label>
                                        <input type="number" step="any" class="form-control" name="price" value="{{ old('price') }}"
                                               placeholder="$ XX.XX Price">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">Stock<span class="text-danger"> *</span></label>
                                        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}"
                                               placeholder="# Stock">
                                    </div>

                                    <div class="form-group col-md-1">
                                        <label for="">Discount</label>
                                        <input type="number" step="any" class="form-control" name="discount" value="{{ old('discount') }}"
                                               placeholder="Discount%">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="">
                                            <label for="">Photo<span class="text-danger"> *</span></label>

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

                                    <div class="form-group col-md-6 card">
                                        Summary
                                        <textarea rows="3" name="summary" id="summary"
                                                  placeholder="Escriba <em>algun</em> <u>texto</u> <strong>aquí</strong>"
                                                  class="form-control">{{ old('summary') }}
                                          </textarea>
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


                                    <div class="col-md-4 form-group">
                                        <label for="">Brand<span class="text-danger"> *</span></label>
                                        <select name="" class="custom-select rounded-0">
                                            <option value="">--Chosse brand--</option>
                                            @foreach(\App\Models\Brand::get() as $brand)
                                                <option value="">{{ $brand->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
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
                                    <div class="col-md-4 form-group">
                                        <label for="">Size</label>
                                        <select name="size" class="custom-select rounded-0">
                                            <option value="">--Chosse size--</option>
                                            <option value="S" {{ old('size'== 'S' ? 'selected' : '') }}>Small</option>
                                            <option value="M" {{ old('size'== 'M' ? 'selected' : '') }}>Medium</option>
                                            <option value="L" {{ old('size'== 'L' ? 'selected' : '') }}>Large</option>
                                            <option value="XL" {{ old('size'== 'L' ? 'selected' : '') }}>Extra Large</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="condition">Condition<span class="text-danger"> *</span></label>
                                        <select name="condition" class="custom-select rounded-0">
                                            <option value="">--Chosse condition--</option>
                                            <option value="new" {{ old('conditions'== 'new' ? 'selected' : '') }}>
                                                New
                                            </option>
                                            <option value="popular" {{ old('conditions'== 'popular' ? 'selected' : '') }} >
                                                Popular
                                            </option>
                                            <option value="winter" {{ old('conditions'== 'winter' ? 'selected' : '') }} >
                                                Winter
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Category<span class="text-danger"> *</span></label>
                                        <select name="condition" class="custom-select rounded-0">
                                            <option value="">--Chosse category--</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Child Category<span class="text-danger"> *</span></label>
                                        <select name="condition" class="custom-select rounded-0">
                                            <option value="">--Chosse child category--</option>

                                        </select>
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
            $('#description').summernote()

        })
    </script>
    <script>
        $('#lfm').filemanager('image');
        $(function () {
            // Summernote
            $('#summary').summernote()

        })
    </script>
@endsection
