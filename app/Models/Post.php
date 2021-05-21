<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'post'    
    ];

    public function setTituloAttribute($value) {
        $this->attributes['titulo'] = $value;
        $this->attributes['slug'] = Str::slug($value);        
    }

    public function categories() {        
        return $this->belongsToMany(Categorie::class, 'posts_categories', 'post_id', 'categorie_id' );
    }
}
