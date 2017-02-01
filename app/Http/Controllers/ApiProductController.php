<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Http\Controllers\Controller;

class ApiProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lists()     {
        return Product::latest()->get();
    }

    public function show($id)     {
        try{
            return Product::findOrFail($id);
        }catch (\Exception $e) {
           return("error: Produkt o id ".$id." nie istnieje");
        }

    }
}
