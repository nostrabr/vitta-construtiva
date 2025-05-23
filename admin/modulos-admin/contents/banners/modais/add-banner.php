<div class="modal fade" id="modalBanner" tabindex="-1" aria-labelledby="modalBanner" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="pagina-banner"> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form onsubmit="return validarFormulario()" action="modulos-admin/contents/banners/php/atualizar-banner.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <!-- ref inserido pelo js -->
            <input type="hidden" name="refBannerDesktop" id="refBannerDesktop">
            <input type="hidden" name="refBannerMobile" id="refBannerMobile">
            <input type="hidden" name="nomeBannerDesktop" id="nomeBannerDesktop">
            <input type="hidden" name="nomeBannerMobile" id="nomeBannerMobile">
            <!-- ref inserido pelo js -->

            <div class="mb-4">
                <label for="desktop-banner">Desktop (Máx 2mb - 1920x1080)*</label>
                <input type="file" id="desktop-banner" name="desktop" required class="form-control">
            </div>

            <div class="mb-4">
                <label for="mobile-banner">Mobile (Máx 2mb - 400x700)*</label>
                <input type="file" id="mobile-banner" name="mobile" required class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary">Atualizar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
function validarFormulario() {
  const inputDesktop = document.getElementById('desktop-banner');
  const inputMobile = document.getElementById('mobile-banner');
  
  // Verificar desktop
  if (inputDesktop.files.length > 0) {
    const arquivoDesktop = inputDesktop.files[0];
    
    // Verificar tamanho (2MB = 2 * 1024 * 1024 bytes)
    if (arquivoDesktop.size > 2 * 1024 * 1024) {
      alert('A imagem desktop excede o tamanho máximo de 2MB.');
      return false;
    }
      // Verificar formato
    const extensaoDesktop = arquivoDesktop.name.split('.').pop().toLowerCase();
    if (extensaoDesktop !== 'jpg' && extensaoDesktop !== 'jpeg' && extensaoDesktop !== 'png' && extensaoDesktop !== 'webp') {
      alert('A imagem desktop deve ter o formato JPG, JPEG, PNG ou WebP.');
      return false;
    }
  }
  
  // Verificar mobile
  if (inputMobile.files.length > 0) {
    const arquivoMobile = inputMobile.files[0];
    
    // Verificar tamanho (2MB = 2 * 1024 * 1024 bytes)
    if (arquivoMobile.size > 2 * 1024 * 1024) {
      alert('A imagem mobile excede o tamanho máximo de 2MB.');
      return false;
    }
      // Verificar formato
    const extensaoMobile = arquivoMobile.name.split('.').pop().toLowerCase();
    if (extensaoMobile !== 'jpg' && extensaoMobile !== 'jpeg' && extensaoMobile !== 'png' && extensaoMobile !== 'webp') {
      alert('A imagem mobile deve ter o formato JPG, JPEG, PNG ou WebP.');
      return false;
    }
  }
  
  // Se passou por todas as validações
  loading(); // Chama a função de loading original
  return true;
}
</script>