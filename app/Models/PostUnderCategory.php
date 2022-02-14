<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostUnderCategory extends Pivot
{
    use HasFactory;

    protected $fillable = ['post_id', 'under_category_id'];

    public function post(){
        $this->belongsTo(Post::class);
    }
    public function underCategory(){
        $this->belongsTo(UnderCategory::class);
    }
}
