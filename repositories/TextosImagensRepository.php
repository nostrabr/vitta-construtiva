<?php
namespace Repositories;

use Models\TextosImagens;

class TextosImagensRepository {
    // pegando textos e imagens
    public static function getAll() {
        return TextosImagens::where('id', 1)->first();
    }
}