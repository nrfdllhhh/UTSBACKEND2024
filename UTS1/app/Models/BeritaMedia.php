<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaMedia extends Model
{
    protected $table = 'berita_media';
    protected $fillable = ['id', 'title','author', 'description', 'content', 'url', 'url_img', 'published_at', 'category',];
}
