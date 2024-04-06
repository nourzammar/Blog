<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class article extends Model
{
    public function keywords()
    {
        return $this->belongsToMany(keyword::class , 'article_keywords','article_id','keyword_id');
    }
    public function writers()
    {
        return $this->belongsToMany(writer::class , 'article_writers' ,'article_id' , 'writer_id' );
    }

    public function types()
    {
        return $this->belongsTo(type::class , 'type_id');
    }
}
