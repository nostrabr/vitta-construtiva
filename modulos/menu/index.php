<style>
    .logo-menu{
        width: 140px;
    }

    #menu-mobile{
        height: 0vh;
        width: 100%;
        overflow: hidden;
        position: fixed;
        top: 0px;
        z-index: 10 !important;
        background-color:rgba(0, 0, 0, 0.44);
    }

    .dropdown-item:hover {
        background-color: transparent !important; 
        color: white !important; 
        opacity: .7 !important;
        text-decoration: none !important; 
    }
</style>


<!-- mobile -->
<div id="menu-mobile">
    <div class="bg-white px-4 pt-4 pb-5">
        <div class="w-100 text-center mb-4"><img onclick="menu()" style="width: 50px;" src='<?= $base_url ?>assets/imagens/site/close.png'></div>
        
        <nav class="d-flex flex-column justify-content-center align-items-start">
            <a href="<?= $base_url; ?>index.php" class="mb-4 fs-5 <?= $linkAtivoIndex ? 'active-link' : 'text-black-2' ?>">Home</a>
            <a href="<?= $base_url; ?>sobre-nos.php" class="mb-4 fs-5 <?= $linkAtivoSobreNos ? 'active-link' : 'text-black-2' ?>">Quem somos</a>
            <a id="drop-mobile" onclick="dropMobile()" class="w-100 d-flex align-items-center justify-content-between text-black-2 mb-4 fs-5">Áreas de atuação <i id="down-ico" class="fas fa-chevron-down"></i></a>
            <div id="container-drop-items" class="d-none flex-column justify-content-center align-items-start">
                <?php foreach ($areas_atuacao as $key => $area) { ?>
                    <a href="<?= $base_url; ?>area-atuacao.php?id=<?= $area['id']; ?>" class="mb-4 fs-5 text-0"><?= $area['titulo']; ?></a>
                <?php } ?>
            </div>
            <a href="<?= $base_url; ?>depoimentos.php" class="mb-4 fs-5 <?= $linkAtivoDepoimentos ? 'active-link' : 'text-black-2' ?>">Depoimentos</a>
            <a href="<?= $base_url; ?>contato.php" class="mb-4 fs-5 <?= $linkAtivoContato ? 'active-link' : 'text-black-2' ?>">Contato</a>
            
            <a href="<?= $contatos['instagram']; ?>" target="_blank" class="mt-3"><img style="width: 35px;" src='<?= $base_url ?>assets/imagens/site/insta-menu.png'></a>
        </nav>
    </div>
</div>
<!-- mobile -->



<!-- desktop -->
<div class="px-4 px-lg-0 container mx-auto d-flex justify-content-between align-items-center py-4">
    <a href="<?= $base_url; ?>"><img src='<?= $base_url ?>assets/imagens/site/logo-menu.png' alt='logo' class='logo-menu'></a>

    <nav class="d-none d-lg-flex justify-content-center align-items-center">
        <a href="<?= $base_url; ?>index.php" class="mx-3 <?= $linkAtivoIndex ? 'active-link' : 'text-black-2' ?>">Home</a>
        <a href="<?= $base_url; ?>sobre-nos.php" class="mx-3 <?= $linkAtivoSobreNos ? 'active-link' : 'text-black-2' ?>">Quem somos</a>
        <div class="dropdown mx-3">
            <a class="dropdown-toggle text-black-2" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Áreas de atuação
            </a>
            <ul class="dropdown-menu p-3 bg-0" aria-labelledby="dropdownMenuLink">
                <?php foreach ($areas_atuacao as $key => $area) { ?>
                    <li><a class="dropdown-item mb-2 small text-white" href="<?= $base_url; ?>area-atuacao.php?id=<?= $area['id']; ?>"><?= $area['titulo']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <a href="<?= $base_url; ?>depoimentos.php" class="mx-3 <?= $linkAtivoDepoimentos ? 'active-link' : 'text-black-2' ?>">Depoimentos</a>
        <a href="<?= $base_url; ?>contato.php" class="mx-3 <?= $linkAtivoContato ? 'active-link' : 'text-black-2' ?>">Contato</a>

        <a href="<?= $contatos['instagram']; ?>" target="_blank" class="ms-4"><img style="width: 20px;" src='<?= $base_url ?>assets/imagens/site/insta-menu.png'></a>
    </nav>

    <img onclick="menu()" style="width: 35px;" class="d-block d-lg-none" src='<?= $base_url ?>assets/imagens/site/toggler.png'>
</div>
<!-- desktop -->


<script>
    var open = false;
    function menu(){
        if(open){
            document.getElementById("menu-mobile").style.cssText = `height: 0vh; transition: .2s;`;
            open = false;
        }else{
            document.getElementById("menu-mobile").style.cssText = `height: 100vh; transition: .2s;`;
            open = true;
        }
    }

    var dropStatus = false;
    function dropMobile(){
        if(dropStatus){
            document.getElementById('drop-mobile').classList.remove('text-0')
            document.getElementById('drop-mobile').classList.add('text-black-2')
            document.getElementById('drop-mobile').classList.remove('fw-bold')
            document.getElementById('down-ico').style.cssText = 'transform: rotate(0deg); transition: .2s;'
            document.getElementById('container-drop-items').classList.remove('d-flex')
            document.getElementById('container-drop-items').classList.add('d-none')
            dropStatus = false;
        }else{
            document.getElementById('drop-mobile').classList.remove('text-black-2')
            document.getElementById('drop-mobile').classList.add('text-0')
            document.getElementById('drop-mobile').classList.add('fw-bold')
            document.getElementById('down-ico').style.cssText = 'transform: rotate(180deg); transition: .2s;'
            document.getElementById('container-drop-items').classList.remove('d-none')
            document.getElementById('container-drop-items').classList.add('d-flex')
            dropStatus = true;
        }
    }
</script>