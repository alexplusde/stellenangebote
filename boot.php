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
    if(rex_be_controller::getCurrentPagePart() && rex_be_controller::getCurrentPagePart()[0] == "content") {
        if(rex_config::get('stellenangebote', 'category_id')) {
            $category = rex_category::get(rex_request('category_id', 'int'));
            if($category && $category->getClosest(fn (rex_category $cat) => rex_config::get('stellenangebote', 'category_id') == $cat->getId())) {
                stellenangebote::addContentPage();
            }
        } else {
            stellenangebote::addContentPage();
        }
    }
}
