<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeImg = $_POST['nome-img'];
$imagem = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";


if (isset($_FILES['att-imagem_info_projeto']) && $_FILES['att-imagem_info_projeto']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['att-imagem_info_projeto']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['att-imagem_info_projeto']['tmp_name'], $caminhoDestino);

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
    }
}


$filePathDesk = $pastaDestino . $nomeImg;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = AreaAtuacaoRepository::updateImagemProjeto($imagem, $id, 'imagem');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
