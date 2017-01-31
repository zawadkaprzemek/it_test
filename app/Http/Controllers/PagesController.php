<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreatePageRequest;
use Auth;
use Session;
use Flash;
use App\Page;
use App\Domain;
use App\Product;

class PagesController extends Controller
{
    public  function index(){
        $domains=Domain::lists('name','id');
        $products=Product::lists('name','id');
        $pages= Page::latest()->get();
        return view('pages.index',compact('pages','domains','products'));
    }

    public function show($id){
        try {
            $pages = Page::findOrFail($id);
            return view('pages.show')->with('pages', $pages);
        }catch (\Exception $e) {
            return("error: page id:".$id." not exists");
        }
    }

    public function create(){
        $domains=Domain::lists('name','id');
        $products=Product::lists('name','id');
        return view('pages.create',compact('domains','products'));
    }

    public function edit($id){
        $domains=Domain::lists('name','id');
        $products=Product::lists('name','id');
        $pages= Page::findOrFail($id);
        return view('pages.edit',compact('pages','domains','products'));
    }

    public function store(CreatePageRequest $request){
        try {
            $page = Page::create($request->all());
            $productsIds = $request->input('ProductList');
            $variants = $request->input('VariantList');
            for ($a = 0; $a < count($productsIds); $a++) {
                $page->products()->attach($productsIds[$a], ['variant' => $variants[$a]]);
            }
            Session::flash('flash_message', 'Strona dodana');
        }catch (\Exception $e){
            Session::flash('flash_message', 'Nie udało się dodać strony');
        }
        return redirect('pages');
    }

    public function update($id, CreatePageRequest $request){
        try{
        $page = Page::findOrFail($id);
        $page->update($request->all());
        $productsIds = $request->input('ProductList');
        $variants = $request->input('VariantList');
        $pivotData=[];
        for($a=0;$a < count($productsIds); $a++){
            array_push($pivotData,['variant'=>$variants[$a]]);
        }
        $syncData  = array_combine($productsIds, $pivotData);
        $page->products()->sync($syncData);
        Session::flash('flash_message', 'Edycja zakończona sukcesem');
        }catch (\Exception $e) {
            Session::flash('flash_message', 'Edycja zakończona porażką');
        }
        return redirect('pages');
    }


    public function destroy($id){
        try {
            $pages= Page::findOrFail($id);
            Page::destroy($pages->id);
            Session::flash('flash_message','Strona została usunięta');
        } catch (\Exception $e) {
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('PagesController@index'));
    }


}
