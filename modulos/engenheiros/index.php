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
</style>



<section class="py-5">
    <h1 class="d-none">Nossos engenheiros</h1>


    <div style="color: #3C3C3B;" class="container mx-auto py-5">
        <h5 <?= $anima_scroll; ?> class="mb-5 pb-3 text-center">Conheça nossos <strong>engenheiros</strong></h5>

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
        breakpoints: {
            992: {
                slidesPerView: 4, // Quantidade de logos no desktop
            },
        },
        loop: false, // Loop infinito
    });
</script>