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
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_benefits',
        stellenangebote_benefits::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_category',
        stellenangebote_category::class
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

if (rex::isBackend() && rex::isDebugMode() && rex_config::get('plus_bs5', 'dev')) {
    bs5::writeModule("stellenangebote", 'stellenangebote/%');
    bs5::writeTemplate("stellenangebote", 'stellenangebote/%');
}
//schönere Tabellendarstellung

if (rex::isBackend()) {
    rex_extension::register('YFORM_DATA_LIST', function ($ep) {

        //Kursanmeldungen
        if ($ep->getParam('table')->getTableName() == "rex_stellenangebote") {
            $list = $ep->getSubject();
            $list->setColumnFormat(
                'title',
                'custom',
                function ($a) {
                    $output = [];

                    $output[] = '<strong>'.$a['list']->getValue('title').'</strong>';

                    if($a['list']->getValue('subtitle')) {
                        $output[] = $a['list']->getValue('subtitle');
                    }

                    if($a['list']->getValue('article_id') && rex_article::get($a['list']->getValue('article_id'))) {
                        $output[] = '🔗 <a href="'.rex_article::get($a['list']->getValue('article_id'))->getUrl().'>Zum Artikel</a>';
                    }
                    if($a['list']->getValue('category_id') && stellenangebote_category::get($a['list']->getValue('category_id'))) {
                        $output[] = "📁 " . stellenangebote_category::get($a['list']->getValue('category_id'))->getValue('name');
                    }

                    $employment_types = $array = [
                        "FULL_TIME" => "Vollzeit",
                        "PART_TIME" => "Teilzeit",
                        "CONTRACTOR" => "Stelle als Auftragnehmer",
                        "TEMPORARY" => "Befristet",
                        "INTERN" => "Parktikum",
                        "VOLUNTEER" => "Ehrenamltlich",
                        "PER_DIEM" => "Auf Tagesbasis",
                        "OTHER" => "Andere"
                    ];
                    $selected_employment_types = array_filter(explode(",", $a['list']->getValue('employment_type')));

                    $employment_badges = [];
                    foreach($selected_employment_types as $selected_employment_type) {
                        $employment_badges[] = '<span class="badge badge-secondary">'. $employment_types[$selected_employment_type] .'</span>';
                    }

                    if(count($employment_badges) > 0) {
                        $output[] = implode(" ", $employment_badges);
                    }

                    return implode('<br>', $output);
                }
            );

            $list->setColumnFormat(
                'benefits',
                'custom',
                function ($a) {
                    $output = [];

                    $benefits_ids = array_filter(explode(",", $a['list']->getValue('benefits')));

                    $benefits_badges = [];
                    foreach($benefits_ids as $benefits_id) {
                        $benefit = stellenangebote_benefits::get($benefits_id);
                        if($benefit) {
                            $benefits_badges[] = '<span class="label label-success">'. $benefit->getName() .'</span>';
                        }
                    }

                    if(count($benefits_badges) > 0) {
                        $output[] = implode(" ", $benefits_badges);
                    }

                    return implode('<br>', $output);
                }
            );

            
            $list->removeColumn('subtitle');
            $list->removeColumn('id');
            $list->removeColumn('prio');
            $list->removeColumn('category_id');
            $list->removeColumn('employment_type');
            $list->removeColumn('article_id');
            $list->setColumnLabel('telecommute', '🏠');
        };
    });
}
