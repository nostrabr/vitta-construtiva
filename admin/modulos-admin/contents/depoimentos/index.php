<style>
    .container-preview-img{
        height: 60px;
        width: 80px;
        overflow: hidden;
    }
    .container-preview-img img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .container-video{
        width: 160px;
        height: 230px;
        overflow: hidden;
    }
    .container-video .iframe{
        width: 100%;
        height: 100%;
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>Depoimentos</strong> do seu site!</p>


<!-- depoimentos -->
<section>

    <!-- DEPOIMENTO TEXTO -->
    <button type="button" class="btn btn-success btn-sm mb-5" data-bs-toggle="modal" data-bs-target="#add-depoimento-texto"> Adicionar texto depoimento + </button> 

    <?php foreach ($depoimentos as $key => $depoimento) { ?>
        <?php if($depoimento['tipo'] == 'texto'){ ?>

            <div class="mb-4 item-acordion accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#depoimento-<?= $depoimento['id']; ?>" aria-expanded="false" aria-controls="depoimento-<?= $depoimento['id']; ?>">
                            <?= $depoimento['nome']; ?>
                        </button>
                    </h2>
                    <div id="depoimento-<?= $depoimento['id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body py-4">
            
                            <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/att-nome-depoimento.php" class="mb-3 d-flex align-items-end" method="post">
                                <input type="hidden" name="id" value="<?= $depoimento['id']; ?>">

                                <div class='w-100'>
                                  <label for='att-nome' class="mb-0 small">Nome*</label>
                                  <input type='text' id='att-nome' name='att-nome' value="<?= $depoimento['nome']; ?>" class='form-control' required>
                                </div>
                                <button type="submit" class="py-2 btn btn-sm btn-success ms-2">Atualizar</button>
                            </form>

                            <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/att-empresa-depoimento.php" class="mb-3 d-flex align-items-end" method="post">
                                <input type="hidden" name="id" value="<?= $depoimento['id']; ?>">

                                <div class='w-100'>
                                  <label for='att-empresa' class="mb-0 small">Empresa*</label>
                                  <input type='text' id='att-empresa' name='att-empresa' value="<?= $depoimento['empresa']; ?>" class='form-control' required>
                                </div>
                                <button type="submit" class="py-2 btn btn-sm btn-success ms-2">Atualizar</button>
                            </form>

                            <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/att-texto-depoimento.php" class="mb-3 d-flex align-items-end" method="post">
                                <input type="hidden" name="id" value="<?= $depoimento['id']; ?>">

                                <div class='w-100'>
                                  <label for='att-depoimento' class="mb-0 small">Depoimento*</label>
                                  <textarea rows="3" id='att-depoimento' name='att-depoimento' class='form-control' required><?= $depoimento['texto']; ?></textarea>
                                </div>
                                <button type="submit" class="py-2 btn btn-sm btn-success ms-2">Atualizar</button>
                            </form>

                            <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/att-foto-depoimento.php" class="mb-3 d-flex align-items-end" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $depoimento['id']; ?>">
                                <input type="hidden" name="nome-foto" value="<?= $depoimento['foto']; ?>">

                                <div class='w-100'>
                                  <label for='att-foto' class="mb-0 small">Foto*</label>
                                  <input type='file' id='att-foto' name='att-foto' class='form-control' required>
                                </div>
                                <div class="container-preview-img ms-3">
                                    <img src='<?= $base_url ?>assets/imagens/arquivos/depoimentos/<?= $depoimento['foto']; ?>'>
                                </div>
                                <button type="submit" class="py-2 btn btn-sm btn-success ms-2">Atualizar</button>
                            </form>


                            <a href="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/deletar-depoimento.php?id=<?= $depoimento['id']; ?>&img=<?= $depoimento['foto']; ?>" class="btn btn-sm btn-danger mt-4">Deletar depoimento</a>
            
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    <?php } ?>

    <?php
        $recebeDepoimentosTexto = [];
        foreach ($depoimentos as $key => $depoimento) {
            if($depoimento['tipo'] == 'texto'){
                $recebeDepoimentosTexto[] = $depoimento;
            }
        }

        if(count($recebeDepoimentosTexto) == 0){
            echo "<p class='text-muted'>Nenhum depoimento de TEXTO cadastrado!</p>";
        }
    ?>
    <!-- DEPOIMENTO TEXTO -->

    
    <div class="w-100 border my-5"></div>
    
    
    <!-- DEPOIMENTO VÍDEO -->
    <button type="button" class="btn btn-success btn-sm mb-5 mt-2" data-bs-toggle="modal" data-bs-target="#add-depoimento-video"> Adicionar vídeo depoimento + </button>
    
    <?php foreach ($depoimentos as $key => $depoimento) { ?>
        <?php if($depoimento['tipo'] == 'video'){ ?>

            <div class="mb-4 item-acordion accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#depoimento-<?= $depoimento['id']; ?>" aria-expanded="false" aria-controls="depoimento-<?= $depoimento['id']; ?>">
                            Vídeo - <?= $key; ?>
                        </button>
                    </h2>
                    <div id="depoimento-<?= $depoimento['id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body py-4">
            
                            <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/att-video-depoimento.php" class="mb-3" method="post">
                                <div class="d-flex align-items-end">
                                    <input type="hidden" name="id" value="<?= $depoimento['id']; ?>">
                                    <div class='w-100'>
                                      <label for='att-video' class="mb-0 small">Vídeo*</label>
                                      <input type='text' id='att-video' name='att-video' class='w-75 form-control' placeholder="Url para atualizar..." required>
                                    </div>
                                </div>

                                <div class="container-video mt-3 mb-4">
                                    <iframe class="iframe" src="<?= $depoimento['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>

                                <button type="submit" class="btn btn-sm btn-success">Atualizar</button>
                                <a href="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/deletar-depoimento.php?id=<?= $depoimento['id']; ?>&img=null" class="btn btn-sm btn-danger ms-2">Deletar Vídeo</a>
                            </form>
            
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    <?php } ?>

    <?php
        $recebeDepoimentosVideo = [];
        foreach ($depoimentos as $key => $depoimento) {
            if($depoimento['tipo'] == 'video'){
                $recebeDepoimentosVideo[] = $depoimento;
            }
        }

        if(count($recebeDepoimentosVideo) == 0){
            echo "<p class='text-muted'>Nenhum depoimento de VÍDEO cadastrado!</p>";
        }
    ?>
    <!-- DEPOIMENTO VÍDEO -->

</section>
<!-- depoimentos -->



<script>

</script>