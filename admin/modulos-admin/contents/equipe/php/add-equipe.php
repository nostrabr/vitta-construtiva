<?php

require '../../../../config/config.php';
use Repositories\EquipeRepository;

// pegando dados do do form
$nome = $_POST['nome'];
$cargo = $_POST['cargo'];
$texto = $_POST['texto'];
$foto = '';


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/equipe/";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $foto = $dataHora . basename($_FILES['foto']['name']);
    $caminhoDestino = $pastaDestino . $foto;

    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino);
}


// salvar
$res = EquipeRepository::create([
    'nome' => $nome,
    'cargo' => $cargo,
    'texto' => $texto,
    'foto' => $foto
]);

if($res) {
    header('Location: ../../../../equipe.php?create=true');
} else {
    header('Location: ../../../../equipe.php?error=true');
}
