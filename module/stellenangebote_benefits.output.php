<?php
# Dieses Modul wird über das Addon stellenangebote verwaltet und geupdatet.
# Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO

if (!bs5::packageExists('redactor, media_manager_responsive')) {
    return;
};

$output = new bs5_fragment();
$output->setVar("slice_id", "REX_SLICE_ID");
$output->setVar("article_id", "REX_ARTICLE_ID");
$output->setVar("modul_name", "REX_MODULE_KEY");

/* REX_VALUE */
$output->setVar("title", "REX_VALUE[1 output=html]", false);
$output->setVar("level", "REX_VALUE[2]");
$output->setVar("text", "REX_VALUE[3 output=html]", false);

/* REX_MEDIA */
$output->setVar("image", "REX_MEDIA[1]");
$output->setVar("bg_image", "REX_MEDIA[2]");
$output->setVar("bg_image_mobile", "REX_MEDIA[3]");

echo $output->parse("REX_MODULE_KEY");

unset($output);
