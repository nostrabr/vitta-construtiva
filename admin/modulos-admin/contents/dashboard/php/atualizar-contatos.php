<?php

require '../../../../config/config.php';
use Repositories\ContatosRepository;

$instagram = $_POST['instagram'];
$instagramTXT = $_POST['@_instagram'];
$facebook = $_POST['facebook'];
$facebookTXT = $_POST['@_facebook'];
$linkedin = $_POST['linkedin'];
$linkedinTXT = $_POST['@_linkedin'];
$email_clientes = $_POST['email-clientes'];
$email_fornecedor = $_POST['email-fornecedor'];
$telefone_clientes = $_POST['telefone-clientes'];
$telefone_fornecedor = $_POST['telefone-fornecedor'];

$data = [
    'instagram' => $instagram,
    '@_instagram' => $instagramTXT,
    'facebook' => $facebook,
    '@_facebook' => $facebookTXT,
    'linkedin' => $linkedin,
    '@_linkedin' => $linkedinTXT,
    'email-clientes' => $email_clientes,
    'email-fornecedor' => $email_fornecedor,
    'telefone-clientes' => $telefone_clientes,
    'telefone-fornecedor' => $telefone_fornecedor
];

$res = ContatosRepository::update($data);

if(!$res){
    header('Location: ../../../../dashboard.php?error=true');
    exit;
}else{
    header('Location: ../../../../dashboard.php?success=true');
    exit;
}


