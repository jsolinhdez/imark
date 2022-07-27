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
                                <h3 class="card-title">Adicionar Shipping</h3>
                            </div>
                            <form action="{{ route('shipping.store') }}" method="POST">
                                @csrf
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="shipping_address">Shipping Address<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="shipping_address" value="{{ old('shipping_address') }}"
                                               placeholder="eg. ">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">Delivery Time<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="delivery_time" value="{{ old('delivery_time') }}"
                                               placeholder="eg. ">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_charge">Delivery Charge</label>
                                        <input type="number"  step="any" class="form-control" name="delivery_charge" value="{{ old('delivery_charge') }}"
                                               placeholder="eg. ">
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
                                    <a href="{{ route('shipping.index') }}" class="btn btn-secondary">Cancel</a>

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
