<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use Auth;
use Session;
use Flash;
use App\Products;

class ProductsController extends Controller
{
    public  function index(){
        $products= Products::latest()->get();
        return view('products.index')->with('products',$products);
    }

    public function show($id){
        $products = Products::findOrFail($id);
        return view('products.show')->with('products', $products);

    }

    public function edit($id){
        $products= Products::findOrFail($id);
        return view('products.edit',compact('products'));
    }

    public function store(CreateProductRequest $request){
        Products::create($request->all());
        Session::flash('flash_message','Produkt został dodany');
        return redirect('products');
    }

    public function create(){
        return view('products.create');
    }

    public function destroy($id){
        try {
            $products= Products::findOrFail($id);
            Products::destroy($products->id);
            Session::flash('flash_message','Produkt został usunięty');
        } catch (\Exception $e) {
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('ProductsController@index'));
    }

    public function update($id, CreateProductRequest $request){
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return redirect('products');
    }
}
