<style>
    .container-banner{
        width: 100%;
    }
    @media(max-width:992px){
        .container-banner{
            width: 800px !important;
        }
    }



    .container-desktop-banner{
        width: 70%;
        height: 60px;
    }
    .container-desktop-banner img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .container-mobile-banner{
        width: 30%;
        height: 60px;
    }
    .container-mobile-banner img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }


    .btn-edit-banner{
        background-color: transparent;
        border: none;
        cursor: pointer;
    }


    @media(min-width:1500px){
        .container-desktop-banner{
            width: 50%;
            height: 60px;
        }
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>banners mobile e desktop</strong> do seu site!</p>

<!-- banner home -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Home</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_home_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_home_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="../index.php" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_home_desktop','banner_home_mobile', '<?= $banners[0]['banner_home_desktop']; ?>', '<?= $banners[0]['banner_home_mobile']; ?>', 'Home')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner home -->


<!-- banner quem somos -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Sobre nós</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_quem_somos_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_quem_somos_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="../sobre-nos.php" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_quem_somos_desktop','banner_quem_somos_mobile', '<?= $banners[0]['banner_quem_somos_desktop']; ?>', '<?= $banners[0]['banner_quem_somos_mobile']; ?>', 'Sobre nós')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner quem somos -->



<!-- banner depoimentos -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Depoimentos</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_depoimentos_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_depoimentos_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="../depoimentos.php" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_depoimentos_desktop','banner_depoimentos_mobile', '<?= $banners[0]['banner_depoimentos_desktop']; ?>', '<?= $banners[0]['banner_depoimentos_mobile']; ?>', 'Depoimentos')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner depoimentos -->





<!-- banner contato -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Contato</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_contato_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_contato_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="../contato.php" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_contato_desktop','banner_contato_mobile', '<?= $banners[0]['banner_contato_desktop']; ?>', '<?= $banners[0]['banner_contato_mobile']; ?>', 'Contato')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner contato -->


<!-- banner arquitetura -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Arquitetura</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_arquitetura_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_arquitetura_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_arquitetura_desktop','banner_arquitetura_mobile', '<?= $banners[0]['banner_arquitetura_desktop']; ?>', '<?= $banners[0]['banner_arquitetura_mobile']; ?>', 'Arquitetura')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner arquitetura -->




<!-- banner engenharia -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Engenharia</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_engenharia_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_engenharia_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_engenharia_desktop','banner_engenharia_mobile', '<?= $banners[0]['banner_engenharia_desktop']; ?>', '<?= $banners[0]['banner_engenharia_mobile']; ?>', 'Engenharia')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner engenharia -->


<!-- banner interiores -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Interiores</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_interiores_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_interiores_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_interiores_desktop','banner_interiores_mobile', '<?= $banners[0]['banner_interiores_desktop']; ?>', '<?= $banners[0]['banner_interiores_mobile']; ?>', 'Interiores')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner interiores -->



<!-- banner obras -->
<section class="w-100 mb-5 pb-4" style="overflow-x: auto;">
    <h6 class="mb-3">Atualizar banner da página Obras</h6>

    <!-- header -->
    <div class="container-banner row py-3">
        <div class="small col-2 fw-bold align-self-center">BANNER</div>
        <div class="small col-3 fw-bold align-self-center">DESKTOP</div>
        <div class="small col-3 fw-bold align-self-center">MOBILE</div>
        <div class="small col-2 fw-bold align-self-center">VISUALIZAR</div>
        <div class="small col-2 fw-bold text-end align-self-center">AÇÕES</div>
    </div>
    <!-- header -->
         
    <!-- content -->
    <div class="container-banner row py-4 border-top border-bottom">
        <div class="col-2 align-self-center">1-</div>
        <div class="col-3 align-self-center"> <div class="container-desktop-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_obras_desktop']; ?>"> </div> </div>
        <div class="col-3 align-self-center"> <div class="container-mobile-banner"> <img src="<?php echo $base_url ?>assets/imagens/arquivos/banners/<?= $banners[0]['banner_obras_mobile']; ?>"> </div> </div>
        <div class="col-2 align-self-center"> <a href="" target="_blank">Ver no site</a> </div>
        <div class="col-2 text-end align-self-center"> <button class="btn-edit-banner" onclick="inserirIdModalAddBanner('banner_obras_desktop','banner_obras_mobile', '<?= $banners[0]['banner_obras_desktop']; ?>', '<?= $banners[0]['banner_obras_mobile']; ?>', 'Obras')" data-bs-toggle="modal" data-bs-target="#modalBanner"><i class="fas fa-edit fs-3"></i></button> </div>
    </div>
    <!-- content -->
</section>
<!-- banner obras -->









<script>
    //inserindo ids banner mobile e desktop dinâmico
    function inserirIdModalAddBanner(refDesktop, refMobile, nomeDesktop, nomeMobile, pag){
        document.getElementById("pagina-banner").textContent = `Atualizar banner ${pag}`
        document.getElementById("refBannerDesktop").value = refDesktop
        document.getElementById("refBannerMobile").value = refMobile
        document.getElementById("nomeBannerDesktop").value = nomeDesktop
        document.getElementById("nomeBannerMobile").value = nomeMobile
    }
</script>