<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function commentaires(){
        return $this->hasMany(Commentaire::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}

