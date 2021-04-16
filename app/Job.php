<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable =['titre','description','salaire','end_date'];

    public function user(){
        return $this->belongsToMany(User::class);
    }
    
}

