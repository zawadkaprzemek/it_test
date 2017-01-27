<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'domain_id',
        'type',
        'status',
        'note'
    ];
    //strona nalezy do domeny
    public function domain(){
        return $this->belongsTo('App\Domain');
    }
    //strona posiada produkty, jeden lub wiecej
    public function products(){
        return $this->belongsToMany('App\Product')
            ->withPivot('variant')
            ->withTimestamps();
    }

    //lista id produktów dla strony
    public function getProductListAttribute(){
        return $this->products->lists('id')->all();
    }


}
