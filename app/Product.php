<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];

    //produkt znajduje się na stronie, jeden produkt na wielu stronach
    public function pages(){
        return $this->belongsToMany('App\Page')->withTimestamps();
    }
}
