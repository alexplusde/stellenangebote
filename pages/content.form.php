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

$stellenangebot = Alexplusde\Stellenangebote\Posting::getByArticleId($articleId);

if(!$stellenangebot) {
    $stellenangebot = Alexplusde\Stellenangebote\Posting::create();
    $is_new = 1;
}

$yform = $stellenangebot->getForm();

$yform->setObjectparams('form_ytemplate', 'bootstrap');
$yform->setObjectparams('form_showformafterupdate', 1);
$yform->setObjectparams('form_action', $context->getUrl());

$yform->setObjectparams('main_table', 'rex_stellenangebote');

if($stellenangebot->exists()) {
    $yform->setObjectparams('getdata', 1);
    $yform->setObjectparams('main_where', 'id='.$stellenangebot->getId());
}

$yform->setHiddenField('article_id', $articleId);

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit', false);
$fragment->setVar('title', rex_i18n::msg('stellenangebote_content_page_title'), false);
$fragment->setVar('body', $stellenangebot->executeForm($yform), false);

return $fragment->parse('core/page/section.php');
