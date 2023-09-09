<?php

namespace App\Http\Controllers;

use App\Models\ShippingDetail;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingDetailCreateRequest;

class ShippingDetailController extends Controller
{
    /**
     * Show the form for saving shipping details.
     * Accessed when user clicks checkout button from cart page
     */
    public function create()
    {
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

        // Redirect to the shipping details page.
        return redirect()->route('payment.index');
        //Then go to payment step (payment)
    }
}
