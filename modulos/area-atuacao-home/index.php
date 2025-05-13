<style>
    #logo-area-atuacao{
        width: 170px;
        margin-bottom: 75px !important;
    }

    .container-capa-area{
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 380px;
        width: 100%;
        border-radius: 5px !important;
        overflow: hidden;
    }

    .bg-opacity{
        background-color:rgba(0, 0, 0, 0.57);
        transition: all .7s;
    }

    .container-areas{
        width: 95% !important;
    }

    .sub-title-area-home{
        font-size: 19px;
    }

    .marca-dagua-area-home{
        position: absolute;
        bottom: 6%;
        right: 4%;
        width: 70px !important;
    }
    @media(min-width:1500px) {
        .container-areas{
            width: 80% !important;
        }
        .container-capa-area{
            height: 490px;
        }

        .marca-dagua-area-home{
            position: absolute;
            bottom: 6%;
            right: 4%;
            width: 90px !important;
        }
        #logo-area-atuacao{
            width: 200px;
        }

        .sub-title-area-home{
            font-size: 22px;
        }
    }
    
    @media(max-width:992px) {
        .container-areas{
            width: 100% !important;
        }

        .marca-dagua-area-home{
            bottom: 6%;
            right: 0%;
            width: 86px !important;
            left: 50%;
            transform: translateX(-50%);
        }

        .sub-title-area-home{
            font-size: 18px;
        }
    }
</style>



<section class="py-5 px-4 px-lg-0">
    <h1 class="d-none">Áreas de atuação</h1>

    <div class="container-areas mx-auto pt-5 pb-1 pt-lg-5 pb-lg-5">
        <div class="text-center"><img id="logo-area-atuacao" src='<?= $base_url ?>assets/imagens/site/logo-area-atuacao.png'></div>

        <h6 <?= $anima_scroll; ?> class="fw-normal sub-title-area-home text-center mb-4">Conheça nossa <strong>área de atuação</strong></h6>
        
        <div class="row">
            <?php foreach ($areas_atuacao as $key => $area) { ?>
                <div <?= $anima_scroll; ?> class="col-12 mb-5 mb-lg-3 p-0 px-lg-2" style="cursor: pointer;" onclick="window.location.href='<?= $base_url; ?>area-atuacao.php?id=<?= $area['id']; ?>'">
                    <div onmouseleave="addBg('<?= $area['id']; ?>')" onmouseover="removerBg('<?= $area['id']; ?>')" style="background-image: url('<?= $base_url; ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $area['capa']; ?>');" class="container-capa-area">
                        <div id="item-area-home-<?= $area['id']; ?>" class="bg-opacity w-100 position-relative h-100 d-flex align-items-center justify-content-center">
                            <h2 class="text-white"><?= $area['titulo']; ?></h2>
                            <img class="marca-dagua-area-home" src='<?= $base_url ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $area['marca_dagua']; ?>'>
                        </div>
                    </div>
                </div>    
            <?php } ?>
        </div>
    </div>
</section>



<script>
    function removerBg(id){
        document.getElementById(`item-area-home-${id}`).classList.remove("bg-opacity");
    }
    function addBg(id){
        document.getElementById(`item-area-home-${id}`).classList.add("bg-opacity");
    }
</script>