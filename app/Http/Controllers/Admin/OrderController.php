<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Transaction::with(['user'])->where('status','PENDING')->get();
        return view('pages.admin.order.index', [
            'order' => $order
        ]);
    }
    public function orderDetail($id)
    {
        $order = Transaction::with(['user'])->where('id',$id)->first();
        $orderList = TransactionDetail::with(['product'])->where('transaction_id',$id)->get();
        return view('pages.admin.order.detail',[
            'order' => $order,
            'orderList' => $orderList
        ]);
    }
    public function orderConfirm(Request $request, $id)
    {
        $order = Transaction::where('id',$id)->first();
        $order->status = $request->status;
        $order->update();
        return redirect('/admin/order/'.$order->id.'/detail')->with('success','Data berhasil diubah');
    }
}