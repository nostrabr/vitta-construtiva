<style>
    .swiper {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto; 
    }

    .conatiner-logo-parceiro{
        width: 100% !important;
        height: 170px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0px 30px !important;
    }
    .logo {
        width: 100% !important;
    }

    .ico-parceiro{
        width: 90px;
    }


    .title-parceiros-home{
        font-size: 19px;
        margin-bottom: 10px !important;
    }
    @media(min-width:1500px) {
        .title-parceiros-home{
            font-size: 22px;
        }

        .ico-parceiro{
            width: 120px;
        }
    }
    
    @media(max-width:992px) {
        .title-parceiros-home{
            font-size: 18px;
        }

        .conatiner-logo-parceiro{
            width: 50% !important;
            height: 150px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .ico-parceiro{
            width: 80px;
        }
    }
</style>



<section class="py-5">
    <h2 class="d-none">Nossos parceiros</h2>

    <div class="container mx-auto py-4">

            <h5 <?= $anima_scroll; ?> class="text-center title-parceiros-home">Nossos <strong>Parceiros</strong></h5>

            <div class="row justify-content-center">
                <?php foreach ($parceiros as $key => $parceiro) { ?>
                    <div class="col-12 col-lg-2 px-1 px-lg-3">
                        <div class="conatiner-logo-parceiro">
                            <img class="logo" src="<?= $base_url; ?>admin/assets/imagens/arquivos/parceiros/<?= $parceiro['logo']; ?>" alt="Logo">
                        </div>
                    </div>
                <?php } ?>
            </div>

    </div>
</section>



<script src="<?= $base_url; ?>assets/dependencias/swiper/swiper.js"></script>