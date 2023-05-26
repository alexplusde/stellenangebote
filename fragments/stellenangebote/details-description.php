<?php
$stellenangebot = $this->getVar('stellenangebot');
?>

<div class="module job-detail-qualifications">
	<div class="container p-4">
		<div class="row">
			<div class="col-12 col-lg-5 offset-lg-1">
				<h2>Ihre Aufgaben</h2>
				<div>
					<?= $stellenangebot->getDescription(); ?>
				</div>
			</div>
			<div class="col-12 col-lg-5">
				<h2>Ihr Profil</h2>
				<div>
					<?= $stellenangebot->getProfile(); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="text-center col-lg-12">
				<a href="#apply" class="job-detail-btn btn btn-primary btn-lg">Jetzt Bewerben</a>

				<?php
                $apply_value = rex_article::get(rex_config::get('stellenangebote', 'apply_value_id'));
if(rex_config::get('stellenangebote', 'apply_value_id') && $apply_value) {
    ?>
				oder
				<a href="<?= $apply_value->getUrl() ?>"
					class="job-detail-btn btn btn-outline-primary btn-lg">wir bewerben uns bei Ihnen</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
