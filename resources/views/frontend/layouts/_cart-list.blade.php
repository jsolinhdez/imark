<table class="table table-bordered text-center mb-0">
    <thead class="bg-secondary text-dark">
    <tr>
        <th>Products</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Remove <i class="icon-trash"></i></th>
    </tr>
    </thead>
    <tbody class="align-middle">
    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
        <tr>
            @php
                $photos = explode(',',$item->model->photo);
            @endphp
            @php
                $phosi = explode('com',$photos[0]);
            @endphp
            <td class="align-middle"><img src="{{ $phosi[1] }}" alt=""
                                          style="width: 50px;"> {{ $item->model->title }}
            </td>
            <td class="align-middle">$ {{ number_format($item->price,2) }}</td>
            <td class="align-middle" style="width: 20px">
                <div class="input-group-btn quantity" id="cart_counter">
                    <input type="number" class="qty-text" data-id="{{ $item->rowId }}"
                           id="qty-input-{{ $item->rowId }}"
                           name="quantity" value="{{ $item->qty }}" style="border: none;width: 60%">

                    <input type="hidden" data-id="{{ $item->rowId }}"
                           data-product-quantity="{{ $item->model->stock }}"
                           id="update-cart-{{ $item->rowId }}">
                </div>
            </td>
            <td class="align-middle">$ {{ $item->subtotal() }}</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-primary cart_delete" data-id="{{ $item->rowId }}"><i
                        class="fa fa-times"></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
