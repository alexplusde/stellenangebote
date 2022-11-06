<?php

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_table_api::importTablesets(rex_file::get(rex_path::addon($this->name, 'install/rex_stellenangebote.tableset.json')));
    rex_yform_manager_table::deleteCache();
}

rex_config::set('stellenangebote', 'company_name', rex::getServerName());
rex_config::set('stellenangebote', 'company_url', rex_article::getSiteStartArticleId());
