<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = ['message','post_id'];
    
    use HasFactory;

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
