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
        color: #BD937A !important;
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

    @media(min-width:1500px) {
        .container-sobre-projeto{
            width: 80% !important;
        }

        .font-text-info{
            font-size: 20px !important;
        }

        .container-img-projeto-sobre{
            height: 380px;
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
            height: 300px;
        }
    }
</style>


<section class="py-5">
    <div class="container-sobre-projeto mx-auto py-5 text-center">
        <img style="width: 4em;" src='<?= $base_url ?>assets/imagens/site/icone-logo-projeto.png'>

        <div style="background-color: #BD937A;" class="w-100 px-lg-5">
            <div class="mt-5 rounded px-4 px-lg-5 py-5 row mx-0 mx-lg-5">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <div class="container-img-projeto-sobre">
                        <img src='<?= $base_url ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $projeto['imagem_info_projeto'] ?>'>
                    </div>
                </div>
                <div class="font-text-info col-12 col-lg-8 text-start ps-0 pe-0 ps-lg-5" style="color: #3C3C3B;">
                    <?= $projeto['descricao']; ?>
                </div>
            </div>
        </div>

        <div class="mt-5 pt-4">
            <h5 style="color: #3C3C3B;" class="mb-4 fw-normal">Compartilhe o projeto</h5>
            <button id="copyLinkButton" class="me-3 icone-link-compartilhar border"><i class="me-2 fas fa-copy"></i> Copy Link</button>
            <a href="https://www.instagram.com/" target="_blank" class="me-3 icone-link-compartilhar border"><i class="fab fa-instagram"></i></a>
            <a href="https://www.facebook.com/" target="_blank" class=" icone-link-compartilhar border"><i class="fab fa-facebook"></i></a>
        </div>

        <div class="mt-5 pt-4 px-4">
            <h5 style="color: #3C3C3B;" class="mb-5 fw-normal">Projetos <strong>relacionados</strong></h5>

            <div class="pro-relacionados">
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
</script>