<?php

require '../../../../config/config.php';
use Repositories\ParceirosRepository;

// pegando dados do do form
$nome = $_POST['nome'];
$logo = '';


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/parceiros/";

if (isset($_FILES['logo']) && $_FILES['logo']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['logo']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['logo']['tmp_name'], $caminhoDestino);

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

        $logo = 'upload-' . $hash . ".webp";
        $caminhoWebP = $pastaDestino . $logo;

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino);
    }
}


// salvar
$res = ParceirosRepository::create([
    'nome' => $nome,
    'logo' => $logo
]);

if($res) {
    header('Location: ../../../../parceiros.php?create=true');
} else {
    header('Location: ../../../../parceiros.php?error=true');
}
