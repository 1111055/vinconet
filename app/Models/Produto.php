<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
          'cod_art',
          'cod_catalog',
          'des_art',
          'exist_actual',
    ];

}
