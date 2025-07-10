<style>
    .container-img-projeto-sobre{
        width: 100%;
        height: 330px;
        overflow: hidden;
        border-radius: 5px;
    }
    .container-img-projeto-sobre img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .container-sobre-projeto{
        width: 95% !important;
    }

    .font-text-info{
        font-size: 17px !important;
    }

    .icone-link-compartilhar{
        padding: 10px !important;
        border-radius: 5px !important;
        color: #54565A !important;
        background-color: transparent !important;
    }

    .pro-relacionados {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto; 
    }

    .container-thumb-pro{
        width: 100% !important;
        height: 270px !important;
        overflow: hidden !important;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0px 10px !important;
    }
    .thumb-pro {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center !important;
    }


    .container-imagem-galeria{
        width: 100%;
        height: 900px;
        overflow: hidden !important;
        border-radius: 5px;
    }
    .container-imagem-galeria img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Estilos para os botões de navegação do Swiper */
    .swiper-button-next,
    .swiper-button-prev {
        color: #fff;
        background-color: rgba(84, 86, 90, 0.5);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background-color: rgba(84, 86, 90, 0.8);
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 18px;
        font-weight: bold;
    }

    @media(min-width:1500px) {
        .container-sobre-projeto{
            width: 80% !important;
        }

        .font-text-info{
            font-size: 20px !important;
        }

        .container-img-projeto-sobre{
            height: 420px;
        }

        .container-imagem-galeria{
            height: 1500px;
        }
    }
    
    @media(max-width:992px) {
        .container-sobre-projeto{
            width: 100% !important;
        }

        .font-text-info{
            font-size: 16px !important;
        }

        .container-img-projeto-sobre{
            height: 400px;
        }
        .container-imagem-galeria{
            height: 650px;
        }
    }

    .data-img-fancy:hover{
        opacity: 1 !important;
    }
</style>


<section class="py-5" style="overflow-x: hidden !important;">
    <h2 class="d-none">Nossos projetos</h2>

    <div class="container-sobre-projeto mx-auto py-5 text-center">
        <img <?= $anima_scroll; ?> style="width: 9em;" src='<?= $base_url ?>assets/imagens/site/logo-menu.png'>

        <div style="background-color: #54565A;" class="w-100 px-lg-5">
            <div class="mt-5 rounded px-4 px-lg-5 py-5 row mx-0 mx-lg-5">
                <div <?= $anima_scroll; ?> class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="container-img-projeto-sobre">
                        <img src='<?= $base_url ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $projeto['imagem_info_projeto'] ?>'>
                    </div>
                </div>
                <div <?= $anima_scroll; ?> class="font-text-info col-12 col-lg-8 text-start ps-0 pe-0 ps-lg-5" style="color: white;">
                    <?= $projeto['descricao']; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- GALERIA -->
    <?php if(count($projeto['imagensProjeto']) != 0) { ?>
        <section class="container-sobre-projeto mx-auto my-5">
            <h5 class="text-center mb-4" style="color: #3C3C3B;">Galeria de imagens</h5>        <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($projeto['imagensProjeto'] as $key => $imagem) { ?>
                        <div class="swiper-slide">
                            <div class="container-imagem-galeria">
                                <a class="data-img-fancy" data-fancybox="gallery" href="<?= $base_url; ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $imagem['imagem'] ?>"><img src="<?= $base_url; ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $imagem['imagem'] ?>" alt="imagem"></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Adiciona os botões de navegação -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </section>
    <?php } ?>
    <!-- GALERIA -->


    <div class="container-sobre-projeto mx-auto py-5 text-center">

        <div class="mt-5 pt-4">
            <h5 <?= $anima_scroll; ?> style="color: #3C3C3B;" class="mb-4 fw-normal">Compartilhe o projeto</h5>
            <button <?= $anima_scroll; ?> id="copyLinkButton" class="me-3 icone-link-compartilhar border"><i class="me-2 fas fa-copy"></i> Copy Link</button>
            <a <?= $anima_scroll; ?> href="https://www.instagram.com/" target="_blank" class="me-3 icone-link-compartilhar border"><i class="fab fa-instagram"></i></a>
            <a <?= $anima_scroll; ?> href="https://www.facebook.com/" target="_blank" class=" icone-link-compartilhar border"><i class="fab fa-facebook"></i></a>
        </div>

        <div class="mt-5 pt-4 px-4">
            <h5 <?= $anima_scroll; ?> style="color: #3C3C3B;" class="mb-5 fw-normal">Projetos <strong>relacionados</strong></h5>

            <div <?= $anima_scroll; ?> class="pro-relacionados" style="overflow-x: hidden !important;">
                <div class="swiper-wrapper">

                    <?php foreach ($areaProjeto['projetos'] as $key => $projeto) { ?>
                        <div style="cursor: pointer;" onclick="window.location.href='<?= $base_url; ?>projeto.php?id=<?= $projeto['id']; ?>&area=<?= $areaProjeto['id']; ?>'" class="swiper-slide">
                            <div class="container-thumb-pro">
                                <img class="thumb-pro" src="<?= $base_url; ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $projeto['capa_projeto']; ?>" alt="thumb">
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>

    </div>
</section>



<script src="<?= $base_url; ?>assets/dependencias/swiper/swiper.js"></script>
<script>
    const ProRelacionados = new Swiper('.pro-relacionados', {
        slidesPerView: 1, 
        spaceBetween: 3, 
        autoplay: {
            delay: 4000, 
            disableOnInteraction: false,
        },
        breakpoints: {
            992: {
                slidesPerView: 4, 
            },
        },
        loop: false,
    });


    // Função para copiar o link para a área de transferência
    document.getElementById('copyLinkButton').addEventListener('click', function () {
        const link = '<?= $base_url; ?>' + 'projeto.php?id=<?= $_GET['id'] ?>&area=<?= $_GET['area'] ?>';

        navigator.clipboard.writeText(link).then(() => {
            alert('Link copiado para a área de transferência!'); 
        })
    });
    const swiper = new Swiper('.swiper', {
        slidesPerView: 1, 
        spaceBetween: 3,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>