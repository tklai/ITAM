<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Vendor;
use App\Http\Requests\OrderRequest;

class OrderController extends Controller
{
    public function getList() {
        return Order::with('vendor')->get();
    }

    public function getAdd() {
        $vendors = Vendor::all();
        return view('admin.order.add')
            ->with('vendors', $vendors);
    }

    public function postAdd(OrderRequest $request) {
        Order::create([
            'orderNumber'        => $request->input('orderNumber'),
            'deliveryDate'       => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id'          => $request->input('vendor_id'),
            'type'               => $request->input('type'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route( 'order.index');
    }

    public function getEdit($id = null) {
        $this->checkNull($id, 'order');
        $order   = Order::find($id);
        $vendors = Vendor::all();
        return view('admin.order.edit')
            ->with('order', $order)
            ->with('vendors', $vendors);
    }

    public function putUpdate(OrderRequest $request, $id = null) {
        $this->checkNull($id, 'order');
        Order::find($id)->update([
            'orderNumber'        => $request->input('orderNumber'),
            'deliveryDate'       => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id'          => $request->input('vendor_id'),
            'type'               => $request->input('type'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route('order.index');
    }

    public function postDelete($id = null) {
        $this->checkNull($id, 'order');
        Order::destroy($id);
        return;
    }
}
