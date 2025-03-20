<?php

require '../../../../config/config.php';
use Repositories\ParceirosRepository;

// pegando dados do do form
$nome = $_POST['nome'];
$logo = '';


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/parceiros/";

if (isset($_FILES['logo']) && $_FILES['logo']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $logo = $dataHora . basename($_FILES['logo']['name']);
    $caminhoDestino = $pastaDestino . $logo;

    move_uploaded_file($_FILES['logo']['tmp_name'], $caminhoDestino);
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
