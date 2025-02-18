<?php

use FriendsOfRedaxo\MForm;
#######################################################################
# Dieses Modul wird über das Addon stellenangebote verwaltet und geupdatet.
# Um das Modul zu entkoppeln, ändere den Modul-Key in REDAXO. Um die 
# Ausgabe zu verändern, genügt es, das passende Fragment zu überschreiben.
#######################################################################


$mform = MForm::factory();

$mform->addFieldsetArea('');

$mform->addTextField(1, ['label' => 'Titel']);

$mform->addSelectField(2, ['h1' => 'Seite', 
'h2' => 'Ebene 2', 
'h3' => 'Ebene 3', 
'h4' => 'Ebene 4'], ['label' => 'Ebene']);

$mform->addTextAreaField(4, ['label' => 'Text','class' => rex_config::get('plus_bs5', 'editor')]);
$mform->addTextAreaField(8, ['label' => 'CTA','class' => rex_config::get('plus_bs5', 'editor')]);

$mform->addMediaField(2, array('label'=>'Hintergrundbild (Desktop)'));
$mform->addMediaField(3, array('label'=>'Hintergrundbild (mobile)'));

echo $mform->show();
