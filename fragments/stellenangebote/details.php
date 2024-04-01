<?php
$Stellenangebot = $this->getVar('stellenangebot');
?>

<div id="stellenangebote-details" class="module stellenangebote-details">
	<!-- Intro -->
	<?= $this->subfragment('/stellenangebote/details-intro.php'); ?>

	<!-- Breadcrumbs -->
	<?php # $this->subfragment('/stellenangebote/details-breadcrumbs.php');?>

	<!-- Intro -->
	<?= $this->subfragment('/stellenangebote/details-description.php'); ?>

	<!-- Benefits -->
	<?= $this->subfragment('/stellenangebote/details-benefits.php'); ?>

	<!-- About -->
	<?= $this->subfragment('/stellenangebote/about.php'); ?>

	<!-- Opt. Ansprechperseon -->
	<?php
        if($Stellenangebot->getContact()) {
            echo $this->subfragment('/stellenangebote/details-contact.php');
        }
?>

	<!-- Opt.: Bewerberformular -->
	<?php
if($Stellenangebot->getDirectApply()) {
    echo $this->subfragment('/stellenangebote/apply.php');
}
?>

</div>
