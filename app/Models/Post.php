<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'reading_time',
        'is_archived',
        'post_type_id',
    ];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }
}
