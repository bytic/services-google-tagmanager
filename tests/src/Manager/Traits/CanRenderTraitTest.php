<?php

namespace ByTIC\GoogleTagManager\Tests\Manager\Traits;

use ByTIC\GoogleTagManager\GTManager;
use ByTIC\GoogleTagManager\Tests\AbstractTest;

/**
 * Class CanRenderTraitTest
 * @package ByTIC\GoogleTagManager\Tests\Manager\Traits
 */
class CanRenderTraitTest extends AbstractTest
{
    public function test_head_returns_empty_not_enabled()
    {
        $manager = new GTManager();
        self::assertEmpty($manager->head());
    }

    public function test_head()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        $manager->dataSet('pageCategory','signup');
        self::assertSame("<!-- Google Tag Manager -->
<script>
    window.dataLayer = window.dataLayer || [];
    dataLayer = [{\"pageCategory\":\"signup\"}];
</script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GT-999');</script>
<!-- End Google Tag Manager -->",$manager->head());
    }

    public function test_body_returns_empty_not_enabled()
    {
        $manager = new GTManager();
        self::assertEmpty($manager->body());
    }

    public function test_body()
    {
        $manager = new GTManager();
        $manager->enable();
        $manager->setId('GT-999');
        self::assertSame('<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GT-999"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->',$manager->body());
    }
}