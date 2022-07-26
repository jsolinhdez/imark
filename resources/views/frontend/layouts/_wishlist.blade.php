<table class="table table-bordered text-center mb-0">
    <thead class="bg-secondary text-dark">
    <tr>
        <th>Products</th>
        <th>Price</th>
        <th><i class="icon-menu mr-lg-2"></i>Actions</th>
    </tr>
    </thead>
    <tbody class="align-middle">
    @if(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count() > 0)

        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item)
            <tr>
                <td class="align-middle"><img src="{{ $item->model->photo }}" alt=""
                                              style="width: 50px;"> {{ $item->model->title }}
                </td>
                <td class="align-middle">$ {{ number_format($item->price,2) }}</td>

                <td class="align-middle">
                    <a href="javascript:void(0)"
                       data-id="{{ $item->rowId }}" class="move_to_cart btn  text-dark p-0 mr-5"><i
                            class="icon-plus text-primary mr-1"></i>Add To Cart</a>
                    <a class="cart_delete btn  text-dark p-0" data-id="{{ $item->rowId }}"><i
                            class="icon-trash text-primary mr-1"></i>Remove</a>
                </td>
            </tr>
        @endforeach

    @else
        <tr>
            <td colspan="4">Your wish list is EMPTY</td>
        </tr>
    @endif

    </tbody>
</table>
