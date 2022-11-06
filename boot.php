<?php

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote',
        stellenangebote::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_contact',
        stellenangebote_contact::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_location',
        stellenangebote_location::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_apply',
        stellenangebote_apply::class
    );
}

if (rex::isBackend()) {
    rex_extension::register('OUTPUT_FILTER', function (rex_extension_point $ep) {
        $suchmuster = 'class="###stellenangebote-settings-editor###"';
        $ersetzen = rex_config::get("stellenangebote", "editor");
        $ep->setSubject(str_replace($suchmuster, $ersetzen, $ep->getSubject()));
    });
}
