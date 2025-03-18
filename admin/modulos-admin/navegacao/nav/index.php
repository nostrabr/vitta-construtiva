<?php
    // verificando qual página
    $urlAtual = $_SERVER['REQUEST_URI'];

    // titulos content páginas
    $tituloContentPagina = "";

    // link ativo página
    $activeDashboard = false;
    $activeBanners = false;
    $activeAreasAtuacao = false;
    $activeDepoimentos = false;
    $activeEngenheiros = false;
    $activeEquipe = false;
    $activeParceiros = false;
    $activeTextosImagens = false;

    // Devolve o nome da página atual
    if(strpos($urlAtual, 'dashboard') !== false){
        $tituloContentPagina = "Contatos";
        $activeDashboard = true;
    }else if(strpos($urlAtual, 'banners') !== false){
        $tituloContentPagina = "Banners";
        $activeBanners = true;
    }else if(strpos($urlAtual, 'areas-atuacao.php') !== false){
        $tituloContentPagina = "Áreas de Atuação";
        $activeAreasAtuacao = true;
    }else if(strpos($urlAtual, 'depoimentos.php') !== false){
        $tituloContentPagina = "Depoimentos";
        $activeDepoimentos = true;
    }else if(strpos($urlAtual, 'engenheiros.php') !== false){
        $tituloContentPagina = "Engenheiros";
        $activeEngenheiros = true;
    }else if(strpos($urlAtual, 'equipe.php') !== false){
        $tituloContentPagina = "Equipe";
        $activeEquipe = true;
    }else if(strpos($urlAtual, 'parceiros.php') !== false){
        $tituloContentPagina = "Parceiros";
        $activeParceiros = true;
    }else if(strpos($urlAtual, 'textos-imagens.php') !== false){
        $tituloContentPagina = "Textos Imagens";
        $activeTextosImagens = true;
    }else{
        $tituloContentPagina = "Contatos";
        $activeDashboard = true;
    }
?>




<nav class="d-flex flex-column w-100 mt-5 pt-5 mt-lg-0 pt-lg-0">
    <a href="dashboard.php" class="link-nav-desktop <?= $activeDashboard ? 'active-link-desktop' : ''; ?>">Contatos</a>
    <a href="banners.php" class="link-nav-desktop <?= $activeBanners ? 'active-link-desktop' : ''; ?>">Banners</a>
    <a href="areas-atuacao.php" class="link-nav-desktop <?= $activeAreasAtuacao ? 'active-link-desktop' : ''; ?>">Áreas de atuação</a>
    <a href="depoimentos.php" class="link-nav-desktop <?= $activeDepoimentos ? 'active-link-desktop' : ''; ?>">Depoimentos</a>
    <a href="engenheiros.php" class="link-nav-desktop <?= $activeEngenheiros ? 'active-link-desktop' : ''; ?>">Engenheiros</a>
    <a href="equipe.php" class="link-nav-desktop <?= $activeEquipe ? 'active-link-desktop' : ''; ?>">Equipe</a>
    <a href="parceiros.php" class="link-nav-desktop <?= $activeParceiros ? 'active-link-desktop' : ''; ?>">Parceiros</a>
    <a href="textos-imagens.php" class="link-nav-desktop <?= $activeTextosImagens ? 'active-link-desktop' : ''; ?>">Textos e Imagens</a>
    <a class="link-nav-desktop"><?php include "modulos-admin/btn-logout/index.php"; ?></a>
</nav>