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
            width: 70% !important;
            height: 120px !important;
        }

        .ico-parceiro{
            width: 80px;
        }
    }
</style>



<section class="py-5">
    <div class="container mx-auto py-4">
            <!-- mobile -->
            <div class="d-block d-lg-none text-center mt-0 mb-5 pb-4">
                <img class="ico-parceiro" src='<?= $base_url ?>assets/imagens/site/ico-parceiro.png'>
            </div>
            <!-- mobile -->

            <h5 class="text-center title-parceiros-home">Nossos <strong>Parceiros</strong></h5>

            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($parceiros as $key => $parceiro) { ?>
                        <div class="swiper-slide">
                            <div class="conatiner-logo-parceiro">
                                <img class="logo" src="<?= $base_url; ?>admin/assets/imagens/arquivos/parceiros/<?= $parceiro['logo']; ?>" alt="Logo">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- desktop -->
            <div class="d-none d-lg-block text-center mt-5">
                <img class="ico-parceiro" src='<?= $base_url ?>assets/imagens/site/ico-parceiro.png'>
            </div>
            <!-- desktop -->

    </div>
</section>



<script src="<?= $base_url; ?>assets/dependencias/swiper/swiper.js"></script>
<script>
        const swiper = new Swiper('.swiper', {
            slidesPerView: 2, // Quantidade de logos no mobile
            spaceBetween: 3, // Espaçamento entre os slides
            autoplay: {
                delay: 4000, // 3 segundos
                disableOnInteraction: false,
            },
            breakpoints: {
                992: {
                    slidesPerView: 5, // Quantidade de logos no desktop
                },
            },
            loop: true, // Loop infinito
        });
</script>