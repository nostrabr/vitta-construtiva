<?php

require '../../../../config/config.php';
use Repositories\EnderecoRepository;

$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$pais = $_POST['pais'];
$link_maps = $_POST['link-maps'];

$data = [
    'endereco' => $endereco,
    'bairro' => $bairro,
    'cidade' => $cidade,
    'estado' => $estado,
    'cep' => $cep,
    'pais' => $pais,
    'link_maps' => $link_maps
];

$res = EnderecoRepository::update($data);

if(!$res){
    header('Location: ../../../../dashboard.php?error=true');
    exit;
}else{
    header('Location: ../../../../dashboard.php?success=true');
    exit;
}


