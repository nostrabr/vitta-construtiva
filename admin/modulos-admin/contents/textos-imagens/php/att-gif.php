<?php

require '../../../../config/config.php';
use Repositories\TextosImagensRepository;

// pegando dados do do form
$gif = '';
$gifAtual = $_POST['gif-atual'];


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/textos-imagens/";

if (isset($_FILES['gif']) && $_FILES['gif']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $gif = $dataHora . basename($_FILES['gif']['name']);
    $caminhoDestino = $pastaDestino . $gif;

    move_uploaded_file($_FILES['gif']['tmp_name'], $caminhoDestino);
}

// removendo arquivo antigo
$filePathDesk = $pastaDestino . $gifAtual;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}



// salvar
$res = TextosImagensRepository::updateGif([
    'gif_sobre_home' => $gif
]);

if($res) {
    header('Location: ../../../../textos-imagens.php?create=true');
} else {
    header('Location: ../../../../textos-imagens.php?error=true');
}
