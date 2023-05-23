<?php
$stellenangebot = $this->getVar('stellenangebot');
?>

<div id="job-details" class="module job-details">
		<!-- Intro -->
		<?= $this->subfragment('/jobs/details-intro.php'); ?>

		<!-- Breadcrumbs -->
		<?php # $this->subfragment('/jobs/details-breadcrumbs.php'); ?>

		<!-- Intro -->
		<?= $this->subfragment('/jobs/details-description.php'); ?>

		<!-- Benefits -->
		<?= $this->subfragment('/jobs/details-benefits.php'); ?>

		<!-- About -->
		<?= $this->subfragment('/jobs/about.php'); ?>

		<!-- Opt. Ansprechperseon -->
		<?php
		if($stellenangebot->getContact()) {
			echo $this->subfragment('/jobs/details-contact.php');
		}
		?>

		<!-- Opt.: Bewerberformular -->
		<?php
		if($stellenangebot->getDirectApply()) {
			echo $this->subfragment('/stellenangebote/apply.php');
		}
		?>

</div>
