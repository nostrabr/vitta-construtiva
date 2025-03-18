<?php
namespace Repositories;

use Models\Parceiros;

class ParceirosRepository {
    // pegando parceiros
    public static function getAll() {
        return Parceiros::all();
    }
}