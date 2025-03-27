<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$area_atuacao_titulo = $_POST['area-atuacao-titulo'];
$area_atuacao_descricao = $_POST['area-atuacao-descricao'];
$area_atuacao_projetos = $_POST['area-atuacao-titulo-projetos'];
$area_atuacao_thumb = '';
$area_atuacao_banner = '';
$area_atuacao_marca_dagua = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['area-atuacao-thumb']) && $_FILES['area-atuacao-thumb']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['area-atuacao-thumb']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['area-atuacao-thumb']['tmp_name'], $caminhoDestino);

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

        $area_atuacao_thumb = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $area_atuacao_thumb;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}

if (isset($_FILES['area-atuacao-banner']) && $_FILES['area-atuacao-banner']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['area-atuacao-banner']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['area-atuacao-banner']['tmp_name'], $caminhoDestino);

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

        $area_atuacao_banner = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $area_atuacao_banner;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}

if (isset($_FILES['area-atuacao-marca-dagua']) && $_FILES['area-atuacao-marca-dagua']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['area-atuacao-marca-dagua']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['area-atuacao-marca-dagua']['tmp_name'], $caminhoDestino);

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

        $area_atuacao_marca_dagua = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $area_atuacao_marca_dagua;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}


// salvar
$res = AreaAtuacaoRepository::create([
    'titulo' => $area_atuacao_titulo,
    'descricao' => $area_atuacao_descricao,
    'titulo_projetos' => $area_atuacao_projetos,
    'capa' => $area_atuacao_thumb,
    'banner' => $area_atuacao_banner,
    'marca_dagua' => $area_atuacao_marca_dagua,
]);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
