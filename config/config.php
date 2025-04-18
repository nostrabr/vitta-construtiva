<?php

require __DIR__.'/../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

// **********CONEXÃO COM O DB**********
require __DIR__.'/db.php';


// **********PEGANDO A PÁG ATUAL**********
include_once  __DIR__ .'/getUrl.php';


// **********BASE URL GERAL**********
$base_url = $_ENV['BASE_URL'];


// **********CONTET METATAGS**********
$titulo_site = $_ENV['TITULO_SITE_SEO'];
$descricao_site = $_ENV['DESCRICAO_SITE_SEO'];


// **********ANIMA SCROLL**********
$anima_scroll = 'data-aos="fade-up" data-aos-once="true"';