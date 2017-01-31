<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests;
use App\Http\Requests\CreateDomainRequest;
use Auth;
use Session;
use Flash;
use App\Domain;
use Illuminate\Support\Facades\Log;

class DomainsController extends Controller
{
    public  function index(){
        $domains= Domain::latest()->get();
        return view('domains.index')->with('domains',$domains);
    }

    public function show($id){
        try {
            $domains = Domain::findOrFail($id);
            return view('domains.show')->with('domains', $domains);
        }catch (\Exception $e) {
            Log::error($e);
            return("error: domain id:".$id." not exists");
        }
    }

    public function create(){
        return view('domains.create');
    }

    public function store(CreateDomainRequest $request){
        Domain::create($request->all());
        Session::flash('flash_message','Domena została dodana');
        Log::info('Dodano domenę');
        return redirect('domains');
    }

    public function edit($id){
        $domains= Domain::findOrFail($id);
        return view('domains.edit',compact('domains'));
    }

    public function update($id, CreateDomainRequest $request){
        $domain = Domain::findOrFail($id);
        $domain->update($request->all());
        return redirect('domains');
    }

    public function destroy($id){
        try {
            $domains= Domain::findOrFail($id);
            Domain::destroy($domains->id);
            Session::flash('flash_message','Domena została usunięta');
            Log::info("Usunięto domenę");
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('flash_message','Nie udało się usunąć');
        }

        return redirect(action('DomainsController@index'));
    }

}
