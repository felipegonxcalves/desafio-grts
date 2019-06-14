<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = ['nome', 'email', 'telefone', 'sexo', 'nascimento'];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
