<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexDog()
    {
        $data = Product::where('categories', 'dog')->get();
        return view('pages.admin.product.dog', [
            'data' => $data
        ]);
    }
    
    public function indexCat()
    {
        $data = Product::where('categories', 'cat')->get();
        return view('pages.admin.product.cat', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'kd_product' => 'required|unique:products',
            'nm_product' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'info' => 'required',
            'image' => 'required|image|file|max:1024',
            'categories' => 'required'
        ]);
        
        $validatedData['image'] = $validatedData['image']->store('product_image');
        
        Product::create($validatedData);
        return redirect()->back()->with('success','Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $slug)
    {
        $data = Product::where('slug',$slug)->get();
        return view('pages.admin.product.detail',[
            'data' => $data[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $slug)
    {
        $data = Product::where('slug',$slug)->first();
        return view('pages.admin.product.edit',[
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $validatedData = $request->validate([
            'kd_product' => 'required',
            'nm_product' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'info' => 'required',
            'image' => 'image|file|max:1024',
            'categories' => 'required'
        ]);

        if($request->image){
            Storage::delete([$request->oldImage]);
            $validatedData['image'] = $validatedData['image']->store('product_image');   
        }

        Product::where('id',$id)->update($validatedData);

        if ($request->categories == 'dog'){
            return redirect('/admin/product/dog')->with('success','Data berhasil diubah');
        }else{
            return redirect('/admin/product/cat')->with('success','Data berhasil diubah');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $data = Product::where('id',$id)->first();
        if($data->image){
            Storage::delete([$data->image]);
        }
        $data->delete();

        if ($data->categories == 'dog'){
            return redirect('/admin/product/dog')->with('success','Data berhasil dihapus');
        }else{
            return redirect('/admin/product/cat')->with('success','Data berhasil dihapus');
        }
    }
}