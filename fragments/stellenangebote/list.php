<div class="modul job-uebersicht job-uebersicht-home" tabindex="0">
	<div class="container">
		<div class="job-uebersicht-title">
			<h2 class="job-uebersicht-title-headline text-center">Aktuelle Stellenangebote</h2>
			<div class="job-uebersicht-title-subline text-center">
				<p>Offen für eine neue Herausforderung?</p>
			</div>
		</div>
		<div role="list" class="job-uebersicht-list row row row-cols-1 row-cols-md-3 g-4">
			<?php

$limit = $this->getVar('limit');

			$stellenangebote = FriendsOfRedaxo\Stellenangebote\Entry::findOnline(100);

			foreach($stellenangebote as $stellenangebot) {

			    $location_list = [];

			    foreach($stellenangebot->getLocations() as $location) {
			        $location_list[] =  $location->getLocality();
			    };

			    ?>

			<div role="listitem" class="job-uebersicht-list-item">
				<a class="card job-card h-100 text-decoration-none  border-0 shadow-sm"
					href="<?= $stellenangebot->getUrl() ?>">
					<div class="card-body">
						<div class="text-body">
							<?= $stellenangebot->getCategoryName() ?>
						</div>
						<h3 class="card-title">
							<?= $stellenangebot->getTitle() ?>
						</h3>
						<ul class="job-card-tags-list list-unstyled">
							<li class="job-card-tag job-card-tag-location text-body">
								<i class="bi bi-geo-fill"></i> <span class="">Ort:</span>
								<?= implode(", ", $location_list); ?>
							</li>
						</ul>
					</div>
				</a>
			</div>

			<?php

			}

			?>

		</div>
	</div>
</div>
