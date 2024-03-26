<?php
# Dieses Modul wird über das Addon stellenangebote verwaltet und geupdatet.
# Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO

$output = new bs5_fragment();
$output->setVar("slice_id", "REX_SLICE_ID");
$output->setVar("article_id", "REX_ARTICLE_ID");
$output->setVar("modul_name", "REX_MODULE_KEY");

$output->setVar("limit", 6);

echo $output->parse("REX_MODULE_KEY");

unset($output);
