<div class="modal fade" id="add-parceiro" tabindex="-1" aria-labelledby="add-parceiro" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar novo parceiro +</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/parceiros/php/add-parceiro.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
             
            <div class='mb-3'>
              <label for='nome' class="mb-0 small">Nome*</label>
              <input type='text' id='nome' name='nome' placeholder='Nome*' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='logo' class="mb-0 small">Logo*</label>
              <input type='file' accept=".png, .jpg, .jpeg" id='logo' name='logo' placeholder='Logo*' class='form-control' required>
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


<script>
  document.getElementById('logo').addEventListener('change', function (event) {
      const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
      const file = event.target.files[0];
  
      if (file && !allowedTypes.includes(file.type)) {
          alert('Formato de arquivo não permitido. Apenas PNG, JPG e JPEG são aceitos.');
          event.target.value = ''; // Limpa o input
      }
  });
</script>