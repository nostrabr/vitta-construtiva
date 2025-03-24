<?php
namespace Repositories;

use Models\Parceiros;

class ParceirosRepository {
    // pegando parceiros
    public static function getAll() {
        return Parceiros::all();
    }

    // criando parceiro 
    public static function create($data) {
        return Parceiros::create($data);
    }

    // deletando parceiro
    public static function delete($id) {
        $res = Parceiros::where('id', $id)->delete();

        if($res) {
            return true;
        } else {
            return false;
        }
    }
}