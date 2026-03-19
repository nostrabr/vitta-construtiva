<?php
    include_once __DIR__ . '/config/config.php';

    // buscar contatos
    use Repositories\ContatosRepository;
    $contatos = ContatosRepository::getContatos();

    // buscar areas de atuação
    use Repositories\AreaAtuacaoRepository;
    $areas_atuacao = AreaAtuacaoRepository::getAll();

    $id = $_GET['id'] ?? null;
    $idArea = $_GET['area'] ?? null;

    // buscar projeto
    if ($id && $idArea) {
        $projeto = AreaAtuacaoRepository::getProjeto($id);
        $areaProjeto = AreaAtuacaoRepository::getAreaAtuacao($idArea);

        $nomeProjetoSeo = $projeto['identificador'] ?? null;
        if (!$nomeProjetoSeo || trim($nomeProjetoSeo) === '') {
            $nomeProjetoSeo = 'Projeto '.$id;
        }

        $seo_title = $nomeProjetoSeo.' | '.$areaProjeto['titulo'].' em Passo Fundo RS | Vittà Construtora';
        $seo_description = 'Veja detalhes do '.$nomeProjetoSeo.', obra da Vittà Construtora em '.$areaProjeto['titulo'].' com foco em qualidade e execução em Passo Fundo RS.';
        $seo_h1 = $nomeProjetoSeo.' - '.$areaProjeto['titulo'].' em Passo Fundo RS';
        $canonical_url = rtrim($base_url, '/').'/projetos/'.$idArea.'/'.$id;
    } else {
        header('Location:' . $base_url);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>
    <h1 class="d-none"><?= $seo_h1 ?? 'Projeto da Vittà Construtora'; ?></h1>

    <!-- WPP FLOAT -->
    <?php include_once  __DIR__ .'/modulos/wpp-float/index.php'; ?>
    <!-- WPP FLOAT -->

    <!-- MENU -->
    <?php include_once  __DIR__ .'/modulos/menu/index.php'; ?>
    <!-- MENU -->

    <!-- BANNER PROJETO -->
    <?php include_once  __DIR__ .'/modulos/banner-projeto/index.php'; ?>
    <!-- BANNER PROJETO -->
     
    <!-- CONTENT PROJETO -->
    <?php include_once  __DIR__ .'/modulos/content-projeto/index.php'; ?>
    <!-- CONTENT PROJETO -->

    <!-- ENTRE EM CONTATO -->
    <?php include_once  __DIR__ .'/modulos/entre-em-contato/index.php'; ?>
    <!-- ENTRE EM CONTATO -->

    <!-- FOOTER -->
    <?php include_once  __DIR__ .'/modulos/footer/index.php'; ?>
    <!-- FOOTER -->





    <!-- SCROLL ANIMATION -->
    <script src="<?= $base_url; ?>assets/dependencias/anima-scroll/aos.js"></script>
    <script>AOS.init()</script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- FANCYBOX JS -->
    <script src="<?= $base_url; ?>assets/dependencias/fancybox/fancybox-1.js"></script>
    <script src="<?= $base_url; ?>assets/dependencias/fancybox/fancybox-2.js"></script>

    <!-- JS GLOBAL -->
    <script src="<?= $base_url; ?>assets/js/app.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ7956S9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>