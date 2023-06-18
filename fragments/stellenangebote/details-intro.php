<?php

$stellenangebot = $this->getVar('stellenangebot');
?>
<section class="job-detail-header bg-primary text-white">
	<div class="container p-4">

		<div class="row">
			<div class="job-detail-header-image col-lg-5 offset-lg-1 py-4">
				<?= rex_media_plus::get($stellenangebot->getImage())->getImg(); ?>
			</div>
			<div class="job-detail-header-body col-lg-6 py-4">
				<ul class="job-details-tags list-unstyled list-group list-group-horizontal">
					<li
						class="list-group-item job-detail-header-tag job-detail-header-tag-location bg-transparent text-white">
						<i class="bi bi-geo-fill"></i>
						<span class="visually-hidden">Ort:</span>
						<?= $stellenangebot->getLocationNames() ?>
					</li>
					<li
						class="list-group-item job-detail-header-tag job-detail-header-tag-employment-type bg-transparent text-white">
						<i class="bi bi-hourglass-split"></i>

						<span class="visually-hidden">Einstellungsart:</span>
						<?= $stellenangebot->getEmploymentTypeFormatted() ?>
					</li>
					<li
						class="list-group-item job-detail-header-tag job-detail-header-tag-employment-time bg-transparent text-white">
						<i class="bi bi-clock-history"></i>

						<span class="visually-hidden">Dauer:</span>
						<?= $stellenangebot->getEmploymentTypeFormatted() ?>
					</li>
					<li
						class="list-group-item job-detail-header-tag job-detail-header-tag-employment-time bg-transparent text-white">
						<i
							class="bi bi-tag <?=  $stellenangebot->getCategoryIcon() ?>"></i>

						<span class="visually-hidden">Bereich:</span>
						<?=  $stellenangebot->getCategoryName() ?>
					</li>
				</ul>

				<div class="job-detail-header-pre-title">
				</div>
				<h1 class="job-detail-header-title">
					<?= $stellenangebot->getTitle() ?>
					<!--					<button type="button" data-bs-toggle="tooltip" title="zur Favoritenliste hinzufügen"
						class="share-item btn text-white fav">
						<i class="bi bi-heart h5 fs-5"></i>
					</button>
-->
				</h1>
				<div class="job-detail-header-text">
					<div>
						<p><?= $stellenangebot->getTeaser()?></p>
					</div>
				</div>
				<div class="job-detail-header-actions">
					<a class="btn btn-primary btn-light apply d-inline-block rounded" href="#apply">Jetzt bewerben</a>
					<div class="job-details-share btn-group d-block mt-3">
						<span class="text-white">oder empfehlen:</span>

						<a class="share-item icon-link d-inline-block p-1 text-white whatsapp" target="_blank"
							href="<?= $stellenangebot->getShareWhatsappHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-whatsapp"></i>
						</a>
						<a class="share-item icon-link d-inline-block p-1 text-white facebook" target="_blank"
							href="<?= $stellenangebot->getShareFacebookHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-facebook"></i>
						</a>

						<a class="share-item icon-link d-inline-block p-1 text-white linkedin" target="_blank"
							href="<?= $stellenangebot->getShareLinkedinHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-linkedin"></i>

						</a>

						<a class="share-item icon-link d-inline-block p-1 text-white mail" target="_blank"
							href="<?= $stellenangebot->getShareMailHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-envelope-at"></i>
						</a>

						<button type="button" onclick="window.print()" title="Diese Seite Drucken"
							class="share-item btn text-white print">
							<i class="bi bi-printer"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!--
<div style="display: none;">
	<textarea
		id="copy_share_text">Ist diese Stelle für dich interessant? <?= rex_yrewrite::getFullUrlByArticleId(); ?></textarea>
</div>
<button id="copy_share_button">Jetzt kopieren</button>
<script>
	function copy_share() {
		/* Get the text field */
		var copyText = document.getElementById("copy_share_text");

		/* Select the text field */
		copyText.select();
		copyText.setSelectionRange(0, 99999); /* For mobile devices */

		/* Copy the text inside the text field */
		navigator.clipboard.writeText(copyText.value);

		/* Alert the copied text */
		document.getElementById("copy_share_headline").innerHTML = "In Zwischenablage kopiert";
	}
</script>
-->
