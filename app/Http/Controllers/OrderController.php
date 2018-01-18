<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function getList() {
        return Order::All();
    }

    public function postAdd(OrderRequest $request) {
        Order::create([
            'orderNumber' => $request->input('orderNumber'),
            'deliveryDate' => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id' => $request->input('vendor_id'),
            'type' => $request->input('type'),
            'remarks' => $request->input('remarks'),
        ]);
        return redirect()->route( 'order.index');
    }

    public function getEdit($id = null) {
        if ($id == null) {
            return redirect()->route('order.index');
        }

        $order = Order::find($id);
        return view('admin.order.edit')
            ->with('order', $order);
    }

    public function putUpdate(OrderRequest $request, $id = null) {
        if ($id == null) {
            return redirect()->route('order.index');
        }

        Order::find($id)->update([
            'orderNumber' => $request->input('orderNumber'),
            'deliveryDate' => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id' => $request->input('vendor_id'),
            'type' => $request->input('type'),
            'remarks' => $request->input('remarks'),
        ]);
        return redirect()->route('order.index');
    }

    public function postDelete($id) {
        if ($id == null) {
            return redirect()->route('order.index');
        }

        Order::destroy($id);
        return;
    }
}
