<style>
    #banner-site{
        height: 60vh !important;
    }
    #banner-site img{
        height: 100% !important;
        width: 100% !important;
        object-fit: cover;
        object-position: center;
    }

    @media(min-width:1500px) {
        #banner-site{
            height: 40vh !important;
        }
    }
    
    @media(max-width:992px) {
        #banner-site{
            height: 50vh !important;
        }
    }
</style>

<section id="banner-site">
    <img class="w-100" src='<?= $base_url ?>admin/assets/imagens/arquivos/areas-atuacao/<?= $projeto['banner_projeto']; ?>'>
</section>
