<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =['titre','description','niveau','start_date','end_date'];
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
