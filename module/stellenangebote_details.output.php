<?php
# Dieses Modul wird über das Addon plus_bs5 verwaltet und geupdatet.
# Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO

$output = new bs5_fragment();
$output->setVar("slice_id", "REX_SLICE_ID", false);
$output->setVar("article_id", "REX_ARTICLE_ID", false);
$output->setVar("modul_name", "REX_MODULE_KEY", false);

$stellenangebot = stellenangebote::getByArticleId("REX_ARTICLE_ID");
if(!$stellenangebot) {

    echo $output->parse("REX_MODULE_KEY"."-empty");

} else {

    // Inhalte
    $output->setVar("stellenangebot", $stellenangebot);
    $output->setVar("c_action_apply_url", "/bewerbung/", false);


    // Header
    $output->setVar("c_header_pretitle", $stellenangebot->getTeaser());

    $output->setVar("c_header_image", "Marketing-Sales-1.jpg", false);
    $output->setVar("c_header_image_title", "Hier sollte ein Bild mit sinnvollem Alt-Text hinterlegt werden", false);

    echo $output->parse("REX_MODULE_KEY");
}
unset($output);

?>

