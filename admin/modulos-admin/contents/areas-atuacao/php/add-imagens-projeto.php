<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$imagens_projeto = '';



$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['add-imagens-projeto']) && $_FILES['add-imagens-projeto']['error'][0] != UPLOAD_ERR_NO_FILE) {
    $imagens_projeto = [];
    foreach ($_FILES['add-imagens-projeto']['tmp_name'] as $key => $tmp_name) {
        $hash = bin2hex(random_bytes(3));
        $original_img = $hash . basename($_FILES['add-imagens-projeto']['name'][$key]);
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
            $imagem = $original_img; // Mantém a imagem original se não for conversível para WebP
        }

        $imagens_projeto[] = $imagem;
    }
}


// salvar
$res = AreaAtuacaoRepository::createImagensProjeto($imagens_projeto, $id);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
