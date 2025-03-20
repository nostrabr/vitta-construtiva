<div class="modal fade" id="add-depoimento-video" tabindex="-1" aria-labelledby="add-depoimento-video" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar vídeo depoimento*</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/depoimentos/php/add-depoimento-video.php" method="post">
          <div class="modal-body">
          
            <div class='mb-3'>
              <label for='video'>Vídeo*</label>
              <input type='text' id='video' name='video' placeholder='video*' class='form-control' required>
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