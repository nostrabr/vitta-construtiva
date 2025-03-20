<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$foto = '';


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/engenheiros/";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $foto = $dataHora . basename($_FILES['foto']['name']);
    $caminhoDestino = $pastaDestino . $foto;

    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino);
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
