<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverynote extends Model
{
     use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
          'download',
          'date',
          'deliverynote',
          'num_cliente',
          'num_enc',
          'enc_cliente',
          'linha_guia',
          'cod_art',
          'des_art',
          'path',
          'quantidade',
          'fig_number',
          'lote'

    ];
}
