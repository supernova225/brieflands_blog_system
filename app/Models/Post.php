<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Post extends Model
{
    use HasFactory, FilterQueryString, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'author_id',
        'title',
        'main_content',
        'publication_date',
        'is_published',
    ];

    protected $filters = [
        'title',
        'publication_date',
        'is_published'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
