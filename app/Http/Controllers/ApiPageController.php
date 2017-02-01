<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Product;
use App\Domain;
use App\Http\Requests;

class ApiPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function lists()     {
        return Page::latest()->get();
    }

    public function show($id)     {
        try{
            return Page::findOrFail($id);
        }catch (\Exception $e) {
            return("error: Strona o id ".$id." nie istnieje");
        }

    }
}
