<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_venda';
    protected $casts = [
        'produtos' => 'json',
    ];
    
    protected $fillable = ['forma_pagamento', 'valor_total', 'produtos'];

}
