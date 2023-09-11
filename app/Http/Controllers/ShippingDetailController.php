<?php

namespace App\Http\Controllers;

use App\Models\ShippingDetail;
use App\Http\Requests\ShippingDetailCreateRequest;
use App\Services\CartService;


class ShippingDetailController extends Controller
{
    public function __construct()
    {
        $this->cartService = new CartService;
    }

    /**
     * Show the form for saving shipping details.
     * Accessed when user clicks checkout button from cart page
     */
    public function create()
    {
        //Get total using service class to avoid repeated code in paymentcontroller
        $total = $this->cartService->getTotalPriceFromCart();

        //Enter shipping details
        return view('shippingDetail.create');
    }

    /**
     * Store a newly created resource in storage.
     * Use ShippingDetailCreateRequest for validation
     */
    public function store(ShippingDetailCreateRequest $request)
    {
        //Store shipping details for the user
        $shipping_detail = new ShippingDetail();
        $shipping_detail->user_id = auth()->id;
        $shipping_detail->address_1 = $request->get('address_1');
        $shipping_detail->town = $request->get('town');
        $shipping_detail->postcode = $request->get('postcode');

        $shipping_detail->save();

        //Then go to next step (payment)
        return redirect()->route('payment.create');
    }
}
