<?php
$stellenangebot = $this->getVar('stellenangebot');
$contact = $stellenangebot->getContact();
$locations = $stellenangebot->getLocations();
?>
<div class="module job-detail-contact in-view-element in-view-in-animation" tabindex="0">
	<div class="container-fluid">
		<div class="bg-body-secondary row shadow-sm">
			<div class="job-detail-infoboard-image order-2 col-lg-5 order-lg-1 col-xl-4"><?php if ($media = rex_media_plus::get($contact->getPhoto())) {
			    echo $media->getImg();
			} ?></div>
			<div class="job-detail-infoboard-content col-10 order-1 offset-1 col-lg-5 order-lg-2 col-xl-6">
				<div class="row">
					<div class="col-12 col-lg-6 p-4">
						<p class="job-detail-infoboard-content-text-question"><strong>Noch Fragen?</strong></p>
						<div class="job-detail-infoboard-content-text-identiy">
							<?= $contact->getName() ?>
						</div>
						<div class="job-detail-infoboard-content-text-identiy">
							<?= $contact->getPhone() ?>
						</div>
						<div class="job.detail-body-infoboard-content-text-identiy"><a
								href="<?= $contact->getMail() ?>"><?= $contact->getMail() ?></a>
						</div>
					</div>
					<div class="col-12 col-lg-5 offset-lg-1 p-4">
						<?php
			            foreach($locations as $location) {
			                ?>
							<strong	class="job-detail-infoboard-content-headline"><?= $location->getName(); ?></strong>
							<address class="job-detail-infoboard-content-text"><?= $location->getStreet(); ?><br><?= $location->getZip(); ?> <?= $location->getLocality(); ?></address>
							<a class="job-detail-infoboard-content-link" href="http://maps.google.de/maps?q=<?= $location->getStreet(); ?>, <?= $location->getZip(); ?> <?= $location->getLocality(); ?>" target="_blank" rel="noreferrer noopener">Auf Karte anzeigen</a>
							<p>&nbsp;</p>
							<?php
			            }
?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
