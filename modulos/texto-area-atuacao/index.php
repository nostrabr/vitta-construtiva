<style>
    .font-texto-descri{
        font-size: 16px;
    }

    @media(min-width:1500px) {
        .font-texto-descri{
            font-size: 20px;
        }
    }
</style>



<section class="px-4 px-lg-0 py-5" style="background-color: #75787B;">
    <div class="container mx-auto py-5 text-center">
        <img <?= $anima_scroll; ?> style="width: 3.5em;" src='<?= $base_url ?>assets/imagens/site/icone-area-atuacao.png'>

        <h2 <?= $anima_scroll; ?> class="fw-semibold text-white mt-5"><?= $area_atuacao['titulo']; ?></h2>

        <p <?= $anima_scroll; ?> class="text-white mt-5 font-texto-descri"><?= $area_atuacao['descricao']; ?></p>
    </div>
</section>