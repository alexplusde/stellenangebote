<?php
# Dieses Modul wird über das Addon stellenangebote verwaltet und geupdatet.
# Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO

$output = new bs5_fragment();
$output->setVar("slice_id", "REX_SLICE_ID");
$output->setVar("article_id", "REX_ARTICLE_ID");
$output->setVar("modul_name", "REX_MODULE_KEY");

/* REX_VALUE */
$output->setVar("title", "REX_VALUE[1 output=html]");
$output->setVar("level", "REX_VALUE[2 output=html]");
$output->setVar("text", "REX_VALUE[4 output=html]", false);
$output->setVar("cta", "REX_VALUE[8 output=html]", false);

$output->setVar("limit", 6);

echo $output->parse("REX_MODULE_KEY");

unset($output);