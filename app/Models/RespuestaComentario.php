<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaComentario extends Model
{
    use HasFactory;
    protected $fillable = ['contenido', 'user_id', 'comentario_id'];

    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }
}


