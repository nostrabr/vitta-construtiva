<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$area_atuacao_titulo = $_POST['area-atuacao-titulo'];
$area_atuacao_descricao = $_POST['area-atuacao-descricao'];
$area_atuacao_projetos = $_POST['area-atuacao-titulo-projetos'];
$area_atuacao_thumb = '';
$area_atuacao_banner = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['area-atuacao-thumb']) && $_FILES['area-atuacao-thumb']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $area_atuacao_thumb = $dataHora . basename($_FILES['area-atuacao-thumb']['name']);
    $caminhoDestino = $pastaDestino . $area_atuacao_thumb;

    move_uploaded_file($_FILES['area-atuacao-thumb']['tmp_name'], $caminhoDestino);
}

if (isset($_FILES['area-atuacao-banner']) && $_FILES['area-atuacao-banner']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $area_atuacao_banner = $dataHora . basename($_FILES['area-atuacao-banner']['name']);
    $caminhoDestino = $pastaDestino . $area_atuacao_banner;

    move_uploaded_file($_FILES['area-atuacao-banner']['tmp_name'], $caminhoDestino);
}


// salvar
$res = AreaAtuacaoRepository::create([
    'titulo' => $area_atuacao_titulo,
    'descricao' => $area_atuacao_descricao,
    'titulo_projetos' => $area_atuacao_projetos,
    'capa' => $area_atuacao_thumb,
    'banner' => $area_atuacao_banner
]);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
