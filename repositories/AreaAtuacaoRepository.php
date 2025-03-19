<?php
namespace Repositories;

use Models\AreaAtuacao;
use Models\Projeto;
use Models\ImagensProjeto;

class AreaAtuacaoRepository {
    // pegando todas as áreas de atuação
    public static function getAll() {
        return AreaAtuacao::with('projetos.imagensProjeto')->get();
    }

    //criando uma nova área de atuação
    public static function create($data) {
        $res = AreaAtuacao::create($data);

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // atualizando images
    public static function upodateImgAreaAtuacao($img, $id, $tipo){
        if($tipo == 'banner') {
            $res = AreaAtuacao::where('id', $id)->update(['banner'=> $img]);
        } else if($tipo == 'capa') {
            $res = AreaAtuacao::where('id', $id)->update(['capa' => $img]);
        }

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // atualizando textos
    public static function updateTexto($texto, $id, $tipo){
        if($tipo == 'titulo') {
            $res = AreaAtuacao::where('id', $id)->update(['titulo'=> $texto]);
        }else if($tipo == 'titulo-projetos') {
            $res = AreaAtuacao::where('id', $id)->update(['titulo_projetos' => $texto]);
        }else if($tipo == 'descricao') {
            $res = AreaAtuacao::where('id', $id)->update(['descricao' => $texto]);
        }

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // criando um novo projeto
    public static function createProjeto($data, $imagens_projeto) {
        $projeto = Projeto::create($data);

        if($projeto) {
            if($imagens_projeto) {
                foreach($imagens_projeto as $img) {
                    ImagensProjeto::create([
                        'projeto_id' => $projeto->id,
                        'imagem' => $img
                    ]);
                }
            }
            return true;
        } else {
            return false;
        }
    }


    // atualizando identificador do projeto
    public static function updateIdentificadorProjeto($identificador, $id) {
        $res = Projeto::where('id', $id)->update(['identificador' => $identificador]);

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // atualizando descrição do projeto
    public static function updateDescriProjeto($descri, $id) {
        $res = Projeto::where('id', $id)->update(['descricao' => $descri]);

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // atualizando imagens do projeto
    public static function updateImagemProjeto($img, $id, $tipo) {
        if($tipo == 'capa') {
            $res = Projeto::where('id', $id)->update(['capa_projeto' => $img]);
        } else if($tipo == 'imagem') {
            $res = Projeto::where('id', $id)->update(['imagem_info_projeto' => $img]);
        }

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // criando imagens do projeto
    public static function createImagensProjeto($imagens_projeto, $id) {
        if($imagens_projeto) {
            foreach($imagens_projeto as $img) {
                ImagensProjeto::create([
                    'imagem' => $img,
                    'projeto_id' => $id
                ]);
            }
            return true;
        } else {
            return false;
        }
    }

    // deletando imagens do projeto
    public static function deleteImgProjeto($id) {
        $res = ImagensProjeto::where('id', $id)->delete();

        if($res) {
            return true;
        } else {
            return false;
        }
    }

    // deletando projeto
    public static function deleteProjeto($id) {
        $pastaDestino = __DIR__ . "/../admin/assets/imagens/arquivos/areas-atuacao/";

        $projeto = Projeto::where('id', $id)->first();
        $imagens = ImagensProjeto::where('projeto_id', $id)->get();

        if($projeto) {
            if($imagens) {
                foreach($imagens as $img) {
                    $filePathDesk = $pastaDestino . $img['imagem'];
                    if (file_exists($filePathDesk)) {
                        unlink($filePathDesk);
                    }
                    $img->delete();
                }
            }
            $projeto->delete();
            return true;
        } else {
            return false;
        }
    }

    // deletando área de atuação e seus projetos e imagens de projetos relacionados
    public static function deleteArea($id) {
        $pastaDestino = __DIR__ . "/../admin/assets/imagens/arquivos/areas-atuacao/";

        $area = AreaAtuacao::where('id', $id)->first();
        $projetos = Projeto::where('area_atuacao_id', $id)->get();

        if($area) {
            if($projetos) {
                foreach($projetos as $projeto) {
                    $imagens = ImagensProjeto::where('projeto_id', $projeto->id)->get();
                    if($imagens) {
                        foreach($imagens as $img) {
                            $filePathDesk = $pastaDestino . $img['imagem'];
                            if (file_exists($filePathDesk)) {
                                unlink($filePathDesk);
                            }
                            $img->delete();
                        }
                    }
                    $projeto->delete();
                }
            }
            $area->delete();
            return true;
        } else {
            return false;
        }
    }
}