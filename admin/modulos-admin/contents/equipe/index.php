<style>
    .preview-img-equipe{
        width: 60px;
        height: 75px;
        margin-top: 10px !important;
    }
    .preview-img-equipe img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar a sua <strong>Equipe</strong> em seu site!</p>


<!-- equipe -->
<section>
    <button type="button" class="mb-5 btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#add-equipe"> Adicionar membro equipe + </button> 

    <?php foreach ($equipes as $key => $equipe) { ?>
        <div class="mb-4 item-acordion accordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#equipe-<?= $equipe['id']; ?>" aria-expanded="false" aria-controls="equipe-<?= $equipe['id']; ?>">
                        <?= $equipe['nome']; ?>
                    </button>
                </h2>
                <div id="equipe-<?= $equipe['id']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
        
                        <form class="mb-3 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/equipe/php/atualizar-nome.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $equipe['id']; ?>">
                            
                            <div class="w-100">
                            <label for='att-nome'>Nome*</label>
                            <input type='text' id='att-nome' name='att-nome' value="<?= $equipe['nome']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                        </form>
                                
                        <form class="mb-3 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/equipe/php/atualizar-cargo.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $equipe['id']; ?>">

                            <div class="w-100">
                            <label for='att-cargo'>Cargo*</label>
                            <input type='text' id='att-cargo' name='att-cargo' value="<?= $equipe['cargo']; ?>" class='form-control' required>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                        </form>

                        <form class="mb-3 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/equipe/php/atualizar-texto.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $equipe['id']; ?>">

                            <div class="w-100">
                            <label for='att-texto'>Texto*</label>
                            <textarea id='att-texto' rows="4" name='att-texto' class='form-control' required><?= $equipe['texto']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                        </form>

                        <form class="mb-5 d-flex align-items-end" onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/equipe/php/atualizar-foto.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $equipe['id']; ?>">
                            <input type="hidden" name="nome-img" value="<?= $equipe['foto']; ?>">

                            <div class="w-100">
                            <label for='att-foto'>Foto*</label>
                            <input type='file' accept=".png, .jpg, .jpeg" id='att-foto' name='att-foto' class='form-control' required>
                            </div>
                            <div class="ms-3 preview-img-equipe">
                                <img src='<?= $base_url ?>assets/imagens/arquivos/equipe/<?= $equipe['foto']; ?>' alt='<?= $equipe['nome']; ?>'>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm py-2 ms-2">Atualizar</button>
                        </form>

                        <a href="<?= $base_url; ?>modulos-admin/contents/equipe/php/deletar-equipe.php?id=<?= $equipe['id']; ?>&foto=<?= $equipe['foto']; ?>" class="btn btn-sm btn-danger mb-4">Deletar membro equipe</a>
        
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php 
    if(count($equipes) == 0){
        echo "<p class='small form-text'>Nenhum membro cadastrado!</p>";
    }
    ?>
</section>
<!-- equipe -->



<script>

</script>