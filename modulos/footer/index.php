<style>
    #rodape{
        border-top: 2px solid #BD937A;
    }

    #logo-footer{
        width: 220px;
    }
</style>



<section class="pt-5">
    <div class="container mx-auto mb-5">
        <div class="row">
            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                <a href="<?= $base_url; ?>" class="d-none d-lg-block text-start"><img style="width: 160px;" src='<?= $base_url ?>assets/imagens/site/logo-footer-desktop.png'></a>
                <a href="<?= $base_url; ?>" class="d-block d-lg-none text-center"><img style="width: 55%;" src='<?= $base_url ?>assets/imagens/site/logo-footer-mobile.png'></a>
            </div>

            <div class="mb-5 mb-lg-0 col-12 col-lg-2 d-flex flex-column align-items-center align-items-lg-start justify-content-start">
                <h6 style="color: #110F0A;" class="fw-semibold mb-4">Empresa</h6>

                <a href="<?= $base_url; ?>" style="color: #54565A;" class="mb-3 small">Home</a>
                <a href="<?= $base_url; ?>sobre-nos.php" style="color: #54565A;" class="mb-3 small">Quem Somos</a>
                <a href="<?= $base_url; ?>depoimentos.php" style="color: #54565A;" class="mb-3 small">Depoimentos</a>
                <a href="<?= $base_url; ?>contato.php" style="color: #54565A;" class="mb-3 small">Contato</a>
            </div>

            <div class="mb-5 mb-lg-0 col-12 col-lg-2 d-flex flex-column align-items-center align-items-lg-start justify-content-start">
                <h6 style="color: #110F0A;" class="fw-semibold mb-4">Áreas de atuação</h6>

                <?php foreach ($areas_atuacao as $key => $area) { ?>
                    <a href="<?= $base_url; ?>area-atuacao.php?id=<?= $area['id']; ?>" style="color: #54565A;" class="mb-3 small"><?= $area['titulo']; ?></a>
                <?php } ?>
            </div>

            <div class="col-12 col-lg-2 d-flex flex-column align-items-center align-items-lg-start justify-content-start">
                <h6 style="color: #110F0A;" class="fw-semibold mb-4">Nos acompanhe</h6>

                <div class="d-flex">
                    <a class="fs-4" href="<?= $contatos['facebook']; ?>" target="_blank"><i style="color: #97999B;" class="fab fa-facebook"></i></a>
                    <a class="mx-4 fs-4" href="<?= $contatos['instagram']; ?>" target="_blank"><i style="color: #97999B;" class="fab fa-instagram"></i></a>
                    <a class="fs-4" href="<?= $contatos['linkedin']; ?>" target="_blank"><i style="color: #97999B;" class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div id="rodape" class="py-4">
        <div class="container mx-auto d-flex flex-column flex-lg-row align-items-center justify-content-between px-4 px-lg-0">
            <span class="text-center text-lg-start mb-4 mb-lg-0" style="color: #97999B;">© <?= date('Y'); ?> Vittá Construtiva. Todos os direitos reservados.</span>

            <a href="https://nostrabr.com/" target="_blank"><img style="width: 80px;" src='<?= $base_url ?>assets/imagens/site/logo-nostra.png'></a>
        </div>
    </div>
</section>