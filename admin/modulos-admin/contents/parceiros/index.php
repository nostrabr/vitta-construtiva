<style>
    .container-img-logo{
        width: 30px;
        height: 35px;
        overflow: hidden;
    }
    .container-img-logo img{
        width: 100%;
    }

    .container-table-parceiros{
        width: 80% !important;
    }
    @media(min-width: 1500px){
        .container-table-parceiros{
            width: 60% !important;
        }
    }
    @media(max-width: 992px){
        .container-table-parceiros{
            width: 100% !important;
        }
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>Parceiros</strong> do seu site!</p>


<!-- parceiros -->
<section>
    <button type="button" class="btn-sm mb-5 btn btn-success" data-bs-toggle="modal" data-bs-target="#add-parceiro"> Adicionar novo parceiro + </button> 

    <table class="table table-striped container-table-parceiros">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-2">Nome</th>
                <th class="col-2">Logo</th>
                <th class="col-1">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parceiros as $key => $parceiro) { ?>
                <tr>
                    <td><?= $key + 1; ?> -</td>
                    <td><?= $parceiro['nome']; ?></td>
                    <td><div class="container-img-logo"><img src='<?= $base_url ?>assets/imagens/arquivos/parceiros/<?= $parceiro['logo']; ?>'></div></td>
                    <td><a href="<?= $base_url; ?>modulos-admin/contents/parceiros/php/deletar-parceiro.php?id=<?= $parceiro['id']; ?>&foto=<?= $parceiro['logo']; ?>" class="btn btn-danger btn-sm">Deletar</a></td>
                </tr>
            <?php } ?>

            <?php
                if (count($parceiros) == 0) {
                    echo "<tr><td colspan='4'>Nenhum parceiro cadastrado!</td></tr>";
                }
            ?>
        </tbody>
    </table>
</section>
<!-- parceiros -->



<script>

</script>