<?php
   require 'config/config.php';

   //verifica auth;
   include_once './helpers/verifica-auth.php';

   // buscar banners
   use Repositories\BannersRepository;
   $banners = BannersRepository::getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- HEADER -->
    <?php include_once 'modulos-admin/header/index.php'; ?>
    <!-- HEADER -->

</head>
<body>

    <!-- LOADING -->
    <?php include_once 'modulos-admin/loading/index.php'; ?>
    <!-- LOADING -->

    <!-- NAVEGAÇÃO -->
    <?php include_once 'modulos-admin/navegacao/index.php'; ?>
    <!-- NAVEGAÇÃO -->


    <!-- CONTENT -->
    <main id="content-pagina">
        <h5 id="titulo-content-pagina" class="fw-semibold"><?php echo $tituloContentPagina ?></h5>

        <!-- módulo content página -->
        <?php include_once 'modulos-admin/contents/banners/index.php';?>
        <!-- módulo content página -->
    </main>
    <!-- CONTENT -->

    
    <!-- MODAL AVISOS -->
    <?php include_once "modulos-admin/modal-aviso/index.php"; ?>
    <!-- MODAL AVISOS -->

    <!-- MODAL BANNERS -->
    <?php include_once "modulos-admin/contents/banners/modais/add-banner.php"; ?>
    <!-- MODAL BANNERS -->




    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

        
</body>
</html>