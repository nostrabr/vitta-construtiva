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


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>Projetos</strong> do seu site!</p>


<!-- areas atuacao -->
<section>
    <button type="button" class="d-none mb-5 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add-area-atuacao"> Adicionar área de atuação + </button> 

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
                        </form>                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="return validarArquivoImagem(document.getElementById('att-area-atuacao-thumb-<?= $area['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-thumb.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $area['capa']; ?>">
                            <div class='w-100'>                              <label for='att-area-atuacao-thumb-<?= $area['id']; ?>' class="small mb-0">Capa (Máx 2mb - 700x1000)*</label>
                              <input type='file' accept=".png, .jpg, .jpeg" id='att-area-atuacao-thumb-<?= $area['id']; ?>' name='att-area-atuacao-thumb' class='form-control att-area-atuacao-thumb' required>
                            </div>
                            <div class="container-img-preview">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $area['capa']; ?>'>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>                        <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="return validarArquivoImagem(document.getElementById('att-area-atuacao-banner-<?= $area['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-banner.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $area['banner']; ?>">
                            <div class='w-100'>                              <label for='att-area-atuacao-banner-<?= $area['id']; ?>' class="small mb-0">Banner (Máx 2mb - 1920x1080)*</label>
                              <input type='file' accept=".png, .jpg, .jpeg" id='att-area-atuacao-banner-<?= $area['id']; ?>' name='att-area-atuacao-banner' class='form-control att-area-atuacao-banner' required>
                            </div>
                            <div class="container-img-preview">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $area['banner']; ?>'>
                            </div>
                            <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                        </form>

                        <form class="mb-5 pb-5 border-bottom d-flex align-items-end justify-content-between" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-area-atuacao-marca-dagua.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $area['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $area['marca_dagua']; ?>">
                            <div class='w-100'>
                              <label for='att-area-atuacao-marca-dagua' class="small mb-0">Marca D'água*</label>
                              <input type='file' accept=".png, .jpg, .jpeg" id='att-area-atuacao-marca-dagua' name='att-area-atuacao-marca-dagua' class='form-control' required>
                            </div>
                            <div class="container-img-preview">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $area['marca_dagua']; ?>'>
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
                                                </form>                                                <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="return validarArquivoImagem(document.getElementById('att-capa-projeto-<?= $projeto['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-capa-projeto.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <input type="hidden" name="nome-img" value="<?= $projeto['capa_projeto']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-capa-projeto-<?= $projeto['id']; ?>' class="small mb-0">Capa projeto (Máx 2mb)*</label>
                                                        <input accept=".png, .jpg, .jpeg" type='file' id='att-capa-projeto-<?= $projeto['id']; ?>' name='att-capa-projeto' class='form-control input-imagem-projeto' required>
                                                    </div>
                                                    <div class="container-img-preview">
                                                        <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $projeto['capa_projeto']; ?>'>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>                                                <form class="mb-3 d-flex align-items-end justify-content-between" onsubmit="return validarArquivoImagem(document.getElementById('att-imagem_info_projeto-<?= $projeto['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-imagem-sobre.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <input type="hidden" name="nome-img" value="<?= $projeto['imagem_info_projeto']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-imagem_info_projeto-<?= $projeto['id']; ?>' class="small mb-0">Imagem sobre (Máx 2mb)*</label>
                                                        <input accept=".png, .jpg, .jpeg" type='file' id='att-imagem_info_projeto-<?= $projeto['id']; ?>' name='att-imagem_info_projeto' class='form-control input-imagem-projeto' required>
                                                    </div>
                                                    <div class="container-img-preview">
                                                        <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $projeto['imagem_info_projeto']; ?>'>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>                                                <form class="mb-5 d-flex align-items-end justify-content-between" onsubmit="return validarArquivoImagem(document.getElementById('att-banner-projeto-<?= $projeto['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/att-banner-projeto.php" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                                                    <input type="hidden" name="nome-img" value="<?= $projeto['banner_projeto']; ?>">
                                                    <div class='w-100'>
                                                        <label for='att-banner-projeto-<?= $projeto['id']; ?>' class="small mb-0">Banner Projeto (Máx 2mb)*</label>
                                                        <input accept=".png, .jpg, .jpeg" type='file' id='att-banner-projeto-<?= $projeto['id']; ?>' name='att-banner-projeto' class='form-control input-imagem-projeto' required>
                                                    </div>
                                                    <div class="container-img-preview">
                                                        <img src='<?= $base_url ?>assets/imagens/arquivos/areas-atuacao/<?= $projeto['banner_projeto']; ?>'>
                                                    </div>
                                                    <button type="submit" class="ms-2 py-2 btn btn-sm btn-success">Atualizar</button>
                                                </form>
                                                
                                                <!-- IMAGENS PROJETO -->                                                <div class='mb-3'>
                                                    <form onsubmit="return validarImagensProjeto(document.getElementById('add-imagens-projeto-<?= $projeto['id']; ?>')) && loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/add-imagens-projeto.php" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $projeto['id']; ?>">
                            
                                                        <label for='add-imagens-projeto-<?= $projeto['id']; ?>' class="small mb-0">Imagem do projeto (Máx 2mb por imagem)</label>
                                                        <div class="d-flex align-items-end">
                                                            <input accept=".png, .jpg, .jpeg" type='file' id='add-imagens-projeto-<?= $projeto['id']; ?>' name='add-imagens-projeto[]' class='form-control input-imagens-multiplas' multiple required>
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
                                                <a href="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/move-topo-projeto.php?id=<?= $projeto['id']; ?>" class="btn btn-secondary mt-4 mb-4">Mover para o topo</a>
                            
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
    }    function deletarImg(id){
        if(confirm('Deseja realmente deletar essa imagem?')){
            window.location.href = '<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/delete-img-projeto.php?id=' + id;
        }
    }
    
    // Função para validar arquivo único de imagem
    function validarArquivoImagem(input) {
        const arquivo = input.files[0];
        
        if (!arquivo) return true; // Se não houver arquivo, não bloqueia o envio
        
        // Verificar o tipo de arquivo
        const tiposPermitidos = ['image/png', 'image/jpeg', 'image/jpg'];
        if (!tiposPermitidos.includes(arquivo.type)) {
            alert('Tipo de arquivo não permitido. Utilize apenas PNG, JPEG ou JPG.');
            input.value = '';
            return false;
        }
        
        // Verificar o tamanho do arquivo (2MB = 2 * 1024 * 1024 bytes)
        const tamanhoMaximo = 2 * 1024 * 1024;
        if (arquivo.size > tamanhoMaximo) {
            alert('O arquivo excede o tamanho máximo de 2MB.');
            input.value = '';
            return false;
        }
        
        return true;
    }
    
    // Função para validar múltiplos arquivos de imagem
    function validarImagensProjeto(input) {
        const arquivos = input.files;
        
        if (!arquivos || arquivos.length === 0) return true;
        
        const tiposPermitidos = ['image/png', 'image/jpeg', 'image/jpg'];
        const tamanhoMaximo = 2 * 1024 * 1024; // 2MB
        
        for (let i = 0; i < arquivos.length; i++) {
            // Verificar o tipo de arquivo
            if (!tiposPermitidos.includes(arquivos[i].type)) {
                alert(`O arquivo "${arquivos[i].name}" não é um tipo permitido. Utilize apenas PNG, JPEG ou JPG.`);
                input.value = '';
                return false;
            }
            
            // Verificar o tamanho do arquivo
            if (arquivos[i].size > tamanhoMaximo) {
                alert(`O arquivo "${arquivos[i].name}" excede o tamanho máximo de 2MB.`);
                input.value = '';
                return false;
            }
        }
        
        return true;
    }      // Adicionar validação aos inputs de imagem
    document.addEventListener('DOMContentLoaded', function() {
        // Encontrar todos os inputs de arquivo com as classes específicas
        const thumbInputs = document.querySelectorAll('.att-area-atuacao-thumb');
        const bannerInputs = document.querySelectorAll('.att-area-atuacao-banner');
        const imagensProjeto = document.querySelectorAll('.input-imagem-projeto');
        const imagensMultiplas = document.querySelectorAll('.input-imagens-multiplas');
        
        // Adicionar listener para os inputs de thumb
        thumbInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                validarArquivoImagem(this);
            });
        });
        
        // Adicionar listener para os inputs de banner
        bannerInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                validarArquivoImagem(this);
            });
        });
        
        // Adicionar listener para os inputs de imagens de projeto (único)
        imagensProjeto.forEach(function(input) {
            input.addEventListener('change', function() {
                validarArquivoImagem(this);
            });
        });
        
        // Adicionar listener para os inputs de imagens múltiplas
        imagensMultiplas.forEach(function(input) {
            input.addEventListener('change', function() {
                validarImagensProjeto(this);
            });
        });
    });
</script>