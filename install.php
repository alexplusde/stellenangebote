<?php

use Alexplusde\BS5\Helper;

if (rex_addon::get('plus_bs5')->isAvailable() && !rex::isSafeMode()) {
Helper::forceBackup();
}

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($this->name, 'install/rex_stellenangebote.tableset.json')));
    rex_yform_manager_table::deleteCache();
}

if (rex_config::get('stellenangebote', 'company_name') === "") {
    rex_config::set('stellenangebote', 'company_name', rex::getServerName());
    rex_config::set('stellenangebote', 'company_url', rex_article::getSiteStartArticleId());
}

if (rex::isBackend() && rex::isDebugMode() && rex_config::get('plus_bs5', 'dev')) {
    Helper::updateModule('stellenangebote');
    Helper::updateTemplate('stellenangebote');
}


\rex_delete_cache();
