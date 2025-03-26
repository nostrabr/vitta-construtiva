<?php

    // Obtém a URL atual
    $urlAtual = $_SERVER['REQUEST_URI'];

    $linkAtivoIndex = null;
    $linkAtivoSobreNos = null;
    $linkAtivoContato = null;
    $linkAtivoDepoimentos = null;
    $linkAtivoAreaAtuacao = null;
    $linkAtivoProjeto = null;

    // Devolve o nome da página atual
    if(strpos($urlAtual, 'index') !== false){
        $pagAtual = 'Vittà Construtiva | Início';
        $linkAtivoIndex = 'active-link';
    }else if(strpos($urlAtual, 'sobre-nos') !== false){
        $pagAtual = 'Vittà Construtiva | Sobre Nós';
        $linkAtivoSobreNos = 'active-link';
    }else if(strpos($urlAtual, 'contato') !== false){
        $pagAtual = 'Vittà Construtiva | Contato';
        $linkAtivoContato = 'active-link';
    }else if(strpos($urlAtual, 'depoimentos') !== false){
        $pagAtual = 'Vittà Construtiva | Depoimentos';
        $linkAtivoDepoimentos = 'active-link';
    }else if(strpos($urlAtual, 'area-atuacao') !== false){
        $pagAtual = 'Vittà Construtiva | Área de atuação';
        $linkAtivoAreaAtuacao = 'active-link';
    }else if(strpos($urlAtual, 'projeto') !== false){
        $pagAtual = 'Vittà Construtiva | Projeto';
        $linkAtivoProjeto = 'active-link';
    }else{
        $pagAtual = 'Vittà Construtiva | Início';
        $linkAtivoIndex = 'active-link';
    }