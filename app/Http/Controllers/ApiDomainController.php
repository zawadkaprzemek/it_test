<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;
use App\Http\Requests;

class ApiDomainController extends Controller
{

    public function lists()     {
        return Domain::latest()->get();
    }

    public function show($id)     {
        try{
            return Domain::findOrFail($id);
        }catch (\Exception $e) {
            return("error: Domena o id ".$id." nie istnieje");
        }

    }
}
