<div class="module job-detail-benefits" tabindex="0">
	<div class="container p-4">
		<h2>Benefits bei unseren Stellen</h2>
		<div class="row">

			<?php

            $benefits = Alexplusde\Stellenangebote\Benefits::query()->find();

			foreach ($benefits ?? [] as $benefit) {

			    ?>

			<div class="col col-12 col-md-3 mb-4">
				<div class="card h-100">
					<div class="card-body">
						<div class="display-6 mb-2">
							<?= $benefit->showIcon(); ?>
						</div>
						<h3><?= $benefit->getName(); ?></h3>
						<p><?= $benefit->getDescription(); ?></p>
					</div>
				</div>
			</div>

			<?php } ?>

		</div>
	</div>
</div>
