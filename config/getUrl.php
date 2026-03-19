<?php

    // Obtém a URL atual
    $urlAtual = $_SERVER['REQUEST_URI'] ?? '/';
    $pathAtual = parse_url($urlAtual, PHP_URL_PATH) ?? '/';
    $queryAtual = parse_url($urlAtual, PHP_URL_QUERY);

    $pathNormalizado = trim($pathAtual, '/');
    $partesPath = $pathNormalizado !== '' ? explode('/', $pathNormalizado) : [];
    $arquivoAtual = count($partesPath) > 0 ? end($partesPath) : 'index.php';

    if ($arquivoAtual === 'vitta-construtiva' || $arquivoAtual === '') {
        $arquivoAtual = 'index.php';
    }

    $canonical_url = rtrim($base_url, '/').'/';
    if ($arquivoAtual !== 'index.php') {
        $canonical_url .= $arquivoAtual;
    }

    if (!empty($queryAtual) && in_array($arquivoAtual, ['area-atuacao.php', 'projeto.php'], true)) {
        $canonical_url .= '?'.$queryAtual;
    }

    $meta_robots = 'index, follow';

    $linkAtivoIndex = null;
    $linkAtivoSobreNos = null;
    $linkAtivoContato = null;
    $linkAtivoDepoimentos = null;
    $linkAtivoAreaAtuacao = null;
    $linkAtivoProjeto = null;

    // Devolve o nome da página atual
    if(strpos($urlAtual, 'index') !== false || $arquivoAtual === 'index.php'){
        $pagAtual = 'Construtora em Passo Fundo RS | Obras Residenciais e Comerciais | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Construtora em Passo Fundo RS especializada em obras residenciais e comerciais com planejamento, qualidade e execução de alto padrão.';
        $seo_h1 = 'Construtora em Passo Fundo RS para obras residenciais e comerciais';
        $linkAtivoIndex = 'active-link';
    }else if(strpos($urlAtual, 'sobre-nos') !== false){
        $pagAtual = 'Quem Somos | Construtora em Passo Fundo RS | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Conheça a Vittà Construtora, empresa de Passo Fundo RS focada em obras residenciais e comerciais com eficiência e compromisso.';
        $seo_h1 = 'Quem somos da Vittà Construtora em Passo Fundo RS';
        $linkAtivoSobreNos = 'active-link';
    }else if(strpos($urlAtual, 'contato') !== false){
        $pagAtual = 'Orçamento de Obra em Passo Fundo | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Solicite orçamento de obra em Passo Fundo RS com a Vittà Construtora. Atendimento para projetos residenciais e comerciais.';
        $seo_h1 = 'Orçamento de obra com a Vittà Construtora em Passo Fundo';
        $linkAtivoContato = 'active-link';
    }else if(strpos($urlAtual, 'depoimentos') !== false){
        $pagAtual = 'Depoimentos de Clientes | Vittà Construtora em Passo Fundo RS';
        $seo_title = $pagAtual;
        $seo_description = 'Veja depoimentos de clientes da Vittà Construtora e conheça experiências reais em obras residenciais e comerciais em Passo Fundo.';
        $seo_h1 = 'Depoimentos de clientes da Vittà Construtora';
        $linkAtivoDepoimentos = 'active-link';
    }else if(strpos($urlAtual, 'area-atuacao') !== false){
        $pagAtual = 'Obras Residenciais e Comerciais em Passo Fundo | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Conheça as áreas de atuação da Vittà Construtora em Passo Fundo RS para obras residenciais e comerciais com alto padrão de execução.';
        $seo_h1 = 'Áreas de atuação da Vittà Construtora em Passo Fundo RS';
        $linkAtivoAreaAtuacao = 'active-link';
    }else if(strpos($urlAtual, 'projeto') !== false){
        $pagAtual = 'Projetos e Obras Concluídas em Passo Fundo | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Confira projetos e obras da Vittà Construtora em Passo Fundo RS e veja detalhes de execução com foco em qualidade e resultado.';
        $seo_h1 = 'Projetos e obras da Vittà Construtora em Passo Fundo RS';
        $linkAtivoProjeto = 'active-link';
    }else{
        $pagAtual = 'Construtora em Passo Fundo RS | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Vittà Construtora em Passo Fundo RS com soluções em obras residenciais e comerciais.';
        $seo_h1 = 'Vittà Construtora em Passo Fundo RS';
        $linkAtivoIndex = 'active-link';
    }