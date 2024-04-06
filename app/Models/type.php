<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class type extends Model
{
    protected $fillable = ['name'];
    public function articles()
    {
        return $this->hasMany(article::class);
    }
}
