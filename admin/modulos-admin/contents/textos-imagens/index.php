<style>
    .preview-gif{
        width: 100px;
        height: 80px;
        overflow: hidden;
    }
    .preview-gif img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>Textos e Imagens</strong> do seu site!</p>


<!-- textos imagens -->
<section>

    <!-- GIF -->
    <div class="my-5 py-5 pt-2 border-bottom">
        <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/textos-imagens/php/att-gif.php" method="post" enctype="multipart/form-data">
            <div class='mb-3'>
              <label for='gif' class="mb-1 fs-6 fw-semibold">Gif página Home*</label>
              <input type='file' id='gif' name='gif' class='form-control' required>
            </div>
            <div class="preview-gif mb-4 mt-2">
                <img src='<?= $base_url ?>assets/imagens/arquivos/textos-imagens/<?= $textos_imagens['gif_sobre_home']; ?>'>
            </div>
            <input type="hidden" name="gif-atual" value="<?= $textos_imagens['gif_sobre_home']; ?>">
            <button type="submit" class="btn px-5 btn-success">Atualizar</button>
        </form>
    </div>
    <!-- GIF -->

    <!-- TEXTO SOBRE HOME -->
    <div class="my-5 py-5 border-bottom">
        <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/textos-imagens/php/att-texto-home.php" method="post" enctype="multipart/form-data">
            <div class='mb-3'>
              <label for='texto-home' class="mb-1 fs-6 fw-semibold">Texto sobre página Home*</label>
              <textarea id='texto-home' name='texto-home' rows="4" class='form-control' required><?= $textos_imagens['texto_sobre_home']; ?></textarea>
            </div>
            <button type="submit" class="btn px-5 btn-success">Atualizar</button>
        </form>
    </div>
    <!-- TEXTO SOBRE HOME -->

    <!-- TEXTO SOBRE PÁGINA QUEM SOMOS -->
    <div class="my-5 py-5">
        <form onsubmit="loading()" action="<?= $base_url; ?>modulos-admin/contents/textos-imagens/php/att-texto-quem-somos.php" method="post" enctype="multipart/form-data">
            <div class='mb-3'>
              <label for='texto-quem-somos' class="mb-1 fs-6 fw-semibold">Texto sobre página quem somos*</label>
              <textarea id='texto-quem-somos' name='texto-quem-somos' rows="4" class='form-control' required><?= $textos_imagens['texto_sobre_pag']; ?></textarea>
            </div>
            <button type="submit" class="btn px-5 btn-success">Atualizar</button>
        </form>
    </div>
    <!-- TEXTO SOBRE PÁGINA QUEM SOMOS -->

</section>
<!-- textos imagens -->



<script>

</script>