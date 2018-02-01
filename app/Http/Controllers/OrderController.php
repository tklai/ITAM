<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Order;
use App\Vendor;

class OrderController extends Controller
{
    /**
     * Display an index page of order management.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('orders.index');
    }

    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function list()
    {
        $orders = Order::with('vendor')->get();
        return $orders;
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function create()
    {
        $vendors = Vendor::all();
        return view('orders.create')
            ->with('vendors', $vendors);
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(OrderRequest $request)
    {
        Order::create([
            'orderNumber'        => $request->input('orderNumber'),
            'deliveryDate'       => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id'          => $request->input('vendor_id'),
            'type'               => $request->input('type'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route( 'orders.index');
    }

    /**
     * NOT IMPLEMENTED
     * Original:    Display the specified order.
     * Placeholder: Return to order management index page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param  int  $id
     * @return \Illuminate\View\View|\Illuminate\Database\Eloquent\Collection
     */
    public function edit($id)
    {
        $this->checkNull($id, 'orders');
        $order   = Order::findOrFail($id);
        $vendors = Vendor::all();
        return view('orders.edit')
            ->with('order', $order)
            ->with('vendors', $vendors);
    }

    /**
     * Update the specified order in storage.
     *
     * @param  \App\Http\Requests\OrderRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderRequest $request, $id)
    {
        $this->checkNull($id, 'orders');
        Order::findOrFail($id)->update([
            'orderNumber'        => $request->input('orderNumber'),
            'deliveryDate'       => $request->input('deliveryDate'),
            'warrantyExpiryDate' => $request->input('warrantyExpiryDate'),
            'vendor_id'          => $request->input('vendor_id'),
            'type'               => $request->input('type'),
            'remarks'            => $request->input('remarks'),
        ]);
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified order from storage.
     *
     * @param  int  $id
     * @return null
     */
    public function destroy($id)
    {
        $this->checkNull($id, 'orders');
        Order::destroy($id);
        return;
    }
}
