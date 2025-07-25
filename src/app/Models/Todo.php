<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // category_idとcontentを操作可能にする
    protected $fillable = [
        'category_id',
        'content'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
