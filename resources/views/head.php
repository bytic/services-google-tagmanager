<?php
/** @var \ByTIC\GoogleTagManager\Data\DataLayer $dataLayer */

if ($enabled === false) {
    return;
}

/** @var array $consents */
if (count($consents)) {
    $dataLayer->push(['event' => 'default_consent']);
}
?>
<!-- Google Tag Manager -->
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {dataLayer.push(arguments);}

    <?= count($consents) ? 'gtag("consent","default",'.\ByTIC\GoogleTagManager\Data\DataLayer::encode($consents).');' : ''; ?>
    <?= $dataLayer->toStringCommand(); ?>
</script>
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= $id; ?>');</script>
<!-- End Google Tag Manager -->