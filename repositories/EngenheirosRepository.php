<?php
namespace Repositories;

use Models\Engenheiros;

class EngenheirosRepository {
    // pegando engenheiros
    public static function getAll() {
        return Engenheiros::all();
    }
}