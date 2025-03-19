<div class="modal fade" id="add-projetos" tabindex="-1" aria-labelledby="add-projetos" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar novo projeto a área de atuação</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/add-projeto.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <input type="hidden" name="area_id" id="area-id">
             
            <div class='mb-3'>
              <label for='identificador-projeto' class="small mb-0">Identificador do projeto*</label>
              <input type='text' id='identificador-projeto' name='identificador-projeto' placeholder="Ex: Projeto 1..." class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='capa-projeto' class="small mb-0">Capa do projeto (Máx 2mb 1000x700)*</label>
              <input type='file' id='capa-projeto' name='capa-projeto' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='imagem-info' class="small mb-0">Imagem sobre (Máx 2mb 800x600)*</label>
              <input type='file' id='imagem-info' name='imagem-info' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='descricao-projeto' class="small mb-0">Descrição sobre*</label>
              <textarea name="descricao-projeto" class='form-control' id="descricao-projeto" rows="3" required></textarea>
            </div>

            <div class='mb-3'>
              <label for='images-projeto' class="small mb-0">Imagem do projeto (Opcional)</label>
              <input type='file' id='imagens-projeto' name='imagens-projeto[]' class='form-control' multiple>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </div>
      </form>
    </div>
  </div>
</div>