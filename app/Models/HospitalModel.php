<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalModel extends Model
{
    use HasFactory;
    protected $table = 'hospitales';
    protected $primarykey = 'idHospital';

    protected $fillable = [
        'nombre', 'direccion', 'fkIdPais'
    ];
}
