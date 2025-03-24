<?php
namespace Repositories;

use Models\Equipe;

class EquipeRepository {
    // pegando equipe
    public static function getAll() {
        return Equipe::all();
    }


    // criando equipe
    public static function create($data) {
        $res = Equipe::create($data);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // deletando equipe
    public static function delete($id) {
        $res = Equipe::where('id', $id)->delete();

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando nome do memnro
    public static function updateNome($nome, $id) {
        $res = Equipe::where('id', $id)->update(['nome' => $nome]);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando cargo
    public static function updateCargo($cargo, $id) {
        $res = Equipe::where('id', $id)->update(['cargo' => $cargo]);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando texto
    public static function updateTexto($texto, $id) {
        $res = Equipe::where('id', $id)->update(['texto' => $texto]);

        if($res){
            return true;
        } else {
            return false;
        }
    }

    // atualizando foto do membro
    public static function updateFoto($foto, $id) {
        $res = Equipe::where('id', $id)->update(['foto' => $foto]);

        if($res){
            return true;
        } else {
            return false;
        }
    }
}