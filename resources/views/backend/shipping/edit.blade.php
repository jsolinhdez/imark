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
                            <form action="{{ route('shipping.update',$shipping->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row card-body">
                                    <div class="form-group">
                                        <label for="shipping_address">Shipping Address<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="shipping_address" value="{{ $shipping->shipping_address }}"
                                               placeholder="eg. Kamastry Dalas ">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_time">Delivery Time<span class="text-danger"> *</span></label>
                                        <input type="text" class="form-control" name="delivery_time" value="{{ $shipping->delivery_time }}"
                                               placeholder="eg. 31 dias">
                                    </div>
                                    <div class="form-group">
                                        <label for="delivery_charge">Delivery Charge</label>
                                        <input type="number"  step="any" class="form-control" name="delivery_charge" value="{{ $shipping->delivery_charge }}"
                                               placeholder="eg. 32.00">
                                    </div>

                                </div>
                                <!-- /.card-body -->


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('shipping.index') }}">Cancel</a>


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
