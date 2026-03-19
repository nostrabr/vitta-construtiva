    <!-- METATAGS -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="<?= $meta_robots ?? 'index, follow'; ?>">
    <link rel="canonical" href="<?= $canonical_url ?? $base_url; ?>">

    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= $base_url; ?>assets/imagens/site/thumb.png">
    <meta property="og:image:width" content="310">
    <meta property="og:image:height" content="310">
    <meta property="og:url" content="<?= $canonical_url ?? $base_url; ?>">
    <meta property="og:title" content="<?= $seo_title ?? $pagAtual ?? $titulo_site; ?>">
    <meta name="description" content="<?= $seo_description ?? $descricao_site; ?>">
    <meta property="og:description" content="<?= $seo_description ?? $descricao_site; ?>">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KJ7956S9');</script>
    <!-- End Google Tag Manager -->

    <!-- FAVICON -->
    <link rel="icon" href="<?= $base_url; ?>assets/imagens/site/favicon.png" type="image/x-icon">

    <!-- FONTAWSOME -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- ALERT PERSONALIZADO -->
    <script src="<?= $base_url; ?>assets/dependencias/alert-personalizado/alert-personalizado.js"></script>

    <!-- SCROLL ANIMATION -->
    <link href="<?= $base_url; ?>assets/dependencias/anima-scroll/aos.css" rel="stylesheet">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- BASE URL JS -->
    <script>
        const base_url = '<?= $base_url; ?>';
    </script>

    <!-- SWIPER -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/dependencias/swiper/swiper.css">

    <!-- FANCYBOX CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/dependencias/fancybox/fancybox.css">

    <!-- GLOBAL CSS -->
    <link rel="stylesheet" href="<?= $base_url; ?>assets/css/style.css">


        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ConstructionCompany",
            "name": "Vittà Construtora",
            "url": "<?= rtrim($base_url, '/'); ?>",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Passo Fundo",
                "addressRegion": "RS",
                "addressCountry": "BR"
            }
        }
        </script>

        <title><?= $seo_title ?? $pagAtual; ?></title>