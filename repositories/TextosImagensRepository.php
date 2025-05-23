<?php
namespace Repositories;

use Models\TextosImagens;

class TextosImagensRepository {
    // pegando textos e imagens
    public static function getAll() {
        return TextosImagens::where('id', 1)->first();
    }

    // atualizando gif
    public static function updateGif($data) {
        return TextosImagens::where('id', 1)->update($data);
    }

    // atualizando texto home
    public static function updateTextoHome($data) {
        return TextosImagens::where('id', 1)->update($data);
    }

    // atualizando texto quem somos
    public static function updateTextoQuemSomos($data) {
        return TextosImagens::where('id', 1)->update($data);
    }

    // atualizando texto colaboradores
    public static function updateTextoColaboradores($data) {
        return TextosImagens::where('id', 1)->update($data);
    }

    // atualizando titulo texto home
    public static function updateTituloTextoHome($data) {
        return TextosImagens::where('id', 1)->update($data);
    }
}