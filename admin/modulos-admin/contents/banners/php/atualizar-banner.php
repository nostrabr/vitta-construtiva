<?php

require '../../../../config/config.php';
use Repositories\BannersRepository;

// pegando dados do do form
$refBannerDesktop = $_POST['refBannerDesktop']; //coluna do banco
$refBannerMobile = $_POST['refBannerMobile']; //coluna do banco
$nomeBannerDesktopDeletar = $_POST['nomeBannerDesktop']; // nome do arquivo para remover
$nomeBannerMobileDeletar = $_POST['nomeBannerMobile']; // nome do arquivo para remover
$nomeBannerDesktop = '';
$nomeBannerMobile = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/banners/";

if (isset($_FILES['desktop']) && $_FILES['desktop']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['desktop']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['desktop']['tmp_name'], $caminhoDestino);

    $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));
    $nomeBannerDesktop = 'upload-' . $hash . ".webp";
    $caminhoWebP = $pastaDestino . $nomeBannerDesktop;

    if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
        // Convertendo as imagens para WebP
        if ($extensao == 'png') {
            $img = imagecreatefrompng($caminhoDestino);
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
        } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
            $img = imagecreatefromjpeg($caminhoDestino);
        }

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino); // Remove o arquivo original
    } else {
        // Caso a imagem já seja WebP, renomeia o arquivo sem fazer conversão
        rename($caminhoDestino, $caminhoWebP);
    }
}



if (isset($_FILES['mobile']) && $_FILES['mobile']['error'] != UPLOAD_ERR_NO_FILE) {
    $hash = bin2hex(random_bytes(3));
    $original_img = $hash . basename($_FILES['mobile']['name']);
    $caminhoDestino = $pastaDestino . $original_img;

    move_uploaded_file($_FILES['mobile']['tmp_name'], $caminhoDestino);

    $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));
    $nomeBannerMobile = 'upload-' . $hash . ".webp";
    $caminhoWebP = $pastaDestino . $nomeBannerMobile;

    if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
        // Convertendo as imagens para WebP
        if ($extensao == 'png') {
            $img = imagecreatefrompng($caminhoDestino);
            imagepalettetotruecolor($img);
            imagealphablending($img, true);
            imagesavealpha($img, true);
        } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
            $img = imagecreatefromjpeg($caminhoDestino);
        }

        imagewebp($img, $caminhoWebP, 80);
        imagedestroy($img);
        unlink($caminhoDestino); 
    } else {
        // Caso a imagem já seja WebP, renomeia o arquivo sem fazer conversão
        rename($caminhoDestino, $caminhoWebP);
    }
}



// remover antigo banner desktop
$filePathDesk = $pastaDestino . $nomeBannerDesktopDeletar;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// remover antigo banner mobile
$filePathMob = $pastaDestino . $nomeBannerMobileDeletar;
if (file_exists($filePathMob)) {
    unlink($filePathMob);
}




// salvar banners no banco
$res = BannersRepository::update($refBannerDesktop, $refBannerMobile, $nomeBannerDesktop, $nomeBannerMobile);
if($res) {
    header('Location: ../../../../banners.php?success=true');
} else {
    header('Location: ../../../../banners.php?error=true');
}
