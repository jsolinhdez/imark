<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout1()
    {
        $user = Auth::user();
        return view('frontend.pages.checkout.checkout1', compact('user'));
    }


    public function checkout2()
    {
        $shippings = Shipping::where('status', 'active')->orderBy('shipping_address', 'ASC')->get();


        return view('frontend.pages.checkout.checkout2', compact('shippings'));
    }





    public function checkout1Store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'email|required|exists:users,email',
            'phone' => 'string|required',
            'address' => 'string|required',
            'city' => 'string|required',
            'country' => 'string|nullable',
            'state' => 'string|nullable',
            'postcode' => 'numeric|nullable',
            'note' => 'string|nullable',
            'saddress' => 'string|required',
            'scity' => 'string|required',
            'scountry' => 'string|nullable',
            'sstate' => 'string|nullable',
            'spostcode' => 'numeric|nullable',
            'sub_total' => 'required',
            'total_amount' => 'required',

        ]);

        Session::put('checkout', [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            'note' => $request->note,
            'sfirst_name' => $request->sfirst_name,
            'slast_name' => $request->slast_name,
            'semail' => $request->semail,
            'sphone' => $request->sphone,
            'saddress' => $request->saddress,
            'scountry' => $request->scountry,
            'scity' => $request->scity,
            'sstate' => $request->sstate,
            'spostcode' => $request->spostcode,

            'sub_total' => $request->sub_total,
            'total_amount' => $request->total_amount,
       ]);

        $shippings = Shipping::where('status', 'active')->orderBy('shipping_address', 'ASC')->get();


        return view('frontend.pages.checkout.checkout2', compact('shippings'));

    }

    public function checkout2Store(Request $request)
    {
        $this->validate($request, [
            'delivery_charge' => 'required|numeric',
        ]);
        Session::push('checkout', [
            'delivery_charge' => $request->delivery_charge,
        ]);

        return view('frontend.pages.checkout.checkout3');
    }

    public function checkout3Store(Request $request)
    {
        $this->validate($request, [
            'payment_method' => 'string|required',
            'payment_status' => 'string|in:paid,unpaid',
        ]);

        Session::push('checkout', [
            'payment_method' => $request->payment_method,
            'payment_status' => 'paid',
        ]);


        return view('frontend.pages.checkout.checkout4');
    }

    public function checkoutStore()
    {

        $order = new Order();

        $order['user_id'] = auth()->user()->id;
        $order['order_number'] = Str::upper('ORD-' . Str::random(6));

        $order['sub_total'] = (float)str_replace(',','',Session::get('checkout')['sub_total']);

        if (Session::has('coupon'))
            $order['coupon'] = Session::get('coupon')['value'];
        else {
            $order['coupon'] = 0;
        }

        $order['total_amount'] = (float)str_replace(',','',Session::get('checkout')['sub_total']) + Session::get('checkout')[0]['delivery_charge'] - $order['coupon'];


        $order['payment_method'] = Session::get('checkout')['1']['payment_method'];
        $order['payment_status'] = Session::get('checkout')['1']['payment_status'];
        $order['condition'] = 'pending';
        $order['delivery_charge'] = Session::get('checkout')['0']['delivery_charge'];
        $order['first_name'] = Session::get('checkout')['first_name'];
        $order['last_name'] = Session::get('checkout')['last_name'];
        $order['email'] = Session::get('checkout')['email'];
        $order['phone'] = Session::get('checkout')['phone'];
        $order['country'] = Session::get('checkout')['country'];
        $order['address'] = Session::get('checkout')['address'];
        $order['city'] = Session::get('checkout')['city'];
        $order['state'] = Session::get('checkout')['state'];
        $order['postcode'] = Session::get('checkout')['postcode'];
        $order['note'] = Session::get('checkout')['note'];
        $order['sfirst_name'] = Session::get('checkout')['sfirst_name'];
        $order['slast_name'] = Session::get('checkout')['slast_name'];
        $order['semail'] = Session::get('checkout')['semail'];
        $order['sphone'] = Session::get('checkout')['sphone'];
        $order['scountry'] = Session::get('checkout')['scountry'];
        $order['saddress'] = Session::get('checkout')['saddress'];
        $order['scity'] = Session::get('checkout')['scity'];
        $order['sstate'] = Session::get('checkout')['sstate'];
        $order['spostcode'] = Session::get('checkout')['spostcode'];

        $status = $order->save();

        if ($status) {
            Cart::instance('shopping')->destroy();
            Session::forget('coupon');
            Session::forget('checkout');
            return redirect()->route('complete', $order['order_number']);
        } else {

            return redirect()->route('checkout1') - with('error', 'Pls try again');
        }

    }

    public function complete($order)
    {
        $order = $order;
        return view('frontend.pages.checkout.checkout-complete', compact('order'));
    }

}
