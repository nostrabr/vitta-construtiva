<?php
namespace Repositories;

use Models\Engenheiros;

class EngenheirosRepository {
    // pegando engenheiros
    public static function getAll() {
        return Engenheiros::all();
    }

    // criando engenheiro
    public static function create($data) {
        $res = Engenheiros::create($data);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // deletando engenheiro
    public static function delete($id) {
        $res = Engenheiros::where('id', $id)->delete();

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando nome do engenheiro
    public static function updateNome($nome, $id) {
        $res = Engenheiros::where('id', $id)->update(['nome' => $nome]);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando cargo do engenheiro
    public static function updateCargo($cargo, $id) {
        $res = Engenheiros::where('id', $id)->update(['cargo' => $cargo]);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando foto do engenheiro
    public static function updateFoto($foto, $id) {
        $res = Engenheiros::where('id', $id)->update(['foto' => $foto]);

        if($res){
            return true;
        } else {
            return false;
        }
    }
    
}