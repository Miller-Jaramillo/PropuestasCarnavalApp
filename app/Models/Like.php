<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'propuesta_id'];

    public function propuesta()
    {
        return $this->belongsTo(Propuesta::class);
    }
}
