<?php

// NOT IN USE AT THIS POINT
return [

    /*
     * The Google Tag Manager id, should be a code that looks something like "gtm-xxxx".
     */
    'id' => getenv('GOOGLE_TAGMANAGER_ID', ''),


    /*
     * Enable or disable script rendering. Useful for local development.
     */
    'enabled' => getenv('GOOGLE_TAGMANAGER_ENABLED', true),
];
