<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyWord extends Model
{
    use HasFactory;
    protected $fillable = [
        'word',
    ];

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
