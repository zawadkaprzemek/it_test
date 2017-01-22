<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateDomainRequest;
use Auth;
use Session;
use Flash;
use App\Domain;

class DomainsController extends Controller
{
    public  function index(){
        $domains= Domain::latest()->get();
        return view('domains.index')->with('domains',$domains);
    }

    public function show($id){
        $domains = Domain::findOrFail($id);
        return view('domains.show')->with('domains', $domains);

    }

    public function edit($id){
        $domains= Domain::findOrFail($id);
        return view('domains.edit',compact('domains'));
    }

    public function create(){
        return view('domains.create');
    }

    public function store(CreateDomainRequest $request){
        Domain::create($request->all());
        Session::flash('flash_message','Domena została dodana');
        return redirect('domains');
    }

    public function destroy($id){
        try {
            $domains= Domain::findOrFail($id);
            Domain::destroy($domains->id);
            Session::flash('flash_message','Domena została usunięta');
        } catch (\Exception $e) {
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('DomainsController@index'));
    }

    public function update($id, CreateDomainRequest $request){
        $domain = Domain::findOrFail($id);
        $domain->update($request->all());
        return redirect('domains');
    }
}
