<style>
    .container-depoimento{
        width: 100%;
        height: 430px;
    }

    .foto-perfil{
        width: 40px;
        height: 40px;
        border-radius: 40px;
        overflow: hidden;
    }
    .foto-perfil img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    @media(min-width:1500px) {
        .container-depoimento{
            width: 100%;
            height: 500px;
        }
    }
    
    @media(max-width:992px) {
        .container-depoimento{
            width: 100%;
            height: 450px;
        }
    }
</style>




<section class="py-5 px-4 px-lg-0">
    <div class="container mx-auto py-5">
        <h5 style="color: #3C3C3B;" class="fw-semibold mb-2 text-center">Depoimentos</h5>
        <p style="color: #97999B;" class="text-center mb-5">Confira o que nossos clientes têm a dizer sobre a experiência contrutiva dos projetos que ajudaram a transformar seus sonhos.</p>

        <div class="row">

        <?php foreach ($depoimentos as $key => $depo) { ?>
            <?php if($depo['tipo'] == 'texto'){ ?>
                <div class="col-12 col-lg-4 mb-3 px-2" style="background-color: #BD937A;">
                    <div class="container-depoimento px-4 d-flex flex-column justify-content-center">
                        <div class="mt-4 d-flex justify-content-start align-items-center">
                            <div class="foto-perfil me-3"><img src='<?= $base_url ?>admin/assets/imagens/arquivos/depoimentos/<?= $depo['foto']; ?>'></div>
                            <div>
                                <h6 class="fw-semibold mb-0" style="color: #110F0A;"><?= $depo['nome']; ?></h6>
                                <p style="color: #110F0A;" class="small"><?= $depo['empresa']; ?></p>
                            </div>
                        </div>
                        <p class="mb-4 fst-italic fw-normal mt-4 font-antic-didone" style="color: #110F0A;"><?= $depo['texto']; ?></p>
                        <img style="width: 3em;" src='<?= $base_url ?>assets/imagens/site/aspas.png'>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-12 col-lg-4 mb-3 px-2">
                    <div class="container-depoimento">
                    <iframe 
                        style="width: 100%; height: 100%;" 
                        src="<?= $depo['video']; ?>?controls=0&modestbranding=1&rel=0&showinfo=0&fs=0&iv_load_policy=3&cc_load_policy=0&disablekb=1" 
                        title="YouTube Depoimento" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media" 
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>

                    </div>
                </div>
            <?php } ?>
        <?php } ?>
            
        </div>
    </div>
</section>
