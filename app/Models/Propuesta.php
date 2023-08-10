<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{


    protected $fillable = [
        'nombre_propuesta',
        'nombre',
        'apellido',
        'identificacion',
        'nombre_agrupacion',
        'descripcion',
        'foto_o_video',
        'observaciones',
        'likes',
        'comments',
        'estado',
        'categoria_id',
        'subcategoria_id',
        'user_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function getEstadoAttribute($value)
    {
        return ucfirst($value); // Convertir el estado a mayúscula en la primera letra
    }

    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = strtolower($value); // Convertir el estado a minúscula antes de guardarlo
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
