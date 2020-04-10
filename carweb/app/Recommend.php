<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    //
    protected $fillable = [
        'title', 'imgurl', 'detail','gift_title','is_hot','is_show','is_delete'
    ];
}
