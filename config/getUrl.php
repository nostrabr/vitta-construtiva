<?php

// Obtém a URL atual
$urlAtual = $_SERVER['REQUEST_URI'] ?? '/';
$pathAtual = parse_url($urlAtual, PHP_URL_PATH) ?? '/';

$basePath = trim(parse_url($base_url, PHP_URL_PATH) ?? '', '/');
$pathNormalizado = trim($pathAtual, '/');

if ($basePath !== '' && strpos($pathNormalizado, $basePath) === 0) {
    $pathNormalizado = trim(substr($pathNormalizado, strlen($basePath)), '/');
}

$segmentos = $pathNormalizado !== '' ? explode('/', $pathNormalizado) : [];
$primeiroSegmento = $segmentos[0] ?? '';

$canonical_url = rtrim($base_url, '/').'/';
$meta_robots = 'index, follow';

    $linkAtivoIndex = null;
    $linkAtivoSobreNos = null;
    $linkAtivoContato = null;
    $linkAtivoDepoimentos = null;
    $linkAtivoAreaAtuacao = null;
    $linkAtivoProjeto = null;

// Devolve o nome da página atual
if(
    $primeiroSegmento === '' ||
    $primeiroSegmento === 'inicio' ||
    $primeiroSegmento === 'index.php'
){
        $canonical_url = rtrim($base_url, '/').'/';
        $pagAtual = 'Construtora em Passo Fundo RS | Obras Residenciais e Comerciais | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Construtora em Passo Fundo RS especializada em obras residenciais e comerciais com planejamento, qualidade e execução de alto padrão.';
        $seo_h1 = 'Construtora em Passo Fundo RS para obras residenciais e comerciais';
        $linkAtivoIndex = 'active-link';
    }else if($primeiroSegmento === 'sobre-nos' || $primeiroSegmento === 'sobre-nos.php'){
        $canonical_url = rtrim($base_url, '/').'/sobre-nos';
        $pagAtual = 'Quem Somos | Construtora em Passo Fundo RS | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Conheça a Vittà Construtora, empresa de Passo Fundo RS focada em obras residenciais e comerciais com eficiência e compromisso.';
        $seo_h1 = 'Quem somos da Vittà Construtora em Passo Fundo RS';
        $linkAtivoSobreNos = 'active-link';
    }else if($primeiroSegmento === 'contato' || $primeiroSegmento === 'contato.php'){
        $canonical_url = rtrim($base_url, '/').'/contato';
        $pagAtual = 'Orçamento de Obra em Passo Fundo | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Solicite orçamento de obra em Passo Fundo RS com a Vittà Construtora. Atendimento para projetos residenciais e comerciais.';
        $seo_h1 = 'Orçamento de obra com a Vittà Construtora em Passo Fundo';
        $linkAtivoContato = 'active-link';
    }else if($primeiroSegmento === 'depoimentos' || $primeiroSegmento === 'depoimentos.php'){
        $canonical_url = rtrim($base_url, '/').'/depoimentos';
        $pagAtual = 'Depoimentos de Clientes | Vittà Construtora em Passo Fundo RS';
        $seo_title = $pagAtual;
        $seo_description = 'Veja depoimentos de clientes da Vittà Construtora e conheça experiências reais em obras residenciais e comerciais em Passo Fundo.';
        $seo_h1 = 'Depoimentos de clientes da Vittà Construtora';
        $linkAtivoDepoimentos = 'active-link';
    }else if($primeiroSegmento === 'areas' || $primeiroSegmento === 'area-atuacao.php'){
        if ($primeiroSegmento === 'areas' && isset($segmentos[1])) {
            $canonical_url = rtrim($base_url, '/').'/areas/'.(int)$segmentos[1];
        }
        $pagAtual = 'Obras Residenciais e Comerciais em Passo Fundo | Vittà Construtora';
        $seo_title = $pagAtual;
        $seo_description = 'Conheça as áreas de atuação da Vittà Construtora em Passo Fundo RS para obras residenciais e comerciais com alto padrão de execução.';
        $seo_h1 = 'Áreas de atuação da Vittà Construtora em Passo Fundo RS';
        $linkAtivoAreaAtuacao = 'active-link';
    }else if($primeiroSegmento === 'projetos' || $primeiroSegmento === 'projeto.php'){
        if ($primeiroSegmento === 'projetos' && isset($segmentos[1], $segmentos[2])) {
            $canonical_url = rtrim($base_url, '/').'/projetos/'.(int)$segmentos[1].'/'.(int)$segmentos[2];
        }
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