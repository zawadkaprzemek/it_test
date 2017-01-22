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

    public function domain(){
        return $this->belongsTo('App\Domain');
    }


}
