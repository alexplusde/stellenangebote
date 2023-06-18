<div class="modul apply apply-corporate-value" tabindex="0">
	<div class="container">
		<div class="apply-title">
			<h2 class="apply-title-headline text-center">Wir bewerben uns bei Ihnen!</h2>
			<div class="apply-title-title-subline text-center">
				<p>Sie möchten sich mit Ihren individuellen Stärken und Ihrer Persönlichkeit vorstellen? Sie wissen,
					womit Sie bei uns punkten möchten und was Ihnen wichtig ist? Erzählen Sie uns davon...</p>
			</div>
		</div>

		<div class="form-wrapper">
			<a class="scrollto" id="apply"></a>
			<?php
    

            $stellenangebot = $this->getVar('stellenangebot');
			$contact = $stellenangebot->getContact();
			$yform = new rex_yform();
    
			$yform->setObjectparams('form_name', 'table-rex_stellenangebote_apply');
			$yform->setObjectparams('form_action', rex_getUrl(rex_article::getCurrentId())."?action=sent#apply");
			$yform->setObjectparams('form_ytemplate', 'bootstrap');
			$yform->setObjectparams('form_showformafterupdate', 0);
			$yform->setObjectparams('real_field_names', true);

			# Ausfüllbare Felder
			$yform->setValueField('text', ['name','Name','','','{"required":"required"}']);
			$yform->setValidateField('empty', ['name','Bitte geben Sie einen Namen an.']);
			$yform->setValueField('text', ['phone','Telefonnummer','','0','{"type":"phone"}']);
			$yform->setValueField('text', ['email','E-Mail-Adresse','','0','{"type":"email"}','Geben Sie eine Telefonnummer oder eine E-Mail-Adresse an.']);
			# $yform->setValueField('choice', ['availability','Wann sind Sie am besten erreichbar?','###morgens###=morgens,###mittags###=mittags,###nachmittags###=nachmittags,###abends###=abends','1','1','','','','','','','','','0']);
			$yform->setValueField('textarea', ['message','Nachricht','','']);

			# Parameter zur Übergabe an das E-Mail-Template
			$yform->setValueField('hidden', ["title", $this->getVar("title"), null, "no_db"]);
			$yform->setValueField('hidden', ["stellenangebote_id", $stellenangebot->getId(), null, "no_db"]);
			$yform->setValueField('hidden', ["stellenangebote_name", $stellenangebot->getName(), null, "no_db"]);
			if($contact) {
			    $yform->setValueField('hidden', ["stellenangebote_email", $stellenangebot->getContact()->getMail(), null, "no_db"]);
			}
			$yform->setValueField('hidden', ["stellenangebote_signature", $this->getVar("stellenangebote_signature"), null, "no_db"]);

			$yform->setValueField('submit_once', ['submit','Absenden','Bitte warten...']);

			# E-Mail-Versand
			$yform->setActionField('tpl2email', array('stellenangebote_apply_confirm','email'));
			$yform->setActionField('attach', array('upload1,upload2,upload3'));
			$yform->setActionField('tpl2email', array('stellenangebote_apply',$this->stellenangebot->getContact()->getMail()));
			$yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));
    
			$yform->setActionField('redirect', array(rex_config::get('stellenangebote', 'thank_you_id')));

			echo $yform->getForm();
			?>
		</div>
	</div>
</div>
