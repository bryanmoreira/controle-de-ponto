<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cpf',
        'user_name',
        'data',
        'inicio_expediente',
        'inicio_almoco',
        'final_almoco',
        'final_expediente',
    ];
}
