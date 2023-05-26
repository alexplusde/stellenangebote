<div class="module job-form-apply bg-white">
	<div class="container p-4">
		<h2>Jetzt bewerben</h2>
		<div class="row">
			<div class="col col-md-10 offset-md-1 form-wrapper">
				<a class="scrollto" id="formwrapperapply"></a>
				<?php

                $yform = new rex_yform();

				$yform->setObjectparams('form_name', 'table-rex_stellenangebote_apply');
				$yform->setObjectparams('form_action', rex_getUrl(rex_article::getCurrentId()) . "?action=sent#apply");
				$yform->setObjectparams('form_ytemplate', 'bootstrap');
				$yform->setObjectparams('form_showformafterupdate', 0);
				$yform->setObjectparams('real_field_names', true);

				$yform->setValueField('html', ['', '<div class="row">']);
				$yform->setValueField('html', ['', '<div class="col col-md-6">']);

				# Ausfüllbare Felder
				$yform->setValueField('text', ['name', 'Name', '', '', '{"required":"required"}']);
				$yform->setValidateField('empty', ['name', 'Bitte geben Sie einen Namen an.']);
				$yform->setValueField('text', ['phone', 'Telefonnummer', '', '0', '{"type":"phone"}']);
				$yform->setValueField('text', ['email', 'E-Mail-Adresse', '', '0', '{"type":"email"}', 'Geben Sie eine Telefonnummer oder eine E-Mail-Adresse an.']);
				$yform->setValueField('choice', ['availability', 'Wann sind Sie am besten erreichbar?', '###morgens###=morgens,###mittags###=mittags,###nachmittags###=nachmittags,###abends###=abends', '1', '1', '', '', '', '', '', '', '', '', '0']);

				$yform->setValueField('html', ['', '</div><div class="col col-md-6">']);

				$yform->setValueField('upload', ['upload1', 'Anhang 1', '0,8000', '.jpg,.png,.pdf', '', 'Dateigröße unterschritten.,Dateigröße überschritten.,Bitte speichern Sie Ihren Anhang als PDF-Datei.,Bitte wählen Sie eine Datei aus.,Der Anhang wurde gelöscht.', 'Zulässige Dateitypen: JPG, PNG, PDF.']);
				$yform->setValueField('upload', ['upload2', 'Anhang 2', '0,8000', '.jpg,.png,.pdf', '', 'Dateigröße unterschritten.,Dateigröße überschritten.,Bitte speichern Sie Ihren Anhang als PDF-Datei.,Bitte wählen Sie eine Datei aus.,Der Anhang wurde gelöscht.', 'Zulässige Dateitypen: JPG, PNG, PDF.']);
				$yform->setValueField('upload', ['upload3', 'Anhang 3', '0,8000', '.jpg,.png,.pdf', '', 'Dateigröße unterschritten.,Dateigröße überschritten.,Bitte speichern Sie Ihren Anhang als PDF-Datei.,Bitte wählen Sie eine Datei aus.,Der Anhang wurde gelöscht.', 'Zulässige Dateitypen: JPG, PNG, PDF.']);
				$yform->setValueField('textarea', ['message', 'Nachricht', '', '']);

				$yform->setValueField('html', ['', '</div>']);
				$yform->setValueField('html', ['', '</div>']);

				# Parameter zur Übergabe an das E-Mail-Template
				$yform->setValueField('hidden', ["title", $this->getVar("title"), null, "no_db"]);
				$yform->setValueField('hidden', ["stellenangebote_name", $this->getVar("stellenangebote_name"), null, "no_db"]);
				$yform->setValueField('hidden', ["stellenangebote_email", $this->getVar("stellenangebote_email"), null, "no_db"]);
				$yform->setValueField('hidden', ["stellenangebote_signature", $this->getVar("stellenangebote_signature"), null, "no_db"]);
				$yform->setValueField('hidden', ["client_name", $this->getVar("client_name"), null, "no_db"]);
				$yform->setValueField('hidden', ["client_email", $this->getVar("client_email"), null, "no_db"]);
				$yform->setValueField('hidden', ["client_company", $this->getVar("client_company"), null, "no_db"]);
				$yform->setValueField('hidden', ["client_signature", $this->getVar("client_signature"), null, "no_db"]);


				$yform->setValueField('html', ['', '<div class="pt-4 float-end">']);
				$yform->setValueField('submit_once', ['submit', 'Absenden', 'Bitte warten']);

				$yform->setValueField('html', ['', '</div>']);
				# E-Mail-Versand
				$yform->setActionField('tpl2email', array('stellenangebote_apply_confirm', 'email'));
				$yform->setActionField('attach', array('upload1,upload2,upload3'));
				$yform->setActionField('tpl2email', array('stellenangebote_apply', $this->getVar("client_email")));
				$yform->setValueField('spam_protection', array("honeypot", "Bitte nicht ausfüllen.", "Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));
				$yform->setActionField('showtext', array('', '<div class="apply_success">' . $this->getVar("success") . '</div>'));

				# Weiterleitung nach erfolgreichem Versand
				# $yform->setActionField('redirect', array($this->getVar("thank_you_url")));


				echo $yform->getForm();
				?>
			</div>
		</div>
	</div>
</div>
