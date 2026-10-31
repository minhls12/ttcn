<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // user_id KHÔNG nằm trong fillable để người dùng không thể giả mạo chủ bài viết
    protected $fillable = ['title', 'content', 'image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
