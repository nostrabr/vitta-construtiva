<style>
    ._btn-salvar{
        width: 30%;
    }

    @media(max-width:992px){
        ._btn-salvar{
            width: 100%;
        }
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>dados</strong> de <strong>contatos</strong> e <strong>endereço</strong> do seu site!</p>

<!-- contatos e redes sociais -->
<form onsubmit="loading()" action="modulos-admin/contents/dashboard/php/atualizar-contatos.php" method="post" class="row mb-5 pb-5 border-bottom">
    <div class="mb-4 col-12 col-lg-6">
        <label for="instagram" class="small">Instagram*</label>
        <input class="form-control" value="<?= $contatos->instagram; ?>" type="text" required name="instagram" id="instagram">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_instagram" class="small">@ do instagram*</label>
        <input class="form-control" value="<?= $contatos->_instagram; ?>" type="text" required name="@_instagram" id="@_instagram">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="facebook" class="small">Facebook*</label>
        <input class="form-control" value="<?= $contatos->facebook; ?>" type="text" required name="facebook" id="facebook">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_facebook" class="small">@ do facebook*</label>
        <input class="form-control" value="<?= $contatos->_facebook; ?>" type="text" required name="@_facebook" id="@_facebook">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="linkedin" class="small">LinkedIn*</label>
        <input class="form-control" type="text" value="<?= $contatos->linkedin; ?>" required name="linkedin" id="linkedin">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_linkedin" class="small">@ do LinkedIn*</label>
        <input class="form-control" type="text" value="<?= $contatos->_linkedin; ?>" required name="@_linkedin" id="@_linkedin">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="email-clientes" class="small">E-mail para clientes*</label>
        <input class="form-control" type="email" value="<?= $contatos->email_clientes; ?>" required name="email-clientes" id="email-clientes">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="telefone-clientes" class="small">Telefone para clientes*</label>
        <input class="form-control" type="tel" required value="<?= $contatos->telefone_clientes; ?>" name="telefone-clientes" id="telefone-clientes" maxlength="15" inputmode="tel">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="email-fornecedor" class="small">E-mail para fornecedor*</label>
        <input class="form-control" type="email" value="<?= $contatos->email_fornecedor; ?>" required name="email-fornecedor" id="email-fornecedor">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="telefone-fornecedor" class="small">Telefone para fornecedor*</label>
        <input class="form-control" type="tel" required value="<?= $contatos->telefone_fornecedor; ?>" name="telefone-fornecedor" id="telefone-fornecedor" maxlength="15" inputmode="tel">
    </div>

    <div class="col-12">
        <button class="_btn-salvar btn btn-success">Salvar</button>
    </div>
</form>
<!-- contatos e redes sociais -->





<!-- endereço -->
<form onsubmit="loading()" action="modulos-admin/contents/dashboard/php/atualizar-endereco.php" method="post" class="row mb-5">
    <div class="mb-4 col-12">
        <label for="endereco" class="small">Endereço*</label>
        <input class="form-control text-capitalize" value="<?= $endereco->endereco; ?>" type="text" required name="endereco" id="endereco">
    </div>

    <div class="mb-4 col-12">
        <label for="bairro" class="small">Bairro*</label>
        <input class="form-control text-capitalize" value="<?= $endereco->bairro; ?>" type="text" required name="bairro" id="bairro">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="cidade" class="small">Cidade*</label>
        <input class="form-control text-capitalize" value="<?= $endereco->cidade; ?>" type="text" required name="cidade" id="cidade">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="estado" class="small">Estado*</label>
        <input class="form-control text-uppercase" value="<?= $endereco->estado; ?>" maxlength="2" type="text" required name="estado" id="estado">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="cep" class="small">Cep*</label>
        <input class="form-control" maxlength="9" value="<?= $endereco->cep; ?>" minlength="9" type="text" required name="cep" id="cep">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="pais" class="small">País*</label>
        <input class="form-control" value="<?= $endereco->pais; ?>" type="text" required name="pais" id="pais">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="link-maps" class="small">Link google maps*</label>
        <input class="form-control" value="<?= $endereco->link_maps; ?>" type="text" required name="link-maps" id="link-maps">
    </div>

    <div class="col-12">
        <button class="_btn-salvar btn btn-success">Salvar</button>
    </div>
</form>
<!-- endereço -->




<script>
    //mask input tel
    document.getElementById('telefone-clientes').addEventListener('keyup', (e)=>{
        let input = e.target
        input.value = phoneMask(input.value)
    })
    document.getElementById('telefone-fornecedor').addEventListener('keyup', (e)=>{
    let input = e.target
    input.value = phoneMask(input.value)
    })


    const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
    }



    // mask cep
    document.getElementById('cep').addEventListener('keyup', (e) => {
        let input = e.target;
        input.value = cepMask(input.value);
    });
    
    const cepMask = (value) => {
        if (!value) return "";
        value = value.replace(/\D/g, '');
        value = value.replace(/(\d{5})(\d)/, "$1-$2");
        return value;
    };
</script>