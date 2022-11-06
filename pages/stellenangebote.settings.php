<?php
#
$addon = rex_addon::get('stellenangebote');

$form = rex_config_form::factory($addon->name);

$field = $form->addInputField('text', 'company_name', null, ["class" => "form-control"]);
$field->setLabel(rex_i18n::msg('stellenangebote_config_company_name_label'));
$field->setNotice(rex_i18n::msg('stellenangebote_config_company_name_notice'));

$field = $form->addLinkmapField("company_url", null);
$field->setLabel(rex_i18n::msg('stellenangebote_config_company_url_label'));
$field->setNotice(rex_i18n::msg('stellenangebote_config_company_url_notice'));

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

if (rex_addon::get('url')->isAvailable()) {
    echo rex_view::info($this->i18n('stellenangebote_info_url_active'));
}

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

?>
	</div>
</div>