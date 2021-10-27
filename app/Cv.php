<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $fillable = ['nom','prenom','date_b','email','phone','adresse','diplome','description','experience','desc','logo',];


    
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
