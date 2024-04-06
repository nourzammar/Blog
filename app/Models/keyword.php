<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keyword extends Model
{
    protected $table = "keywords";
    public function articles()
    {
        return $this->belongsToMany(article::class,'article_keywords','keyword_id','article_id');
    }
}
