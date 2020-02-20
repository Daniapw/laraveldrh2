<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'country', 'sex', 'date_of_birth', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Funcion para obtener reviews escritas por un usuario
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(){
        return $this->hasMany('App\Review');
    }

    /**
     * Funcion para obtener libros favoritos de los usuarios
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books(){
        //Puesto que los campos id siguen la convencion 'campo_id' no hay que especificar los nombres
        return $this->belongsToMany(Book::class, 'users_favorites');
    }
}
