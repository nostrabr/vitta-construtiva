<style>
    #btn-arqui{
        border-radius: 7px;
        padding: 15px 40px !important;
        border: 1px solid #D5DAE1 !important;
        color: #BD937A !important;
    }
    #btn-arqui:hover{
        border: 1px solid #BD937A !important;
        color: #D5DAE1 !important;
        background-color: #BD937A !important;
        transition: .4s;
    }

    .container-projetos-areas{
        width: 95% !important;
    }

    .container-capa-projeto{
        width: 100%;
        height: 500px;
        overflow: hidden;
    }
    .container-capa-projeto img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .confira-title{
        font-size: 17px;
    }

    .relacionados {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        display: flex;
        justify-content: center;
        align-items: center;
        width: auto; 
    }

    .container-thumb{
        width: 100% !important;
        height: 380px !important;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0px 5px !important;
    }
    .marcadagua-relacionados {
       position: absolute;
       bottom: 7%;
       right: 5%;
       width: 60px;
    }


    @media(min-width: 1500px){
        .confira-title{
            font-size: 20px;
        }

        .container-capa-projeto{
            width: 100%;
            height: 640px;
            overflow: hidden;
        }

        .container-projetos-areas{
            width: 80% !important;
        }
    }

    @media(max-width: 992px){
        .container-projetos-areas{
            width: 100% !important;
        }

        .container-capa-projeto{
            height: 400px;
        }

        .container-thumb{
            height: 300px !important;
        }
    }
</style>


<section class="py-5 px-4 px-lg-0">
    <h1 class="d-none">Nossos projetos</h1>


    <div class="container-projetos-areas py-5 mx-auto text-center">
        <?php if($area_atuacao['titulo'] == 'Arquitetura'){ ?>
            <h5 <?= $anima_scroll; ?> class="mb-3 fw-normal text-center" style="color: #3C3C3B;">Nos acompanhe</h5>
            <a <?= $anima_scroll; ?> id="btn-arqui" class="d-inline-block mb-5 pb-5" href="https://www.instagram.com/shammaarquitetura/" target="_blank"><i class="fab fa-instagram me-2"></i> shammaarquitetura</a>
        <?php } ?>

        <h3 <?= $anima_scroll; ?> style="color: #3C3C3B;">Obras Vittá Construtora</h3>
        <p <?= $anima_scroll; ?> class="confira-title" style="color: #97999B;">Clique para conhecer algumas de nossas obras</p>

        <!-- PROJETOS -->
        <div class="w-100 row mt-5">
            <?php foreach ($area_atuacao['projetos'] as $key => $projeto) { ?>
                <div <?= $anima_scroll; ?> class="col-12 col-lg-4 p-1">
                    <a href="<?= $base_url; ?>projeto.php?id=<?= $projeto['id'] ?>&area=<?= $area_atuacao['id'] ?>">
                        <div class="container-capa-projeto">
                            <img src='<?= $base_url ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $projeto['capa_projeto'] ?>' alt='<?= $projeto['titulo'] ?>'>
                        </div>
                    </a>
                </div>  
            <?php } ?>
        </div>
        <!-- PROJETOS -->
    </div>
</section>




<script src="<?= $base_url; ?>assets/dependencias/swiper/swiper.js"></script>
