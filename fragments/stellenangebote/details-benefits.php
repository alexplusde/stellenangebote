<div class="module job-detail-benefits" tabindex="0">
	<div class="container p-4">
		<h2>Besondere Benefits zur Stelle</h2>
		<div class="row">

			<?php
$stellenangebot = $this->getVar('stellenangebot');
			$benefits = $stellenangebot->getBenefits();

			foreach ($benefits ?? [] as $benefit) {

			    ?>

			<div class="col col-6 col-md-3 mb-4">
				<div class="display-6 mb-2">
					<?= $benefit->showIcon(); ?>
				</div>
				<p class="h3"><?= $benefit->getName(); ?></p>
			</div>

			<?php } ?>

		</div>
	</div>
</div>
