<?php
    include_once __DIR__ . '/config/config.php';

    // buscar contatos
    use Repositories\ContatosRepository;
    $contatos = ContatosRepository::getContatos();

    // buscar banners
    use Repositories\BannersRepository;
    $banners = BannersRepository::getBanners();

    // buscar engenheiros
    use Repositories\EngenheirosRepository;
    $engenheiros = EngenheirosRepository::getAll();

    // buscar equipe
    use Repositories\EquipeRepository;
    $equipe = EquipeRepository::getAll();

    // buscar textos imagens
    use Repositories\TextosImagensRepository;
    $textos_imagens = TextosImagensRepository::getAll();

    // buscar areas de atuação
    use Repositories\AreaAtuacaoRepository;
    $areas_atuacao = AreaAtuacaoRepository::getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>

    <!-- MENU -->
    <?php include_once  __DIR__ .'/modulos/menu/index.php'; ?>
    <!-- MENU -->

    <!-- BANNER -->
    <?php include_once  __DIR__ .'/modulos/banner-sobre/index.php'; ?>
    <!-- BANNER -->
    
    <!-- SOBRE CONTENT -->
    <?php include_once  __DIR__ .'/modulos/sobre-content/index.php'; ?>
    <!-- SOBRE CONTENT -->

    <!-- EQUIPE -->
    <?php include_once  __DIR__ .'/modulos/equipe/index.php'; ?>
    <!-- EQUIPE -->

    <!-- ENGENHEIROS -->
    <?php include_once  __DIR__ .'/modulos/engenheiros/index.php'; ?>
    <!-- ENGENHEIROS -->

    <!-- CONTATO -->
    <?php include_once  __DIR__ .'/modulos/entre-em-contato/index.php'; ?>
    <!-- CONTATO -->

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
</body>
</html>