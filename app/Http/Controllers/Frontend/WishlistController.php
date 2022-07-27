<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('frontend.pages.wishlist');
    }

    public function wishlistStore(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product = Product::getProductByCart($product_id);
        $price = $product[0]['offer_price'];

        $wishlist_array = [];
        foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->content() as $item) {
            $wishlist_array[] = $item->id;
        }
        if (in_array($product_id, $wishlist_array)) {
            $response['present'] = true;
            $response['message'] = "Item is already in your wishlist";
        } else {
            $result = \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->add($product_id, $product[0]['title'], $product_qty, $price)->associate('App\Models\Product');
            if ($result) {
                $response['status'] = true;
                $response['message'] = "Item added to your wishlist successfully";
                $response['wishlist_count'] = \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count();

            }
        }
        return json_encode($response);
    }

    public function moveToCart(Request $request)
    {
        $item = \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->get($request->input('rowId'));

        \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->remove($request->input('rowId'));
        $result = \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');

        if ($result) {
            $response['status'] = true;
            $response['message'] = "Item has been moved to cart";
            $response['cart_count'] = \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count();
        }
        if ($request->ajax()){
            $wishlist =  view('frontend.layouts._wishlist')->render();
            $response['wishlist_list'] = $wishlist;
            $nav =  view('frontend.layouts.nav')->render();
            $response['nav-ajax'] = $nav;

        }

        return $response;
    }

    public function wishlistRemove(Request $request){
        $id = $request->input('rowId');
        \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->remove($id);

        $response['status'] = true;
        $response['message'] = "Item successfully removed from your wishlist";
        $response['cart_count'] = \Gloudemans\Shoppingcart\Facades\Cart::instance('wishlist')->count();

        if ($request->ajax()) {
            $wishlist =  view('frontend.layouts._wishlist')->render();
            $response['wishlist_list'] = $wishlist;
            $nav =  view('frontend.layouts.nav')->render();
            $response['nav-ajax'] = $nav;
        }
        return $response;
    }














}
