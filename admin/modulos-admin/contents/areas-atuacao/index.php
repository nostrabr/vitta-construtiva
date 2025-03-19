<style>
    .container-img-preview{
        width: 80px !important;
        height: 60px !important;
        margin-left: 10px !important;
        margin-right: 10px !important;
    }
    .container-img-preview img{
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        object-position: center !important;
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar as <strong>áreas de atuação</strong> do seu site!</p>


<!-- areas atuacao -->
<section>
    <button type="button" class="mb-5 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add-area-atuacao"> Adicionar área de atuação + </button> 

    <?php foreach ($areas_atuacao as $key => $area) { ?>
        <div class="mb-4 item-acordion accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#area-<?= $area['id']; ?>" aria-expanded="false" aria-controls="area-<?= $area['id']; ?>">
                        <?= $area['titulo']; ?>
                    </button>
                </h2>
                <div id="area-<?= $area['id']; ?>" class="py-3 accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
        
                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-titulo.php" method="post">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-titulo' class="small mb-0">Área atuação*</label>
                              <input type='text' id='att-area-atuacao-titulo' name='att-area-atuacao-titulo' value="<?= $area['titulo']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>

                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-descricao.php" method="post">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-descricao' class="small mb-0">Descrição*</label>
                              <textarea rows="3" id='att-area-atuacao-descricao' name='att-area-atuacao-descricao' class='form-control' required><?= $area['descricao']; ?></textarea>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>

                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-titulo-projetos.php" method="post">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-titulo-projetos' class="small mb-0">Título projetos*</label>
                              <input type='text' id='att-area-atuacao-titulo-projetos' name='att-area-atuacao-titulo-projetos' value="<?= $area['titulo_projetos']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>

                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-thumb.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $area['capa']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-thumb' class="small mb-0">Thumb*</label>
                              <input type='file' id='att-area-atuacao-thumb' name='att-area-atuacao-thumb' class='form-control' required>
                            </div>
                            <div class="container-img-preview">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $area['capa']; ?>'>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>

                        <form class="mb-5 pb-5 border-bottom d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-banner.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $area['banner']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-banner' class="small mb-0">Banner*</label>
                              <input type='file' id='att-area-atuacao-banner' name='att-area-atuacao-banner' class='form-control' required>
                            </div>
                            <div class="container-img-preview">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $area['banner']; ?>'>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>


                        <!------------------- PROJETOS -------------------->
                        <div class="pb-3 mb-3 border-bottom">
                            <h6 class="mb-3">Projetos:</h6>
                            <button onclick="abrirModalAddProjeto('<?= $area['id']; ?>')" type="button" class="mb-4 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add-projetos"> Adicionar projeto + </button>
                            
                            <?php foreach ($area['projetos'] as $key => $projeto) { ?>
                                <div class="mb-4 item-acordion accordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#projeto-<?= $projeto['id']; ?>" aria-expanded="false" aria-controls="projeto-<?= $projeto['id']; ?>">
                                                <?= $projeto['identificador']; ?>
                                            </button>
                                        </h2>
                                        <div id="projeto-<?= $projeto['id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                            
                                                <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-identificador.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-identificador' class="small mb-0">Identificador*</label>
                                                        <input type='text' id='att-identificador' name='att-identificador' value="<?= $projeto['identificador']; ?>" class='form-control' required>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>
                                                <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-descricao-projeto.php" method="post">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-descricao-projeto' class="small mb-0">Descrição*</label>
                                                        <textarea rows="3" id='att-descricao-projeto' name='att-descricao-projeto' class='form-control' required><?= $projeto['descricao']; ?></textarea>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>
                                                <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-capa-projeto.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <input type="hidden" name="nome-img" value="<?= $projeto['capa_projeto']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-capa-projeto' class="small mb-0">Capa projeto*</label>
                                                        <input type='file' id='att-capa-projeto' name='att-capa-projeto' class='form-control' required>
                                                    </div>
                                                    <div class="container-img-preview">
                                                        <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $projeto['capa_projeto']; ?>'>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>
                                                <form class="mb-5 d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-imagem-sobre.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <input type="hidden" name="nome-img" value="<?= $projeto['imagem_info_projeto']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-imagem_info_projeto' class="small mb-0">Imagem sobre*</label>
                                                        <input type='file' id='att-imagem_info_projeto' name='att-imagem_info_projeto' class='form-control' required>
                                                    </div>
                                                    <div class="container-img-preview">
                                                        <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $projeto['imagem_info_projeto']; ?>'>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>
                                                
                                                <!-- IMAGENS PROJETO -->
                                                <div class='mb-3'>
                                                    <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/add-imagens-projeto.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                            
                                                        <label for='add-images-projeto' class="small mb-0">Imagem do projeto (Opcional)</label>
                                                        <div class="d-flex align-items-end">
                                                            <input type='file' id='add-imagens-projeto' name='add-imagens-projeto[]' class='form-control' multiple required>
                                                            <button type="submit" class="btn btn-sm ms-2 py-2 btn-success">Adicionar</button>
                                                        </div>
                                                        <span class="form-text mb-3">Clique na imagem para deletar</span>
                                                        <div class="d-flex flex-wrap">
                                                            <?php foreach ($projeto['imagensProjeto'] as $key => $imagem) { ?>
                                                                <div class="container-img-preview mb-3">
                                                                    <img style="cursor: pointer;" onclick="deletarImg('<?= $imagem['id']; ?>')" src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $imagem['imagem']; ?>'>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- IMAGENS PROJETO -->

                                                <a href="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/delete-projeto.php?id=<?= $projeto['id']; ?>" class="btn btn-danger mt-4 mb-4">Deletar projeto</a>
                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!------------------- PROJETOS -------------------->
        
                        <a href="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/delete-area-atuacao.php?id=<?= $area['id']; ?>" class="btn btn-danger btn-sm mt-4 mb-4">Deletar área de atuação</a>
                    
                    </div>

                </div>
            </div>
        </div>
    <?php } ?>
</section>
<!-- areas atuacao -->



<script>
    function abrirModalAddProjeto(id){
        document.getElementById('area-id').value = id;
    }


    function deletarImg(id){
        if(confirm('Deseja realmente deletar essa imagem?')){
            window.location.href = '<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/delete-img-projeto.php?id=' + id;
        }
    }
</script>