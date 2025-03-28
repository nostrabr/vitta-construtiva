<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$foto = '';


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/engenheiros/";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['foto']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino);

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

// salvar
$res = EngenheirosRepository::create([
    'nome' => $nome,
    'cargo' => $cargo,
    'foto' => $foto
]);

if($res) {
    header('Location: ../../../../engenheiros.php?create=true');
} else {
    header('Location: ../../../../engenheiros.php?error=true');
}
