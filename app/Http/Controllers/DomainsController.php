<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateDomainRequest;
use Auth;
use Session;
use Flash;
use App\Domains;

class DomainsController extends Controller
{
    public  function index(){
        $domains= Domains::latest()->get();
        return view('domains.index')->with('domains',$domains);
    }

    public function show($id){
        $domains = Domains::findOrFail($id);
        return view('domains.show')->with('domains', $domains);

    }

    public function edit($id){
        $domains= Domains::findOrFail($id);
        return view('domains.edit',compact('domains'));
    }

    public function create(){
        return view('domains.create');
    }

    public function store(){
        $input = Request::all();
        Domains::create($input);
        Session::flash('flash_message','Domena została dodana');
        return redirect('domains');
    }

    public function destroy($id){
        try {
            $domains= Domains::findOrFail($id);
            Domains::destroy($domains->id);
            Session::flash('flash_message','Domena została usunięta');
        } catch (\Exception $e) {
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('DomainsController@index'));
    }

    public function update($id, CreateDomainRequest $request){
        $domain = Domains::findOrFail($id);
        $domain->update($request->all());
        return redirect('domains');
    }
}
