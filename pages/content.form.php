<?php
$articleId = rex_request('article_id', 'int');
$categoryId = rex_request('category_id', 'int');
$clang = rex_request('clang', 'int');
$ctype = rex_request('ctype', 'int');

$context = new rex_context([
    'page' => rex_be_controller::getCurrentPage(),
    'article_id' => $articleId,
    'category_id' => $categoryId,
    'clang' => $clang,
    'ctype' => $ctype,
]);

$yform = new rex_yform();

$yform->setObjectparams('form_name', 'table-rex_stellenangebote');
$yform->setObjectparams('form_ytemplate', 'bootstrap');
$yform->setObjectparams('form_showformafterupdate', 1);


$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', rex_i18n::msg('stellenangebote_content_page_title'), false);
$fragment->setVar('body', $yform->getForm(), false);

return $fragment->parse('core/page/section.php');
