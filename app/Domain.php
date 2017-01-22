<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $fillable = [
        'name',
        'description',
        'robots',
        'status'
    ];

    //na jednej domenie znajduje się wiele stron
    public function pages(){
        return $this->hasMany('App\Page');
    }

    public function getDomainListAttribute(){
        return $this->domain->lists('id')->all();
    }
}
