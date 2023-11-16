<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaisModel extends Model
{
    use HasFactory;

    protected $table = 'paises';
    protected $primarykey = 'idPais';

    protected $fillable = [
        'nombre'
    ];
}
