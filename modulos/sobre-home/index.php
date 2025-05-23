<style>
    .container-img-sobre-home{
        width: 100%;
        height: 390px;
        overflow: hidden;
        border-radius: 7px;
    }
    .container-img-sobre-home img{
        width: 100%;
        height: 100%;
        object-position: center;
        object-fit: cover;
    }

    #logo-sobre-home{
        width: 200px;
    }

    @media(min-width:1500px) {
        .container-img-sobre-home{
            width: 100%;
            height: 420px;
            overflow: hidden;
            border-radius: 7px;
        }
    }
    
    @media(max-width:992px) {
        .container-img-sobre-home{
            width: 100%;
            height: auto;
            overflow: hidden;
            border-radius: 7px;
        }

        #logo-sobre-home{
            width: 170px;
        }
    }
</style>



<section class="py-5 px-4 px-lg-0">
    <h1 class="d-none">Sobre a empresa</h1>

    <div class="container mx-auto py-5">
        <div class="row">

            <div <?= $anima_scroll; ?> class="mb-5 mb-lg-0 col-12 col-lg-7 pe-0 ps-0 pe-lg-5">
                <div class="container-img-sobre-home">
                    <img src='<?= $base_url ?>admin/assets/imagens/arquivos/textos-imagens/<?= $textos_imagens['gif_sobre_home']; ?>'>
                </div>
            </div>

            <div <?= $anima_scroll; ?> class="col-12 col-lg-5">
                <img class="mb-5" id="logo-sobre-home" src='<?= $base_url ?>assets/imagens/site/logo-sobre-home.png'>
                <h3 class="mb-3" style="color: #110F0A;"><?= $textos_imagens['titulo_texto_sobre_home']; ?></h3>
                <p class="mb-4 fs-5" style="color:#110F0A;"><?= $textos_imagens['texto_sobre_home']; ?></p>
                <a class="button-1 fs-5" href="<?= $base_url; ?>sobre-nos.php">Conheça</a>
            </div>

        </div>
    </div>
</section>



<script>

</script>