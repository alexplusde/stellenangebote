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
				<div class="job-detail-header-pre-title">
					<?=  $stellenangebot->getCategoryName() ?>
				</div>
				<h1 class="job-detail-header-title">
					<?= $stellenangebot->getTitle() ?>
					<button type="button" data-bs-toggle="tooltip" title="zur Favoritenliste hinzufügen"
						class="share-item btn text-white fav">
						<i class="bi bi-heart h5 fs-5"></i>
					</button>

				</h1>
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
				</ul>
				<div class="job-detail-header-text">
					<h2 class="text-start px-0">Übersicht</h2>
					<div>
						<p><?= $stellenangebot->getTeaser()?></p>
					</div>
				</div>
				<div class="job-detail-header-actions">
					<a class="share-item btn btn-primary bg-white apply" href="#apply"
						class="job-detail-header-action-apply-button btn btn-light">Direkt bewerben</a> oder empfehlen:

					<div class="job-details-share btn-group">

						<a class="share-item btn text-white whatsapp" target="_blank"
							href="<?= $stellenangebot->getShareWhatsappHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-whatsapp"></i>
						</a>
						<a class="share-item btn text-white facebook" target="_blank"
							href="<?= $stellenangebot->getShareFacebookHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-facebook"></i>
						</a>
						<!--
						<a class="share-item btn text-white twitter" target="_blank"  href="<?= $stellenangebot->getShareTwitterHref() ?>"
						noreferrer nofollow" target="_blank">
						<i class="bi bi-twitter"></i>

						</a>-->

						<a class="share-item btn text-white linkedin" target="_blank"
							href="<?= $stellenangebot->getShareLinkedinHref() ?>"
							rel="noreferrer nofollow" target="_blank">
							<i class="bi bi-linkedin"></i>

						</a>

						<a class="share-item btn text-white mail" target="_blank"
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


<div style="display: none;">
	<!-- The text field -->
	<textarea
		id="copy_share_text">Ist diese Stelle für dich interessant? <?= rex_yrewrite::getFullUrlByArticleId(); ?></textarea>
</div>
<!-- The button used to copy the text -->
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
