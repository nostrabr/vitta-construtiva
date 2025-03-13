<?php

    // Obtém a URL atual
    $urlAtual = $_SERVER['REQUEST_URI'];

    $linkAtivoIndex = null;
    $linkAtivoSobreNos = null;
    $linkAtivoContato = null;

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
    }else{
        $pagAtual = 'Vittà Construtiva | Início';
        $linkAtivoIndex = 'active-link';
    }