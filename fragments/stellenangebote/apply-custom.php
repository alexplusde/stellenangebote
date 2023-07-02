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
    
    $yform = new rex_yform();
    
			$yform->setObjectparams('form_name', 'table-rex_stellenangebote_apply_custom');
			$yform->setObjectparams('form_action', rex_getUrl(rex_article::getCurrentId())."?action=sent#apply_custom");
			$yform->setObjectparams('form_ytemplate', 'bootstrap5,bootstrap');
			$yform->setObjectparams('form_showformafterupdate', 0);
			$yform->setObjectparams('real_field_names', true);

			$yform->setValueField('html', ['', '<div class="row">']);
			$yform->setValueField('html', ['', '<div class="col col-12 col-md-6">']);

			# Ausfüllbare Felder
			$yform->setValueField('fieldset', ['fieldset_job','Mir ist wichtig im Job, dass ...','','onlyopen']);
			$yform->setValueField('choice', ['job_question_1','...ich meine Arbeitszeit genau planen kann.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['job_question_2','... ich meine Arbeitsschwerpunkte selbst bestimmen kann.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['job_question_3','... ich während der Arbeit flexibel familiäre Aufgaben berücksichtigen kann.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['job_question_4','...mein Gehalt mit der Betriebszugehörigkeit steigt.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['job_question_5','... das Unternehmen auf meine Gesundheit achtet.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('fieldset', ['fieldset_job_close','','','onlyclose']);
			$yform->setValueField('fieldset', ['fieldset_personal','Es ist mir persönlich ein wichtiger Wert, dass ...','','onlyopen']);
			$yform->setValueField('choice', ['personal_question_1','...meine Arbeit mir Spaß macht.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['personal_question_2','... ich anderen Menschen durch meine Arbeit helfen kann.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['personal_question_3','... ich stets aus unterschiedlichen Aufgaben selbständig auswählen kann.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['personal_question_4','...meine Arbeit mich herausfordert und mir Chancen zur beruflichen Weiterentwicklung bietet.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('choice', ['personal_question_5','... ich tolerant gegenüber vielen verschiedenen Menschen und gesellschaftlichen Gruppen bin.','sehr wichtig=2,wichtig=1,teils teils=0,eher unwichtig=-1,sehr unwichtig=-2','1','0','','','','','','','','','0']);
			$yform->setValueField('fieldset', ['fieldset_personal_close','','','onlyclose']);

			$yform->setValueField('html', ['', '</div><div class="col col-12 col-md-6">']);

			$yform->setValueField('fieldset', ['fieldset_personal_custom','Was ist Ihnen im Leben noch wichtig, was wir hier nicht berücksichtigt haben?','','onlyopen']);
			$yform->setValueField('textarea', ['personal_custom','Mir ist im Leben wichtig...','','0','{"placeholder":"Mir ist im Leben wichtig..."}']);
			$yform->setValueField('fieldset', ['fieldset_personal_custom_close','','','onlyclose']);
			$yform->setValueField('fieldset', ['fieldset_contact','Wie dürfen wir uns bei Ihnen melden, um uns bei Ihnen zu Bewerben? Eine E-Mail-Adresse ist für uns am einfachsten.','','onlyopen']);
			$yform->setValueField('textarea', ['contact','Kontakt','','0','{"placeholder":"max@mustermann.de, ..."}']);
			$yform->setValueField('fieldset', ['fieldset_contact_close','','','onlyclose']);
			$yform->setValueField('fieldset', ['fieldset_work_area','Welches Arbeitsgebiet interessiert Sie bei uns?','','onlyopen']);
			$yform->setValueField('choice', ['workarea','Arbeitsgebiet','Kindertagesstätte=1,Essen auf Rädern=2,Ambulante Pflege von Senioren=3,Verwaltung=4','1','1','','','','','','','','','0']);
			$yform->setValueField('fieldset', ['fieldset_work_area_close','','','onlyclose']);

			$yform->setValueField('privacy_policy', ['privacy_policy','Datenschutzerklärung','1','','','','Ich habe die Datenschutzerklärung zur Kenntnis genommen. Ich stimme zu, dass meine Angaben und Daten zur Beantwortung meiner Anfrage elektronisch erhoben und gespeichert werden.','Mehr erfahren','30']);

			$yform->setValueField('html', ['', '</div>']);
			$yform->setValueField('html', ['', '</div>']);
            
			$yform->setValueField('submit', ['submit','Absenden','','no_db']);

			# E-Mail-Versand
			$yform->setActionField('tpl2email', array('stellenangebote_apply_confirm','email'));
			$yform->setActionField('tpl2email', array('stellenangebote_apply',$this->getVar("client_email")));
			$yform->setValueField('spam_protection', array("honeypot","Bitte nicht ausfüllen.","Ihre Anfrage wurde als Spam erkannt und gelöscht. Bitte versuchen Sie es in einigen Minuten erneut oder wenden Sie sich persönlich an uns.", 0));
			$yform->setActionField('showtext', array('','<div class="apply_success">'.$this->getVar("success").'</div>'));
    
			# Weiterleitung nach erfolgreichem Versand
			# $yform->setActionField('redirect', array($this->getVar("thank_you_url")));


			echo $yform->getForm();
			?>
		</div>
	</div>
</div>
