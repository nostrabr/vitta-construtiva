<?php
    include_once __DIR__ . '/config/config.php';

    // buscar contatos
    use Repositories\ContatosRepository;
    $contatos = ContatosRepository::getContatos();

    // buscar areas de atuação
    use Repositories\AreaAtuacaoRepository;
    $areas_atuacao = AreaAtuacaoRepository::getAll();

    // filtrar área de atuação
    $id = $_GET['id'] ?? null;
    $area_atuacao = null;

    if(!$id) {
        header('Location: '.$base_url);
        exit;
    }

    foreach ($areas_atuacao as $key => $area) {
        if($area->id == $id) {
            $area_atuacao = $area;
            break;
        }
    } 

    if(!$area_atuacao) {
        header('Location: '.$base_url);
        exit;
    }

    $seo_title = $area_atuacao['titulo'].' em Passo Fundo RS | Construtora Vittá';
    $seo_description = 'Conheça os serviços de '.$area_atuacao['titulo'].' da Construtora Vittá em Passo Fundo RS e veja obras residenciais e comerciais realizadas.';
    $seo_h1 = $area_atuacao['titulo'].' em Passo Fundo RS';
    $canonical_url = rtrim($base_url, '/').'/areas/'.$area_atuacao['id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>
    <h1 class="d-none"><?= $seo_h1 ?? 'Áreas de atuação da Construtora Vittá'; ?></h1>

    <!-- WPP FLOAT -->
    <?php include_once  __DIR__ .'/modulos/wpp-float/index.php'; ?>
    <!-- WPP FLOAT -->

    <!-- MENU -->
    <?php include_once  __DIR__ .'/modulos/menu/index.php'; ?>
    <!-- MENU -->

    <!-- BANNER ÁREA ATUAÇÃO -->
    <?php include_once  __DIR__ .'/modulos/banner-area-atuacao/index.php'; ?>
    <!-- BANNER ÁREA ATUAÇÃO -->

    <!-- TEXTO ÁREA ATUAÇÃO -->
    <?php include_once  __DIR__ .'/modulos/texto-area-atuacao/index.php'; ?>
    <!-- TEXTO ÁREA ATUAÇÃO -->

    <!-- PROJETOS ÁREA ATUAÇÃO -->
    <?php include_once  __DIR__ .'/modulos/projetos-area-atuacao/index.php'; ?>
    <!-- PROJETOS ÁREA ATUAÇÃO -->

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

    <!-- JS GLOBAL -->
    <script src="<?= $base_url; ?>assets/js/app.js"></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJ7956S9"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>