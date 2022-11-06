<?php

echo rex_view::title(rex_i18n::msg('stellenangebote_title'));

$addon = rex_addon::get('stellenangebote');

$form = rex_config_form::factory($addon->name);

$field = $form->addInputField('text', 'company_name', null, ["class" => "form-control"]);
$field->setLabel(rex_i18n::msg('stellenangebote_config_company_name_label'));
$field->setNotice(rex_i18n::msg('stellenangebote_config_company_name_notice'));

$field = $form->addLinkmapField("company_url", null);
$field->setLabel(rex_i18n::msg('stellenangebote_config_company_url_label'));
$field->setNotice(rex_i18n::msg('stellenangebote_config_company_url_notice'));

# Editor
$field = $form->addInputField('text', 'editor', null, ['class' => 'form-control']);
$field->setLabel(rex_i18n::msg('stellenangebote_editor'));
$field->setNotice('z.B. <code>form-control redactor-editor--default</code>');

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', $addon->i18n('stellenangebote_config'), false);
$fragment->setVar('body', $form->get(), false);


?>
<div class="row">
	<div class="col-lg-8">
		<?= $fragment->parse('core/page/section.php') ?>
	</div>
	<div class="col-lg-4">
		<?php

$anchor = '<a target="_blank" href="https://donate.alexplus.de/?addon=stellenangebote"><img src="'.rex_url::addonAssets('stellenangebote', 'jetzt-beauftragen.svg').'" style="width: 100% max-width: 400px;"></a>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'info', false);
$fragment->setVar('title', $this->i18n('stellenangebote_donate'), false);
$fragment->setVar('body', '<p>' . $this->i18n('stellenangebote_info_donate') . '</p>' . $anchor, false);
echo !rex_config::get("alexplusde", "donated") ? $fragment->parse('core/page/section.php') : "";

$package = rex_install_packages::getUpdatePackages();
if (isset($packages['stellenangebote'])) {
    $current_version = rex_addon::get('stellenangebote')->getProperty('version');
    if (isset($package['files'])) {
        $latest_version = array_pop($updates)['version'];
    }
    if (rex_version::compare($latest_version, $current_version, ">")) {
        echo rex_view::info($this->i18n('stellenangebote_update_available') . " " .$latest_version);
    };
};

$func = rex_request('func', 'string');
$csrf = rex_csrf_token::factory('stellenangebote_demo');
if ($func !== '') {
    if (!$csrf->isValid()) {
        echo rex_view::error(rex_i18n::msg('csrf_token_invalid'));
    } else {
        if ($func === 'setup') {
            $file = rex_path::addon('stellenangebote').'install/demo.sql';
            rex_sql_util::importDump($file);
            echo rex_view::success(rex_i18n::msg('stellenangebote_demo_imported'));
        }
    }
}
$content = "";
$content .= '<p>'.rex_i18n::msg('stellenangebote_demo_notice').'</p>';
$content .= '<p><a class="btn btn-primary" href="'.rex_url::currentBackendPage(['func' => 'setup'] + $csrf->getUrlParams()).'" data-confirm="'.rex_i18n::msg('stellenangebote_demo_warning').'">'.rex_i18n::msg('stellenangebote_demo').'</a></p>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'danger', false);
$fragment->setVar('title', rex_i18n::msg('stellenangebote_demo'), false);
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');
?>
	</div>
</div>