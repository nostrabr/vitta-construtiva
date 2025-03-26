<?php
    include_once __DIR__ . '/config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

    <?php include_once  __DIR__ .'/modulos/header/index.php'; ?>

</head>
<body>














    <!-- SCROLL ANIMATION -->
    <script src="<?= $base_url; ?>assets/dependencias/anima-scroll/aos.js"></script>
    <script>AOS.init()</script>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- JS GLOBAL -->
    <script src="<?= $base_url; ?>assets/js/app.js"></script>
</body>
</html>