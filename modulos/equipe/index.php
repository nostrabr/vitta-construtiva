<style>
    .container-imagem-membro{
        width: 100%;
        height: 350px;
    }
    .container-imagem-membro img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    @media(min-width:1500px) {
        .container-imagem-membro{
            height: 400px;
        }
    }
    
    @media(max-width:992px) {
        .container-imagem-membro{
            height: auto;
        }
    }
</style>



<section style="border-bottom: 2px solid #BD937A;" class="py-5 px-4 px-lg-0">
    <h1 class="d-none">Nossa equipe</h1>


    <div style="color: #3C3C3B;" class="container mx-auto py-5">
        <h5 class="mb-5 pb-3 text-center">Conheça nossa equipe altamente qualificada</h5>

        <?php foreach ($equipe as $key => $eq) { ?>
            <div class="row mb-5 pb-4">
                <div <?= $anima_scroll; ?> class="col12 col-lg-3 mb-4 mb-lg-0">
                    <div class="container-imagem-membro">
                        <img src='<?= $base_url ?>admin/assets/imagens/arquivos/equipe/<?= $eq['foto']; ?>'>
                    </div>
                </div>

                <div <?= $anima_scroll; ?> class="col-12 col-lg-9 ps-0 pe-0 ps-lg-5">
                    <h4 style="color: #BD937A;" class="mb-2"><?= $eq['nome']; ?></h4>
                    <h6 class="small fw-semibold mb-4"><?= $eq['cargo']; ?></h6>

                    <p><?= $eq['texto']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>



<script>

</script>