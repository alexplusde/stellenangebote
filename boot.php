<?php

namespace FriendsOfRedaxo\Stellenangebote;

use rex_addon;
use rex_config;
use rex_yform_manager_dataset;
use rex;
use rex_extension;
use rex_extension_point;
use rex_be_controller;
use rex_category;
use rex_article;



if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote',
        Entry::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_contact',
        Contact::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_location',
        Location::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_apply',
        Apply::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_benefits',
        Benefits::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_stellenangebote_category',
        Category::class
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
                Entry::addContentPage();
            }
        } else {
            Entry::addContentPage();
        }
    }
}

if (rex::isBackend() && rex::isDebugMode() && rex_config::get('plus_bs5', 'dev')) {
    \bs5::writeModule("stellenangebote", 'stellenangebote/%');
    \bs5::writeTemplate("stellenangebote", 'stellenangebote/%');
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
                    if($a['list']->getValue('category_id') && Category::get($a['list']->getValue('category_id'))) {
                        $output[] = "📁 " . Category::get($a['list']->getValue('category_id'))->getValue('name');
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
                        $benefit = Benefits::get($benefits_id);
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


if (rex::isBackend() && \rex_addon::get('stellenangebote') && \rex_addon::get('stellenangebote')->isAvailable() && !rex::isSafeMode()) {
    $addon = rex_addon::get('stellenangebote');
    $pages = $addon->getProperty('pages');

    if(!rex::getConsole()) {
        $_csrf_key = \rex_yform_manager_table::get('rex_stellenangebote_entry')->getCSRFKey();
        
        $token = \rex_csrf_token::factory($_csrf_key)->getUrlParams();

        $params = [];
        $params['table_name'] = 'rex_stellenangebote_entry'; // Tabellenname anpassen
        $params['rex_yform_manager_popup'] = '0';
        $params['_csrf_token'] = $token['_csrf_token'];
        $params['func'] = 'add';

        $href = \rex_url::backendPage('stellenangebote/stellenangebote/entry', $params);

        $pages['stellenangebote']['stellenangebote']['entry']['title'] .= ' <a class="label label-primary tex-primary" style="position: absolute; right: 18px; top: 10px; padding: 0.2em 0.6em 0.3em; border-radius: 3px; color: white; display: inline; width: auto;" href="' . $href . '">+</a>';
        $addon->setProperty('pages', $pages);
    }
}
