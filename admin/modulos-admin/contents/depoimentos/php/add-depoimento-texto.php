<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do form
$depoimento_nome = $_POST['nome'];
$depoimento_empresa = $_POST['empresa'] ?? null;
$depoimento_texto = $_POST['depoimento'];
$depoimento_thumb = null;

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/depoimentos/";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $depoimento_thumbOriginal = $dataHora . basename($_FILES['foto']['name']);
    $caminhoDestino = $pastaDestino . $depoimento_thumbOriginal;

    // Faz o upload da imagem original
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino);

    // Verifica a extensão da imagem
    $extensao = strtolower(pathinfo($caminhoDestino, PATHINFO_EXTENSION));

    // Converte para WebP se a imagem for PNG ou JPEG
    if ($extensao == 'png' || $extensao == 'jpg' || $extensao == 'jpeg') {
        // Carrega a imagem original
        if ($extensao == 'png') {
            $img = imagecreatefrompng($caminhoDestino);
        } elseif ($extensao == 'jpeg' || $extensao == 'jpg') {
            $img = imagecreatefromjpeg($caminhoDestino);
        }

        // Define o caminho para a imagem WebP
        $depoimento_thumb = $dataHora . ".webp";  // Nome sem a extensão original
        $caminhoWebP = $pastaDestino . $depoimento_thumb;

        // Converte e salva a imagem em WebP
        imagewebp($img, $caminhoWebP, 80); // O valor 80 define a qualidade da imagem

        // Libera a memória
        imagedestroy($img);

        // Remove a imagem original
        unlink($caminhoDestino);
    }
}

// salvar
$res = DepoimentosRepository::create([
    'video' => null,
    'nome' => $depoimento_nome,
    'empresa' => $depoimento_empresa,
    'texto' => $depoimento_texto,
    'foto' => $depoimento_thumb,
    'tipo' => 'texto'
]);

if ($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
