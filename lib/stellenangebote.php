<?php 
class stellenangebote extends \rex_yform_manager_dataset {
	
    /* Titel */
    /** @api */
    public function getTitle() : ?string {
        return $this->getValue("title");
    }
    /** @api */
    public function setTitle(mixed $value) : self {
        $this->setValue("title", $value);
        return $this;
    }

    /* Untertitel */
    /** @api */
    public function getSubtitle() : ?string {
        return $this->getValue("subtitle");
    }
    /** @api */
    public function setSubtitle(mixed $value) : self {
        $this->setValue("subtitle", $value);
        return $this;
    }

    /* Hervorheben? */
    /** @api */
    public function getFeatured(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("featured");
        }
        return $this->getValue("featured");
    }
    /** @api */
    public function setFeatured(int $value = 1) : self {
        $this->setValue("featured", $value);
        return $this;
    }
            
    /* Titelbild */
    /** @api */
    public function getImage(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }
    /** @api */
    public function setImage(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("image", $filename);
        }
        return $this;
    }
            
    /* Intro-Video */
    /** @api */
    public function getVideo(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("video"));
        }
        return $this->getValue("video");
    }
    /** @api */
    public function setVideo(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("video", $filename);
        }
        return $this;
    }
            
    /* Teaser */
    /** @api */
    public function getTeaser(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("teaser"));
        }
        return $this->getValue("teaser");
    }
    /** @api */
    public function setTeaser(mixed $value) : self {
        $this->setValue("teaser", $value);
        return $this;
    }
            
    /* Art */
    /** @api */
    public function getEmploymentType() : ?string {
        return $this->getValue("employment_type");
    }
    /** @api */
    public function setEmploymentType(mixed $value) : self {
        $this->setValue("employment_type", $value);
        return $this;
    }

    /* 100% Home Office */
    /** @api */
    public function getTelecommute(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("telecommute");
        }
        return $this->getValue("telecommute");
    }
    /** @api */
    public function setTelecommute(int $value = 1) : self {
        $this->setValue("telecommute", $value);
        return $this;
    }
            
    /* Vorteile */
    /** @api */
    public function getBenefits() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("benefits");
    }

    /* Status */
    /** @api */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(mixed $param) : mixed {
        $this->setValue("status", $param);
        return $this;
    }

    /* Ansprechperson */
    /** @api */
    public function getContact() : ?stellenangebote_contact {
        return $this->getRelatedDataset("contact");
    }

    /* Standorte */
    /** @api */
    public function getLocation() : ?rex_yform_manager_dataset {
        return $this->getRelatedDataset("location");
    }

    /* Kategorie */
    /** @api */
    public function getCategoryId() : ?int {
        return $this->getRelatedDataset("category_id")->getId();
    }

    /* Bewerbungsfrist */
    /** @api */
    public function getValidThrough() : ?\DateTime {
        return $this->getValue("valid_through");
    }
    /** @api */
    public function setValidThrough(mixed $value) : self {
        $this->setValue("valid_through", $value);
        return $this;
    }

    /* Weiterleiten */
    /** @api */
    public function getArticleId(bool $asArticle = false) : ?rex_article {
        return rex_article::get($this->getValue("article_id"));
    }
    public function getArticleIdId() : ?int {
        return $this->getValue("article_id");
    }
    public function getArticleIdUrl() : ?string {
        if($article = $this->getArticleId()) {
            return $article->getUrl();
        }
    }
    /** @api */
    public function setArticleId(string $id) : self {
        if(rex_article::get($id)) {
            $this->getValue("article_id", $id);
        }
        return $this;
    }

    /* Bewerbungsformular anzeigen */
    /** @api */
    public function getDirectApply(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("direct_apply");
        }
        return $this->getValue("direct_apply");
    }
    /** @api */
    public function setDirectApply(int $value = 1) : self {
        $this->setValue("direct_apply", $value);
        return $this;
    }
            
    /* Beschreibung (Aufgaben) */
    /** @api */
    public function getDescription(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }
    /** @api */
    public function setDescription(mixed $value) : self {
        $this->setValue("description", $value);
        return $this;
    }
            
    /* Beschreibung (Profil) */
    /** @api */
    public function getProfile(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("profile"));
        }
        return $this->getValue("profile");
    }
    /** @api */
    public function setProfile(mixed $value) : self {
        $this->setValue("profile", $value);
        return $this;
    }
            
    /* zuletzt geändert */
    /** @api */
    public function getUpdatedate() : ?string {
        return $this->getValue("updatedate");
    }
    /** @api */
    public function setUpdatedate(string $value) : self {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /* Erstelldatum */
    /** @api */
    public function getCreatedate() : ?string {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreatedate(string $value) : self {
        $this->setValue("createdate", $value);
        return $this;
    }
    /**
     * @deprecated This method is deprecated and will be removed in future versions.
     */
    public function getDatePosted(): string
    {
        return $this->getValue('createdate');
    }

    /**
     * @deprecated This method is deprecated and will be removed in future versions.
     */
    public function getDatePostedFormatted(): string
    {
        return $this->getValue('createdate');
    }
    /**
     * @deprecated This method is deprecated and will be removed in future versions.
     */
    public function getValidThroughFormatted(): string
    {
        return $this->getValue('valid_through');
    }
    
    public function getEmploymentTypeFormatted(): string
    {
        $options_selected = explode(",", $this->getValue('employment_type'));

        $options = \rex_yform_value_choice::getListValues([
            'field'  => 'employment_type',
            'params' => ['field' => $this->getTable()->getValueField('employment_type')],
        ]);

        $labels_selected = [];

        foreach($options_selected as $selected) {
            $labels_selected[] = $options[$selected];
        }
        return implode(", ", $labels_selected);
    }
    public function jobLocationType(): string
    {
        return $this->getValue('telecommute');
    }

    public function getLocations() : ?rex_yform_manager_collection
    {
        return  $this->getRelatedCollection('location');
    }

    public function getLocationNames()
    {
        $location_list = [];

        foreach($this->getLocations() as $location) {
            /** @var stellenangebot_collection $location */
            $location_list[] =  $location->getLocality();
        };
        return implode(", ", $location_list);
    }

    public function getApplyForm()
    {
        $fragment = new rex_fragment();
        return $fragment->parse('stellenangebote/apply.php');
    }

    public static function getByArticleId($id): ?rex_yform_manager_dataset
    {
        return self::query()->where('article_id', $id)->findOne();
    }

    public function getUrl(): string
    {
        if ($this->getValue('article_id')) {
            return rex_yrewrite::getFullUrlByArticleId($this->getValue('article_id'));
        }
        return rex_yrewrite::getFullUrlByArticleId();
    }

    public function getCategory(): ?stellenangebote_category
    {
        return $this->getRelatedDataset('category_id');
    }
    public function getCategoryName(): string
    {
        return $this->getCategory()->getName();
    }
    public function getCategoryIcon(): string
    {
        return $this->getCategory()->getIcon();
    }

    public static function addContentPage()
    {

        rex_extension::register('PAGES_PREPARED', function () {
            $page = new rex_be_page('stellenangebote', rex_i18n::msg('stellenangebote_content_page_title'));
            $page->setPjax(false);
            $page->setSubPath(rex_addon::get('stellenangebote')->getPath('pages/content.form.php'));
            $page_controller = rex_be_controller::getPageObject('content');
            $page->setItemAttr('class', "pull-left");
            $page_controller->addSubpage($page);
        });
    }

    public static function findOnline($limit = 6): ?rex_yform_manager_collection
    {

        return stellenangebote::query()->where("status", 1, '>=')->limit($limit)->find();

    }

    public function getShareMailHref(): string
    {
        return 'mailto:?subject=' . urlencode(rex_article::getCurrent()->getName()) . '&body=' . urlencode($this->getUrl()) . '%0AIst%20diese%20Stelle%20f%C3%BCr%20dich%20interessant?';
    }
    public function getShareFacebookHref(): string
    {
        return "https://www.facebook.com/sharer/sharer.php?u=" . $this->getUrl();
    }
    public function getShareLinkedInHref(): string
    {
        return "https://www.linkedin.com/sharing/share-offsite/?url=" . $this->getUrl();
    }
    public function getShareTwitterHref(): string
    {
        return "";
    }

    public function getShareWhatsAppHref(): string
    {
        return "https://api.whatsapp.com/send?text=" . urlencode($this->getUrl());
    }

    public function getBenefitsIds(): string
    {
        return $this->getValue('benefits');
    }

    public static function getConfig($key = ""): mixed
    {
        return rex_config::get('stellenangebote', $key);
    }

    public static function setConfig($key = "", $value): mixed
    {
        return rex_config::set('stellenangebote', $key, $value);
    }
    
}
