<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = ['contenido', 'user_id', 'propuesta_id'];

    public function propuesta()
    {
        return $this->belongsTo(Propuesta::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function respuestas()
    {
        return $this->hasMany(RespuestaComentario::class);
    }
}
