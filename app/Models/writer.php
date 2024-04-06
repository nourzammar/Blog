<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class writer extends Model
{
    public function articles()
    {
        return $this->belongsToMany(article::class, 'article_writers', 'article_id' , 'writer_id'); 
    }
}
