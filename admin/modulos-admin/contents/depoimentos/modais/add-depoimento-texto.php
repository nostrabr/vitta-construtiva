<div class="modal fade" id="add-depoimento-texto" tabindex="-1" aria-labelledby="add-depoimento-texto" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar depoimento texto*</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/add-depoimento-texto.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
          
            <div class='mb-3'>
              <label for='nome'>Nome*</label>
              <input type='text' id='nome' name='nome' placeholder='Nome*' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='empresa'>Empresa (Opcional)</label>
              <input type='text' id='empresa' name='empresa' placeholder='Empresa*' class='form-control'>
            </div>

            <div class='mb-3'>
              <label for='depoimento'>Depoimento*</label>
              <textarea id='depoimento' name='depoimento' rows="3" class='form-control' required></textarea>
            </div>

            <div class='mb-3'>
              <label for='foto'>Foto (Opcional)</label>
              <input type='file' id='foto' name='foto' class='form-control'>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
    </div>
  </div>
</div>