<style>
  .preview-img-engenheiro{
    width: 60px;
    height: 75px;
    margin-top: 10px !important;
  }
  .preview-img-engenheiro img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>Engenheiros</strong> do seu site!</p>


<!-- engenheiros -->
<section>
    <button type="button" class="mb-5 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add-engenheiro"> Adicionar engenheiro + </button> 

    <?php foreach ($engenheiros as $key => $engenheiro) { ?>
         <div class="mb-4 item-acordion accordion">
             <div class="accordion-item">
                 <h2 class="accordion-header">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#engenheiro-<?= $engenheiro['id']; ?>" aria-expanded="false" aria-controls="engenheiro-<?= $engenheiro['id']; ?>">
                        <?= $engenheiro['nome']; ?>
                     </button>
                 </h2>
                 <div id="engenheiro-<?= $engenheiro['id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                     <div class="accordion-body">
         
                         <form class="mb-3 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/engenheiros/php/atualizar-nome.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $engenheiro['id']; ?>">
                            
                            <div class="w-100">
                              <label for='att-nome'>Nome*</label>
                              <input type='text' id='att-nome' name='att-nome' value="<?= $engenheiro['nome']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                         </form>
                                  
                         <form class="mb-3 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/engenheiros/php/atualizar-cargo.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $engenheiro['id']; ?>">

                            <div class="w-100">
                              <label for='att-cargo'>Cargo*</label>
                              <input type='text' id='att-cargo' name='att-cargo' value="<?= $engenheiro['cargo']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                         </form>

                         <form class="mb-5 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/engenheiros/php/atualizar-foto.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $engenheiro['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $engenheiro['foto']; ?>">

                            <div class="w-100">
                              <label for='att-foto'>Foto*</label>
                              <input type='file' id='att-foto' name='att-foto' class='form-control' required>
                            </div>
                            <div class="ms-3 preview-img-engenheiro">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/engenheiros/<?= $engenheiro['foto']; ?>' alt='<?= $engenheiro['nome']; ?>'>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                         </form>

                         <a href="<?= $base_url; ?>modulos-admin/contents/engenheiros/php/deletar-engenheiro.php?id=<?= $engenheiro['id']; ?>&foto=<?= $engenheiro['foto']; ?>" class="btn btn-sm btn-danger mb-4">Deletar engenheiro</a>
         
                     </div>
                 </div>
             </div>
         </div>
    <?php } ?>

    <?php 
      if(count($engenheiros) == 0){
        echo "<p class='small form-text'>Nenhum engenheiro cadastrado!</p>";
      }
    ?>
</section>
<!-- engenheiros -->



<script>

</script>