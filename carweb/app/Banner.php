<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $fillable = [
        'name', 'imgurl', 'notes', 'is_show'
    ];
}
