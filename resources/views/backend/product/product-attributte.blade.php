@extends('backend.layouts.master')


@section('content')


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
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
                        <div id="liveAlertPlaceholder"></div>

                        @include('backend.layouts.notifications')
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=" card-title">{{ ucfirst($product->title) }}</h3>


                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('product.attribute',$product->id) }}" method="POST">
                                    @csrf
                                    <div id="product_attribute" class="content" data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                        <div class="row mb-2">
                                            <div class="col-md-12"><button type="button" id="btnAdd-1" class="btn btn-primary"><i class="icon-plus"></i></button></div>
                                        </div>
                                        <div class="row group">
                                            <div class="col-md-1">
                                                <label for="">Size</label>
                                                <input class="form-control" placeholder="eg. S" name="size[]" type="text">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Original Price</label>
                                                <input class="form-control" placeholder="eg. 1500" name="original_price[]" type="number" step="any">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Offer Price</label>
                                                <input class="form-control" placeholder="eg. 1200" name="offer_price[]" type="number" step="any">
                                            </div>
                                            <div class="col-md-1">
                                                <label for="">Stock</label>
                                                <input class="form-control" placeholder="eg. 8" name="stock[]" type="number">
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" class="mt-4 btn btn-danger btnRemove"><i class="icon-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-4 btn btn-success">Submit</button>

                                </form>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Size</th>
                                        <th>Original</th>
                                        <th>Offer</th>
                                        <th>Stock</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($productattr)>0)
                                            @foreach($productattr as $item)
                                                <tr>
                                                    <td>{{ $item->size }}</td>
                                                    <td>$ {{ number_format($item->original_price,2) }}</td>
                                                    <td>$ {{ number_format($item->offer_price ,2)}}</td>
                                                    <td>{{ $item->stock }}</td>
                                                    <td><form class="float-left ml-2"
                                                              action="{{ route('product.attribute.destroy',$item->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="" class="dltBtn btn btn-sm btn-outline-danger"
                                                               data-toggle="tooltip" data-id="{{ $item->id }}"
                                                               title="delete" data-popper-placement="bottom"><i
                                                                    class=" icon-trash"></i></a>
                                                        </form></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Size</th>
                                        <th>Original</th>
                                        <th>Offer</th>
                                        <th>Stock</th>
                                        <th>Actions</th>

                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
@endsection

@section('scripts')

    <script src="{{ asset('backend/assets/js/jquery.multifield.min.js') }}"></script>
    <script>
        $('#product_attribute').multifield();
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dltBtn').click(function (e) {
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>

@endsection







