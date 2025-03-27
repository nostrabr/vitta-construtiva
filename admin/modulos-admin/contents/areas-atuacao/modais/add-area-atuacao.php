<div class="modal fade" id="add-area-atuacao" tabindex="-1" aria-labelledby="add-area-atuacao" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Adicionar nova área de atuação</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/areas-atuacao/php/add-area-atuacao.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
             
            <div class='mb-3'>
              <label for='area-atuacao-titulo' class="small mb-0">Área de atuação*</label>
              <input type='text' id='area-atuacao-titulo' name='area-atuacao-titulo' placeholder='Ex: Arquitetura...' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='area-atuacao-descricao' class="small mb-0">Descrição*</label>
              <textarea name="area-atuacao-descricao" class='form-control' id="area-atuacao-descricao" rows="3" required></textarea>
            </div>

            <div class='mb-3'>
              <label for='area-atuacao-titulo-projetos' class="small mb-0">Título projetos*</label>
              <input type='text' id='area-atuacao-titulo-projetos' name='area-atuacao-titulo-projetos' placeholder='Ex: Projetos Vittá Inspira...' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='area-atuacao-thumb' class="small mb-0">Capa da área de atuação (Máx 2mb 900x500)*</label>
              <input type='file' accept=".png, .jpg, .jpeg" id='area-atuacao-thumb' name='area-atuacao-thumb' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='area-atuacao-banner' class="small mb-0">Banner (Máx 2mb 1920x1080)*</label>
              <input type='file' accept=".png, .jpg, .jpeg" id='area-atuacao-banner' name='area-atuacao-banner' class='form-control' required>
            </div>

            <div class='mb-3'>
              <label for='area-atuacao-marca-dagua' class="small mb-0">Marca D'água (Máx 1mb - PNG)*</label>
              <input type='file' accept=".png, .jpg, .jpeg" id='area-atuacao-marca-dagua' name='area-atuacao-marca-dagua' class='form-control' required>
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




<script>
  document.getElementById('area-atuacao-thumb').addEventListener('change', function (event) {
      const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
      const file = event.target.files[0];
  
      if (file && !allowedTypes.includes(file.type)) {
          alert('Formato de arquivo não permitido. Apenas PNG, JPG e JPEG são aceitos.');
          event.target.value = ''; // Limpa o input
      }
  });

  document.getElementById('area-atuacao-banner').addEventListener('change', function (event) {
      const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
      const file = event.target.files[0];
  
      if (file && !allowedTypes.includes(file.type)) {
          alert('Formato de arquivo não permitido. Apenas PNG, JPG e JPEG são aceitos.');
          event.target.value = ''; // Limpa o input
      }
  });

  document.getElementById('area-atuacao-carca-dagua').addEventListener('change', function (event) {
      const allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
      const file = event.target.files[0];
  
      if (file && !allowedTypes.includes(file.type)) {
          alert('Formato de arquivo não permitido. Apenas PNG, JPG e JPEG são aceitos.');
          event.target.value = ''; // Limpa o input
      }
  });
</script>