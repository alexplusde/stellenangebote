<div class="form-wrapper">
	<a class="scrollto" id="formwrapperapply"></a>
	<?php
    $dataset = rex_yform_manager_dataset::create('rex_stellenangebote_apply');
	$yform = $dataset->getForm();
	$yform->setObjectparams('form_action', rex_getUrl(rex_article::getCurrentId())."?action=sent#apply");

	$yform->setValueField('hidden', ["title", $this->getVar("title"), null, "no_db"]);
	$yform->setValueField('hidden', ["stellenangebote_name", $this->getVar("stellenangebote_name"), null, "no_db"]);
	$yform->setValueField('hidden', ["stellenangebote_email", $this->getVar("stellenangebote_email"), null, "no_db"]);
	$yform->setValueField('hidden', ["stellenangebote_signature", $this->getVar("stellenangebote_signature"), null, "no_db"]);
	$yform->setValueField('hidden', ["client_name", $this->getVar("client_name"), null, "no_db"]);
	$yform->setValueField('hidden', ["client_email", $this->getVar("client_email"), null, "no_db"]);
	$yform->setValueField('hidden', ["client_company", $this->getVar("client_company"), null, "no_db"]);
	$yform->setValueField('hidden', ["client_signature", $this->getVar("client_signature"), null, "no_db"]);

	$yform->setActionField('tpl2email', array('stellenangebote_apply_confirm','email'));
	$yform->setActionField('attach', array('upload1,upload2,upload3'));
	$yform->setActionField('tpl2email', array('stellenangebote_apply',$this->getVar("client_email")));
	$yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));
	$yform->setActionField('showtext', array('','<div class="apply_success">'.$this->getVar("success").'</div>'));
	# $yform->setActionField('redirect', array($this->getVar("thank_you_url")));

	echo $dataset->executeForm($yform);
	?>
</div>