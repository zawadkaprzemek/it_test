<?php

namespace App\Http\Controllers;

use App\Domains;
use Illuminate\Http\Request;

use App\Http\Requests;

class DomainsController extends Controller
{
    public  function index(){
        $domains= Domains::latest()->get();
        return view('domains.index')->with('domains',$domains);
    }

    public function edit($id){
        $domains= Domains::findOrFail($id);
        /**$categories = Category::lists('name','id');
        return view('videos.edit', compact('video','categories'));*/
    }
}
