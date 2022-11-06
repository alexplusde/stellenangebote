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
echo $fragment->parse('core/page/section.php');
