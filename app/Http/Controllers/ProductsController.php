<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use Auth;
use Session;
use Flash;
use App\Product;

class ProductsController extends Controller
{
    public  function index(){
        $products= Product::latest()->get();
        return view('products.index')->with('products',$products);
    }

    public function show($id){
        $products = Product::findOrFail($id);
        return view('products.show')->with('products', $products);

    }

    public function edit($id){
        $products= Product::findOrFail($id);
        return view('products.edit',compact('products'));
    }

    public function store(CreateProductRequest $request){
        Product::create($request->all());
        Session::flash('flash_message','Produkt został dodany');
        return redirect('products');
    }

    public function create(){
        return view('products.create');
    }

    public function destroy($id){
        try {
            $products= Product::findOrFail($id);
            Product::destroy($products->id);
            Session::flash('flash_message','Produkt został usunięty');
        } catch (\Exception $e) {
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('ProductsController@index'));
    }

    public function update($id, CreateProductRequest $request){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('products');
    }
}
