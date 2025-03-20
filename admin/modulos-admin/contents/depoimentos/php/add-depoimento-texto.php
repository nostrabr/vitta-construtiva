<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$depoimento_nome = $_POST['nome'];
$depoimento_empresa = $_POST['empresa'] ?? null;
$depoimento_texto = $_POST['depoimento'];
$depoimento_thumb = null;


$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/depoimentos/";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $depoimento_thumb = $dataHora . basename($_FILES['foto']['name']);
    $caminhoDestino = $pastaDestino . $depoimento_thumb;

    move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino);
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

if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
