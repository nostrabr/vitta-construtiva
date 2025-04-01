<style>
    #logo-content-sobre{
        width: 170px;
    }
    @media(min-width:1500px) {
        #logo-content-sobre{
            width: 210px;
        }
    }
    
    @media(max-width:992px) {
        #logo-content-sobre{
            width: 180px;
        }
    }
</style>



<section style="border-bottom: 2px solid #BD937A;" class="py-5 px-4 px-lg-0">
    <h1 class="d-none">Sobre nós</h1>


    <div class="text-center container mx-auto py-5">
        <img <?= $anima_scroll; ?> id="logo-content-sobre" src='<?= $base_url ?>assets/imagens/site/logo-area-atuacao.png'>

        <h2 <?= $anima_scroll; ?> style="color: #BD937A;" class="mb-4 fst-italic fw-normal font-im-fell mt-5">Transformando sonhos em realidade</h2>

        <p <?= $anima_scroll; ?> style="color: #3C3C3B;"><?= $textos_imagens['texto_sobre_pag']; ?></p>
    </div>
</section>



<script>

</script>