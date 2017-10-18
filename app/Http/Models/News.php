<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    public function author_info()
    {
        return $this->belongsTo('App\Http\Models\Users', 'author', 'id');
    }
}
