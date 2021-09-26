<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        return view ('pages.landing');
    }
    public function product(){
        $dataDog = Product::where('categories','dog')->orderBy('created_at','desc')->paginate(4);
        $dataCat = Product::where('categories','cat')->orderBy('created_at','desc')->paginate(4);
        return view ('pages.product',[
            'dataDog' => $dataDog,
            'dataCat' => $dataCat
        ]);
    }
    public function Dogcategory(){
        $dataDog = Product::where('categories','dog')->orderBy('created_at','desc')->get();
        return view ('pages.category.dog',[
            'dataDog' => $dataDog
        ]);
    }
    public function Catcategory(){
        $dataCat = Product::where('categories','cat')->orderBy('created_at','desc')->get();
        return view ('pages.category.cat',[
            'dataCat' => $dataCat
        ]);
    }
    public function search(Request $request){
        $search = $request->search;
        $products = Product::where('nm_product','like','%'.$request->search.'%')->get();
        return view('pages.search',[
            'products' => $products,
            'search' => $search
        ]);
    }
}