<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['user_id', 'book_id', 'content'];

    /**
     * Funcion para obtener usuario al que pertenece la review
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Funcion para obtener libro al que pertenece la review
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
