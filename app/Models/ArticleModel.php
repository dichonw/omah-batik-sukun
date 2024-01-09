<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;
    protected $table = 'tb_article';
    protected $fillable = ['article_title', 'image', 'description', 'optional_link'];
}
