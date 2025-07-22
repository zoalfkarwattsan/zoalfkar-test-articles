<?php

namespace App\Modules\Article\Models;

use App\Modules\Comment\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        "title",
        "content",

    ];

    protected $with = [
        'comments'
    ];

    public function comments() {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
