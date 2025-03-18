<?php
namespace Repositories;

use Models\Depoimentos;

class DepoimentosRepository {
    // pegando depoimentos
    public static function getAll() {
        return Depoimentos::all();
    }
}