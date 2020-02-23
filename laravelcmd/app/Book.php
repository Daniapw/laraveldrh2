<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'author', 'cover_img_file', 'genre_id', 'publication_date', 'synopsis', 'expanded_info'
    ];

    /**
     * Funcion para obtener reviews asociadas con un libro
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    /**
     * Funcion para obtener genero del libro
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    /**
     * Funcion para obtener usuarios que tienen el libro marcado como favorito
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class, 'users_favorites');
    }
}
