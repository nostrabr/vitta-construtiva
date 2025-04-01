<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$descricao = $_POST['descricao-projeto'];
$area_id = $_POST['area_id'];
$identificador = $_POST['identificador-projeto'];
$capa = '';
$imagem_sobre = '';
$imagens_projeto = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['capa-projeto']) && $_FILES['capa-projeto']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['capa-projeto']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['capa-projeto']['tmp_name'], $caminhoDestino);

    $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));

    if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
        if ($extensao == 'png') {
            $img = imagecreatefrompng($caminhoDestino);
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
        } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
            $img = imagecreatefromjpeg($caminhoDestino);
        }

        $capa = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $capa;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}

if (isset($_FILES['imagem-info']) && $_FILES['imagem-info']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['imagem-info']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['imagem-info']['tmp_name'], $caminhoDestino);

    $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));

    if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
        if ($extensao == 'png') {
            $img = imagecreatefrompng($caminhoDestino);
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
        } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
            $img = imagecreatefromjpeg($caminhoDestino);
        }

        $imagem_sobre = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $imagem_sobre;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}


if (isset($_FILES['imagens-projeto']) && $_FILES['imagens-projeto']['error'][0] != UPLOAD_ERR_NO_FILE) {
    foreach ($_FILES['imagens-projeto']['tmp_name'] as $key => $tmp_name) {
        $hash = bin2hex(random_bytes(3));
        $original_img = $hash . basename($_FILES['imagens-projeto']['name'][$key]);
        $caminhoDestino = $pastaDestino . $original_img;

        move_uploaded_file($tmp_name, $caminhoDestino);

        $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));

        if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
            if ($extensao == 'png') {
                $img = imagecreatefrompng($caminhoDestino);
                imagepalettetotruecolor($img);
                imagealphablending($img, true);
                imagesavealpha($img, true);
            } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
                $img = imagecreatefromjpeg($caminhoDestino);
            }

            $imagem = 'upload-' . $hash . ".webp";
            $caminhoWebP = $pastaDestino . $imagem;

            imagewebp($img, $caminhoWebP, 80);
            imagedestroy($img);
            unlink($caminhoDestino);
        } else {
            $imagem = $original_img; // Se não for uma imagem convertível, apenas mantém o arquivo original
        }

        $imagens_projeto[] = $imagem;
    }
}


$dados = [
    'descricao' => $descricao,
    'capa_projeto' => $capa,
    'imagem_info_projeto' => $imagem_sobre,
    'identificador' => $identificador,
    'area_atuacao_id' => $area_id
];

// salvar
$res = AreaAtuacaoRepository::createProjeto($dados, $imagens_projeto);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
