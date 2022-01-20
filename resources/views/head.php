<?php

declare(strict_types=1);

use ByTIC\GoogleTagManager\Data\DataLayer;

/** @var DataLayer $dataLayer */
/** @var bool $enabled */

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

    <?= count($consents) ? 'gtag("consent","default",'. DataLayer::encode(array_merge($consents,['wait_for_update' => '1000'])).');' : ''; ?>
    <?= $dataLayer->toStringCommand(); ?>
</script>
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= $id; ?>');</script>
<!-- End Google Tag Manager -->