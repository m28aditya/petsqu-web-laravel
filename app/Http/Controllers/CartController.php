<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    public function index(){
        $order = Transaction::where('user_id',Auth::user()->id)->where('status','IN_CART')->first();
        if(!empty($order)){
            $orderDetail = TransactionDetail::where('transaction_id',$order->id)->get();
            if(!empty($orderDetail)){
                $orderDetail = TransactionDetail::where('transaction_id',$order->id)->get();
                $code = random_int(1,999);
                $ongkir = (($order->total_weight/1000)*5000)+5000;
                $totalHarga = $order->total_price+$ongkir+$code;
                return view('pages.cart.index',[
                    'totalHarga' => $totalHarga,
                    'order' => $order,
                    'ongkir' => $ongkir,
                    'orderList' => $orderDetail
                ]);
            }
            $order->destroy();
        }
        return redirect('/product');
    }

    public function destroy($id){
        $pesanan_detail = TransactionDetail::where('id',$id)->first();
        $product = Product::where('id',$pesanan_detail->product_id)->first();
        $pesanan = Transaction::where('id',$pesanan_detail->transaction_id)->first();

        $product->stock += $pesanan_detail->sum_product;
        $pesanan->total_price -= $pesanan_detail->sum_price;
        $pesanan->total_weight -= $pesanan_detail->sum_weight;
        $product->update();
        $pesanan_detail->delete();

        if($pesanan->total_price === 0){
            $pesanan->delete();
        } else {
            $pesanan->update();
        }
        
        $order = Transaction::where('user_id',Auth::user()->id)->where('status','IN_CART')->first();
        if (empty($order)){
            return redirect('/product/');
        } else {
            $orderDetail = TransactionDetail::where('transaction_id',$order->id)->get();
            $ongkir = (($order->total_weight/1000)*5000)+5000;
            $code = random_int(1,999);
            $totalHarga = $order->total_price+$ongkir+$code;
            return view('pages.cart.index',[
                'totalHarga' => $totalHarga,
                'ongkir' => $ongkir,
                'order' => $order,
                'orderList' => $orderDetail
                ]);
        }
        
    }
    public function confirmOrder(Request $request, $id){
        $order = Transaction::where('id',$id)->first();
        $order->total_price = $request->total_price;
        $order->address = $request->address;
        $order->status = 'PENDING';
        $order->update();
        return redirect('/product/');
    }
}