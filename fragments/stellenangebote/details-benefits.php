<div class="module job-detail-benefits" tabindex="0">
    <div class="container p-4">
        <h2>Besondere Benefits zur Stelle</h2>
        <div class="row">

            <?php
$stellenangebot = $this->getVar('stellenangebot');
$benefits = $stellenangebot->getBenefits();

            foreach ($benefits as $benefit) {

            ?>

                <div class="col col-md-3 mb-4">
                    <div class="display-6 mb-2"><i class="<?= $benefit->getIcon(); ?>"></i></div>
                    <p class="h3"><?= $benefit->getName(); ?></p>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
