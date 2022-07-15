@extends('backend.layouts.master')


@section('content')


    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="liveAlertPlaceholder"></div>

                        @include('backend.layouts.notifications')
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class=" card-title">All Products
                                    <a class="btn ml-2 btn-outline-secondary" href=" {{ route('product.create') }}"><i
                                            class="mr-1 icon-plus"></i>Add product</a></h3>

                                <p class="float-right">Total Products:
                                    <strong>{{ \App\Models\Product::count() }}</strong></p>

                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Size</th>
                                        <th>Conditions</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>

                                            <td><img src="{{ $item->photo }}" style="max-width:150px;max-height:90px;"
                                                     alt="product image"></td>
                                            <td>${{ number_format($item->price,2) }}</td>
                                            <td>{{ $item->discount}}%</td>
                                            <td><span class="badge badge-light">{{ $item->size }}</span></td>
                                            <td>
                                                @if($item->condition=='new')
                                                    <span class="badge badge-success">{{ $item->condition }}</span>
                                                @elseif($item->condition=='popular')
                                                    <span class="badge  badge-warning">{{ $item->condition }}</span>
                                                @else
                                                    <span class="badge badge-primary">{{ $item->condition }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" name="toogle" value="{{ $item->id }}"
                                                       {{ $item->status=='active' ? 'checked' : '' }}
                                                       data-toggle="switchbutton" id="liveAlertBtn"
                                                       data-onlabel="active" data-offlabel="inactive"
                                                       data-onstyle="success" data-offstyle="danger" data-size="sm">

                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   class="btn ml-2 float-left btn-sm btn-outline-info "
                                                   data-toggle="tooltip" data-bs-toggle="modal"
                                                   data-bs-target="#productID{{$item->id}}"
                                                   title="view" data-popper-placement="bottom"><i
                                                        class=" icon-eye"></i></a>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                   class="btn ml-2 float-left btn-sm btn-outline-warning"
                                                   data-toggle="tooltip"
                                                   title="Edit" data-popper-placement="bottom"><i
                                                        class=" icon-note"></i></a>

                                                <form class="float-left ml-2"
                                                      action="{{ route('product.destroy',$item->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="" class="dltBtn btn btn-sm btn-outline-danger"
                                                       data-toggle="tooltip" data-id="{{ $item->id }}"
                                                       title="delete" data-popper-placement="bottom"><i
                                                            class=" icon-trash"></i></a>
                                                </form>


                                            </td>
                                            <!-- Modal -->
                                            <div class="modal fade" id="productID{{$item->id}}"
                                                 data-bs-backdrop="static"
                                                 data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog modal-dialog-centered">
                                                    @php
                                                        $product = \App\Models\Product::where('id',$item->id)->first();
                                                    @endphp
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">
                                                                {{$product->title}}</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <strong>Summary</strong>
                                                            <p>{!! html_entity_decode($product->summary) !!}</p>

                                                            <strong>Description</strong>
                                                            <p>{!! html_entity_decode($product->description) !!}</p>

                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Price</strong>
                                                                    <p>$ {{number_format($product->price,2)}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Offer Price</strong>
                                                                    <p>$ {{number_format($product->offer_price,2)}}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Stock</strong>
                                                                    <p>{{number_format($product->stock)}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Category</strong>
                                                                    <p>{{ \App\Models\Category::where('id',$product->cat_id)->value('title') }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Child Category</strong>
                                                                    <p>{{ \App\Models\Category::where('id',$product->child_cat_id)->value('title') }}</p>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Brand</strong>
                                                                    <p>{{ \App\Models\Brand::where('id',$product->brand_id)->value('title') }}</p>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <strong>Vendor</strong>
                                                                    <p >{{ \App\Models\User::where('id',$product->vendor_id)->value('full_name') }}</p>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <strong>Condition</strong>
                                                                    <p class="badge badge-warning">{{ $product->condition }}</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Size</strong>
                                                                    <p class="badge badge-light">{{ $product->size }}</p>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <strong>Status</strong>
                                                                    @if($product->status=='active')
                                                                        <p class="badge badge-success">{{ $product->status }}</p>
                                                                    @else
                                                                        <p class="badge badge-secondary">{{ $product->status }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal"> Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Title</th>
                                        <th>Photo</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Size</th>
                                        <th>Conditions</th>
                                        <th>Status</th>
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
    <script>
        $('input[name=toogle]').change(function () {
            var mode = $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
                url: "{{ route('product.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        const randomId = `banner-alert-${Math.floor(Math.random() * 1000)}`
                        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                        const alert = (message, type) => {
                            const wrapper = document.createElement('div')
                            wrapper.innerHTML = [
                                `<div class="alert-dismissible fade show alert alert-${type} alert-dismissible" id="${randomId}" role="alert">`,
                                `   <div>${message}</div>`,
                                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                                '</div>'
                            ].join('')

                            alertPlaceholder.append(wrapper)
                            setTimeout(function () {
                                const query = "#" + randomId
                                $(query).slideUp();
                            }, 1500);
                        }

                        alert('Nice, you edit this banner status!', 'success')
                    } else {
                        alert('please try again');
                    }

                }
            })
        });

    </script>
@endsection







