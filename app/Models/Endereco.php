<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['logradouro', 'complemento', 'numero', 'bairro', 'cidade', 'estado', 'pais', 'cep'];
}
