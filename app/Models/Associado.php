<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Lumen\Auth\Authorizable;


class Associado extends Model
{

    protected $table = 'hy_associado';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'token',
        'email',
        'senha',
        'telefone',
        'telefone_2',
        'profissao' ,
        'cpf',
        'rg' ,
        'data_nascimento',
        'sexo',
        'nome_do_pai',
        'nome_da_mae',
        'naturalidade',
        'cep',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'indicador',
        'cnpj',
        'razao_social',
        'nome_fantasia',
        'email_comercial',
        'telefone_empresarial',
        'endereco_comercial',
        'inscricao_estadual',
        'inscricao_municipal',
        'cadastro_por',
        'representado_por',
        'empresa_id',
        'fluxo',
        'obs',
        'origem_do_lead'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'horaCadastro',
        'dataCadastro',
        'status'
    ];
}
