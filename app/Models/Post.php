<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Post extends Model
{
    use HasFactory, FilterQueryString;

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
