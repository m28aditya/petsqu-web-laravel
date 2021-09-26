<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function order($slug)
    {
        $data = Product::where('slug',$slug)->first();
        return view('pages.product_detail',[
            'data' => $data
        ]);
    }
    public function addToCart(Request $request, $slug)
    {    

        $product = Product::where('slug', $slug)->first();
        $pesanan = Transaction::where('user_id', Auth::user()->id)->where('status','IN_CART')->first();

        if($request->sum_product > $product->stock){
            return redirect ('product/'.$product->slug.'/detail')->with('failed','Stock tidak cukup');
        }

        if (empty($pesanan)){
            // Simpan ke Pesanan
            $pesanan = new Transaction;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->status = 'IN_CART';
            $pesanan->total_price = 0;
            $pesanan->total_weight = 0;
            $pesanan->save();
        }

        $pesanan_detail = TransactionDetail::where('product_id',$product->id)->where('transaction_id',$pesanan->id)->first();

        if(empty($pesanan_detail)){
            $pesanan_detail = new TransactionDetail;
            $pesanan_detail->product_id = $product->id;
            $pesanan_detail->transaction_id = $pesanan->id;
            $pesanan_detail->sum_product = $request->sum_product;
            $product->stock = $product->stock - $request->sum_product;
            $pesanan_detail->sum_price = $product->price * $request->sum_product;
            $pesanan_detail->sum_weight = $product->weight * $request->sum_product;
            
            // Harga total
            $pesanan->total_price += $pesanan_detail->sum_price;
            $pesanan->total_weight += $pesanan_detail->sum_weight;

            $pesanan->update();
            $product->update();
            $pesanan_detail->save();    
        } else {
            
            if($request->sum_product > $product->stock){
                return redirect ('product/'.$product->slug);
            }
            $pesanan_detail->sum_product = $pesanan_detail->sum_product + $request->sum_product;
            $product->stock = $product->stock - $request->sum_product;
            
            $harga_pesanan_detail_baru = $product->price * $request->sum_product;
            
            $pesanan_detail->sum_price = $pesanan_detail->sum_price + $harga_pesanan_detail_baru;
            $pesanan_detail->sum_weight +=  $request->sum_weight;
            
            // total harga baru
            $total_harga_baru = $request->sum_product * $product->price;
            
            $pesanan->total_price = $pesanan->total_price + $total_harga_baru;
            $pesanan->total_weight = $pesanan->total_weight + $pesanan_detail->sum_weight;
            
            $pesanan->update();
            $product->update();
            $pesanan_detail->update();   
        }
        return redirect()->back();        
    }
    public function orderHistory()
    {
        $orderList = Transaction::where('user_id',Auth::user()->id)->where('status','!=','IN_CART')->get();
        return view('pages.cart.history',[
            'orderList' => $orderList
        ]);
    }
    public function orderHistoryDetail($id)
    {
        $order = Transaction::where('id',$id)->first();
        $orderList = TransactionDetail::with(['product'])->where('transaction_id',$id)->get();
        $ongkir = ($order->total_weight/1000)*5000;
        return view('pages.cart.historyDetail',[
            'order' => $order,
            'orderList' => $orderList,
            'ongkir' => $ongkir
        ]);
    }
}