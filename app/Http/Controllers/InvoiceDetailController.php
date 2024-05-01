<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\shipping;
use App\Models\Invoice;
use App\Models\InvoiceDetail;


class InvoiceDetailController extends Controller
{
    public function orderDetail($id)
    {
        $invoice_by_user = Invoice::where('user_id', session()->get('id'))->get();

        $products = InvoiceDetail::where('invoice_id', $id)->get();

        $shipping = shipping::where('invoice_id', $id)->first();

        return view('order_detail', [
            'products' => $products,
            'invoice_by_user' => $invoice_by_user,
            'shipping' => $shipping
        ]);
    }

    public function orderDetailAdmin($id)
    {
        $invoice_by_user = Invoice::where('user_id', session()->get('id'))->get();

        $products = InvoiceDetail::where('invoice_id', $id)->get();

        $shipping = shipping::where('invoice_id', $id)->first();

        return view('Order.showOrder', [
            'products' => $products,
            'invoice_by_user' => $invoice_by_user,
            'shipping' => $shipping
        ]);
    }
}
