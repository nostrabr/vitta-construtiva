<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeFoto = $_POST['nome-foto'] ?? null;
$foto = null;

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/depoimentos/";

if (isset($_FILES['att-foto']) && $_FILES['att-foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['att-foto']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['att-foto']['tmp_name'], $caminhoDestino);

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

        $foto = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $foto;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}
// Remover foto antiga apenas se houver uma nova imagem
if ($foto && $nomeFoto) {
    $filePathDesk = $pastaDestino . $nomeFoto;
    if (file_exists($filePathDesk)) {
        unlink($filePathDesk);
    }
}

// Atualizar apenas se houver uma nova imagem
if ($foto !== null) {
    $res = DepoimentosRepository::updateFoto($foto, $id);
} else {
    $res = false;
}

if ($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
