<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    /* Mutator de exemplo no campo email, sempre que usar o modelo e preencher algo no campo modelo
       É executado a funcao abaixo, poderiamos fazer uma regra de negocio, uma formatação de valor, atribuir em outra
       propriedade etc
       Mas deve-se seguir uma convensao no nome da funcao -> set.NomedoCampoInclusiveCaseSentitive.Attribute($value)
    public function setEmailAttribute($value) {
        $this->attributes['email'] = $value;
        $this->attributes['email2'] = $value;
    } */

    // Retornar relacionamento deste model, no caso aqui e relacionamento 1 para 1, mas o metodo suporta 1 para N no caso usar ->get ao invez de ->first
    public function Perfil() {
        return $this->hasOne(Profile::class, 'id', 'profile_id');
        // por semantica o caminho de volta ao inves de usar has One deve-se usar belongsTo, o funcionamento é o mesmo, mas é semantica de codigo
    }

    public function Posts() {
        return $this->hasMany(Post::class, 'user_id', 'id');
        // o inverso de hasMany é belongsToMany
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
