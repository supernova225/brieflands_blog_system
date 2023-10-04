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

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
