
<div class="module job-detail-benefits" tabindex="0">
    <div class="container p-4">
        <h2>Besondere Benefits zur Stelle</h2>


<?php   

$stellenangebot = $this->getVar('stellenangebot');
$benefits = $stellenangebot->getBenefits();
$slides_count = (int)ceil(count($benefits) / 4);
?>

        <div id="carouselBenefits" class="carousel slide">

        <div class="carousel-indicators">

            <?php
            $active = "active";
            for($i = 0; $i < $slides_count; $i++) { ?>
            <button type="button" data-bs-target="#carouselBenefitsIndicators" data-bs-slide-to="<?= $i ?>" class="<?= $active ?>" aria-current="true" aria-label="Slide <?= $i + 1 ?>"></button>
            <?php } ?>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active row">
                

        <?php

$active = "active";
$j = 0;
foreach($benefits as $benefit) {

if(!$active && ($j % 4) == 0) { 

    ?>
            </div>
            <div class="carousel-item row"> 
<?php 
}   
?>        

                <div class="col col-md-6">
                    <p><i class="<?= $benefit->getIcon(); ?>"></i> <?= $benefit->getName(); ?></p>
                </div>

<?php
$active = false;
$j++;
}            
        ?>
           </div>
        </div>




<?php if (count($benefits) > 4) { ?>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselBenefitsIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Vorherige</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselBenefitsIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Weitere</span>
        </button>
        </div>

        <?php } ?>

    </div>
</div>
<script>
    const carousel = new bootstrap.Carousel('#carouselBenefits')
</script>
