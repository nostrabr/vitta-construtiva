<div class="modal fade" id="add-engenheiro" tabindex="-1" aria-labelledby="add-engenheiro" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar novo engenheiro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/engenheiros/php/add-engenheiro.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
             
            <div class='mb-3'>
              <label for='nome'>Nome*</label>
              <input type='text' id='nome' name='nome' placeholder='Nome*' class='form-control' required>
            </div>
             
            <div class='mb-3'>
              <label for='cargo'>Cargo*</label>
              <input type='text' id='cargo' name='cargo' placeholder='Cargo*' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='foto'>Foto*</label>
              <input type='file' id='foto' name='foto' placeholder='Foto*' class='form-control' required>
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