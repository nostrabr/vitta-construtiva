<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model {
    protected $table = 'contatos';
    protected $fillable = [
        'instagram',
        '_instagram',
        'facebook',
        '_facebook',
        'linkedin',
        '_linkedin',
        'email_clientes',
        'email_fornecedor',
        'telefone_clientes',
        'telefone_fornecedor'
    ];
    public $timestamps = false;
}