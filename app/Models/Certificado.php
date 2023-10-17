<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
          'download',
          'delivery',
          'order_num',
          'cliente_order',
          'fig_num',
          'description',
          'quantidade',
          'lote',
          'num_cliente',
          'data',
    ];

   
}
