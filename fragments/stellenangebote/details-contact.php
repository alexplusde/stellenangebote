<?php
$stellenangebot = $this->getVar('stellenangebot');
$contact = $stellenangebot->getContact();
?>
<div class="module job-detail-contact in-view-element in-view-in-animation" tabindex="0">
    <div class="container-fluid">
        <div class="bg-body-secondary row shadow-sm">
            <div class="job-detail-infoboard-image order-2 col-lg-5 order-lg-1 col-xl-4"><?php if ($media = rex_media_plus::get($contact->getPhoto())) { echo $media->getImg(); } ?></div>
            <div class="job-detail-infoboard-content col-10 order-1 offset-1 col-lg-5 order-lg-2 col-xl-6">
                <div class="row">
                    <div class="col-12 col-lg-6 p-4">
                        <div class="job-detail-infoboard-content-headline"><strong>Wir geben der digitalen Fashionwelt ein Gesicht. Und freuen uns dabei auf Deins!</strong></div>
                        <p class="job-detail-infoboard-content-text">Wir wollen Dir und Deinen mutigen Ideen die perfekte Bühne bieten, um gemeinsam mehr möglich zu machen. Gib uns mehr Grrr! Weniger Miau! Lass raus, was in Dir steckt und schick uns Deine überzeugenden Unterlagen.</p>

                        <p class="job-detail-infoboard-content-text-question"><strong>Noch Fragen?</strong></p>
                        <div class="job-detail-infoboard-content-text-identiy"><?= $contact->getName() ?></div>
                        <div class="job-detail-infoboard-content-text-identiy"><?= $contact->getPhone() ?></div>
                        <div class="job.detail-body-infoboard-content-text-identiy"><a href="<?= $contact->getMail() ?>"><?= $contact->getMail() ?></a></div>
                        </div>
                        <div class="col-12 col-lg-5 offset-lg-1 p-4"><strong class="job-detail-infoboard-content-headline">Unsere Heimat - und vielleicht bald auch Deine:</strong>
                            <address class="job-detail-infoboard-content-text">bonprix Handelsgesellschaft mbH<br>Haldesdorfer Straße 61<br>22179 Hamburg</address><a class="job-detail-infoboard-content-link" href="http://maps.google.de/maps?q=Haldesdorfer Straße 61, 22179 Hamburg" target="_blank" rel="noreferrer noopener">Auf Karte anzeigen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
