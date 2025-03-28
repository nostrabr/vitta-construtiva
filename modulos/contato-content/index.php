<style>
    #pag-contato{
        height: 100vh;
    }

    #banner-contato{
        height: 100%;
        width: 35%;
    }
    #banner-contato img{
        height: 100%;
        width: 100%;
        object-position: center;
        object-fit: cover;
    }

    #contatos{
        background-color: #BD937A;
        height: 100%;
        width: 65%;
    }

    .input-form{
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #110F0A;
        padding: 10px 5px !important;
    }
    .input-form::placeholder{
        color: #110F0A;
        font-size: 14px !important;
    }
    .input-form:focus {
        outline: none !important; 
        box-shadow: none !important;
    }

    .btn-enviar{
        padding: 8px 50px !important;
        color: #D9D9D6;
        border: none;
        background-color: #3C3C3B;
        border-radius: 10px;
        transition: .4s;
    }
    .btn-enviar:hover{
        color: #3C3C3B;
        background-color: #D9D9D6;
        transition: .4s;
    }

    #form-contato{
        width: 75%;
    }

    @media(min-width:1500px) {
        #pag-contato{
            height: 70vh;
        }
        #form-contato{
            width: 60%;
        }
    }
    
    @media(max-width:992px) {
        #pag-contato{
            height: auto;
        }
        #banner-contato{
            height: 350px;
            width: 100%;
        }
        #contatos{
            background-color: #BD937A;
            height: auto;
            width: 100%;
            padding: 40px 30px !important;
        }
        #form-contato{
            width: 100%;
        }

        .btn-enviar{
            padding: 11px 70px !important;
        }
    }
</style>



<section id="pag-contato" class="d-flex flex-column flex-lg-row">
    <div id="banner-contato">
        <img class="d-none d-lg-block" src='<?= $base_url ?>admin/assets/imagens/arquivos/banners/<?= $banners['banner_contato_desktop']; ?>'>
        <img class="d-block d-lg-none" src='<?= $base_url ?>admin/assets/imagens/arquivos/banners/<?= $banners['banner_contato_mobile']; ?>'>
    </div>

    <div id="contatos" class="ps-0 ps-lg-5 pt-5">
        <h1 style="color: #110F0A;" class="font-im-fell mb-5">Fale Conosco</h1>

        <div style="color: #110F0A;" class="d-flex flex-column mb-5">
            <h6 class="fw-semibold mb-4">Comercial p/ clientes</h6>

            <a href="mailto:<?= $contatos['email_clientes']; ?>" style="color: #110F0A;" class="mb-2"><?= $contatos['email_clientes']; ?></a>
            <a href="https://wa.me/<?= preg_replace("/[^0-9]/", "", $contatos['telefone_clientes']); ?>" style="color: #110F0A;"><?= $contatos['telefone_clientes']; ?></a>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 pe-0 pe-lg-4">
                <div style="color: #110F0A;" class="d-flex flex-column mb-5">
                    <h6 class="fw-semibold mb-4">Fornecedores</h6>

                    <a href="mailto:<?= $contatos['email_fornecedor']; ?>" style="color: #110F0A;" class="mb-2"><?= $contatos['email_fornecedor']; ?></a>
                    <a href="https://wa.me/<?= preg_replace("/[^0-9]/", "", $contatos['telefone_fornecedor']); ?>" style="color: #110F0A;"><?= $contatos['telefone_fornecedor']; ?></a>
                </div>

                <div style="color: #110F0A;" class="d-flex flex-column align-items-start mb-5">
                    <h6 class="fw-semibold mb-4">Onde estamos</h6>

                    <p style="color: #110F0A;" class="mb-3"><?= $endereco['endereco']; ?> - Bairro <?= $endereco['bairro']; ?>, <?= $endereco['cidade']; ?> - <?= $endereco['estado']; ?>, <?= $endereco['cep']; ?></p>

                    <a href="<?= $endereco['link_maps']; ?>" class="button-2 d-inline"><i class="me-2 fas fa-map-marker-alt"></i> Ver no mapa</a>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <h4 style="color: #110F0A;" class="mb-4">Possui alguma dúvida?</h4>

                <form onsubmit="loading()" action="<?= $base_url; ?>helpers/enviar-email.php" class="d-flex flex-column align-items-start" id="form-contato" method="post"> 
                    <input type="text" placeholder="Seu nome completo*" name="nome" class="input-form mb-3 w-100" required>
                    <input type="email" placeholder="Seu e-mail*" name="email" class="input-form mb-3 w-100" required>
                    <input type="text" placeholder="Escreva sua dúvida aqui*" name="duvida" class="input-form mb-3 w-100" required>

                    <button type="submit" class="btn-enviar mt-4">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
    // ativa o loading
    function loading(){
        document.getElementById("loading").classList.remove("d-none")
        document.getElementById("loading").classList.add("d-flex")
    }
</script>