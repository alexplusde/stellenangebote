<?php
Alexplusde\Stellenangebote\Posting::get($this->getVar("id"));
?>
<div class="stelleangebot">
	<h1><?= $stellenangebot->getTitle() ?></h1>
	<p><?= $stellenangebot->getTeaser(); ?></p>
	<p>Veröffentlicht:
		<?= $stellenangebot->getDatePostedFormatted(); ?>
	</p>
	<p>Bewerbungsfrist:
		<?= $stellenangebot->getValidThroughFormatted(); ?>
	</p>
	<p>Umfang: <?= $stellenangebot->getEmploymentTypeFormatted(); ?>
	</p>
	<div class="stellenangebot-description">
		<?= $stellenangebot->getValidThroughFormatted(); ?>
	</div>
</div>
