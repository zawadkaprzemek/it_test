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

class PagesController extends Controller
{
    public  function index(){
        $domains=Domain::lists('name','id');
        $pages= Page::latest()->get();
        return view('pages.index',compact('pages','domains'));
    }

    public function show($id){
        try {
            $pages = Page::findOrFail($id);
            return view('pages.show')->with('pages', $pages);
        }catch (\Exception $e) {
            return "Nie znaleziono obiektu";
        }
    }

    public function edit($id){
        $domains=Domain::lists('name','id');
        $pages= Page::findOrFail($id);
        return view('pages.edit',compact('pages','domains'));
    }

    public function store(CreatePageRequest $request){
        Page::create($request->all());
        Session::flash('flash_message','Strona dodana');
        return redirect('pages');
    }

    public function create(){
        $domains=Domain::lists('name','id');
        return view('pages.create')->with('domains',$domains);
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

    public function update($id, CreatePageRequest $request){
        $page = Page::findOrFail($id);
        $page->update($request->all());
        return redirect('pages');
    }
}
