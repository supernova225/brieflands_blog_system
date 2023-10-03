<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostLog extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post_logs';

    protected $fillable = [
        'modifier_id',
        'modifier_first_name',
        'modifier_last_name',
        'post_id',
        'author_id',
        'author_first_name',
        'author_last_name'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function modifier()
    {
        return $this->belongsTo(User::class, 'modifier_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
