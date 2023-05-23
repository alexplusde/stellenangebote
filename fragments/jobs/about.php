
<div class="module job-detail-about-company bg-primary text-white">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h2 class="job-detail-about-company-headline">Über <?= rex_config::get('stellenangebote', 'company_name') ?></h2>
                <div class="job-detail-about-company-subline">Kurz und knapp, alles über uns!</div>
            </div>
        </div>
        <div class="job-detail-about-company-text row">
            <div class="col-md-10 offset-md-1">
                <div>
                    <?= rex_config::get('stellenangebote', 'company_text') ?>
                </div>
            </div>
        </div>
    </div>
</div>
