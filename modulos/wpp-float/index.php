<style>
    #btn-float{
        position: fixed;
        bottom: 4%;
        right: 2%;
        width: 70px;
        height: 70px;
        z-index: 9 !important;
    }
    #btn-float img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    @media(max-width:992px){
        #btn-float{
            width: 50px;
            bottom: 3%;
            height: 50px;
        }
    }
</style>


<div id="btn-float">
    <a href="https://wa.me/<?= preg_replace("/[^0-9]/", "", $contatos['telefone_clientes']) ?>?text=<?= rawurlencode("Olá, vi a Vitta no Google e estou planejando uma construção. Gostaria de entender prazos e orçamento.") ?>" target="_blank">
        <img src='<?= $base_url ?>assets/imagens/site/wpp-float.png' alt='Fale com a Vittà Construtora no WhatsApp'>
    </a>
</div>