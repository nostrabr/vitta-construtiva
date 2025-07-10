<style>
    .swiper {
        width: 100%;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto; 
    }

    .container-engenheiro{
        width: 100% !important;
        height: auto !important;
        margin: 0px 30px !important
    }

    .container-fot-engenheiro{
        width: 100%;
        height: 280px;
    }
    .container-fot-engenheiro img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    @media(min-width:1500px) {
        .container-fot-engenheiro{
            width: 100%;
            height: 310px;
        }
    }
    
    @media(max-width:992px) {
        .container-fot-engenheiro{
            width: 100%;
            height: 150px;
        }
        .container-engenheiro{
            margin: 0px 10px !important
        }
    }

        /* Estilos das setas de navegação */
    .swiper-button-next,
    .swiper-button-prev {
        color: #54565A !important;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        width: 40px !important;
        height: 40px !important;
        margin-top: -20px !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 16px !important;
        font-weight: bold;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        transform: scale(1.05);
    }

    .swiper-button-disabled {
        opacity: 0.3 !important;
    }

    @media(max-width:992px) {
        .swiper-button-next,
        .swiper-button-prev {
            width: 35px !important;
            height: 35px !important;
            margin-top: -17.5px !important;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 14px !important;
        }
    }
</style>



<section class="py-5">
    <h1 class="d-none">Nossos engenheiros</h1>


    <div style="color: #3C3C3B;" class="container mx-auto py-5">
        <h5 <?= $anima_scroll; ?> class="mb-5 text-center">Conheça nossos <strong>colaboradores</strong></h5>

        <p style="color: #3C3C3B;" class="mb-5 text-center"><?= $textos_imagens['texto_colaboradores']; ?></p>

        <div <?= $anima_scroll; ?> class="swiper">
            <div class="swiper-wrapper">

                    <?php foreach ($engenheiros as $key => $eng) { ?>
                        <div class="swiper-slide">
                            <div class="container-engenheiro">
                                <div class="mb-3 container-fot-engenheiro">
                                    <img src='<?= $base_url ?>admin/assets/imagens/arquivos/engenheiros/<?= $eng['foto']; ?>'>
                                </div>
                                <h5 class="fw-semibold mb-1" style="color: #BD937A;"><?= $eng['nome']; ?></h5>
                                <p class="small" style="color: #3C3C3B;"><?= $eng['cargo']; ?></p>
                            </div>
                        </div>
                    <?php } ?>

            </div>

            <!-- Setas de navegação -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>


<script src="<?= $base_url; ?>assets/dependencias/swiper/swiper.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        slidesPerView: 2, // Quantidade de items no mobile
        spaceBetween: 3, // Espaçamento entre os slides
        autoplay: {
            delay: 4000, // 3 segundos
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            992: {
                slidesPerView: 4, // Quantidade de logos no desktop
            },
        },
        loop: false, // Loop infinito
    });
</script>