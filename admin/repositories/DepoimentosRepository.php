<?php
namespace Repositories;

use Models\Depoimentos;

class DepoimentosRepository {
    // pegando depoimentos
    public static function getAll() {
        return Depoimentos::all();
    }

    // criando depoimento
    public static function create($data) {
        return Depoimentos::create($data);
    }

    // atualizando depoimento 
    public static function updateDepoimento($data, $id) {
        return Depoimentos::where('id', $id)->update(['texto' => $data]);
    }

    // atualizando empresa depoimento 
    public static function updateEmpresa($data, $id) {
        return Depoimentos::where('id', $id)->update(['empresa' => $data]);
    }

    // atualizando nome depoimento 
    public static function updateNome($data, $id) {
        return Depoimentos::where('id', $id)->update(['nome' => $data]);
    }

    // atualizando foto depoimento 
    public static function updateFoto($data, $id) {
        return Depoimentos::where('id', $id)->update(['foto' => $data]);
    }

    // deletando depoimento
    public static function delete($id) {
        return Depoimentos::where('id', $id)->delete();
    }

    // atualizando video depoimento 
    public static function updateVideo($data, $id) {
        return Depoimentos::where('id', $id)->update(['video' => $data]);
    }
}