<?php
namespace Repositories;

use Models\Equipe;

class EquipeRepository {
    // pegando equipe
    public static function getAll() {
        return Equipe::all();
    }
}