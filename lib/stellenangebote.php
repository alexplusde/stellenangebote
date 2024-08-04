<?php 

namespace FriendsOfRedaxo\Stellenangebote;

use rex_article;
use rex_addon;
use rex_config;
use rex_fragment;
use rex_media;
use rex_yrewrite;


/**
 * Klasse stellenangebote
 * 
 * Diese Klasse erweitert die rex_yform_manager_dataset Klasse und repräsentiert ein einzelnes Stellenangebot in der Datenbank.
 * Sie enthält Methoden zum Abrufen und Setzen des Titels eines Stellenangebots.
 * 
 * Beispiel:
 * $stellenangebot = stellenangebote::get(1);
 * if ($stellenangebot) {
 *     echo $stellenangebot->getTitle();
 * }
 * 
 */

class Entry extends \rex_yform_manager_dataset {
    
    /**
     * Gibt den Titel des Stellenangebots zurück.
     *
     * @return string|null Der Titel des Stellenangebots oder null, wenn kein Titel gesetzt ist.
     */
    public function getTitle() : ?string {
        return $this->getValue("title");
    }

    /**
     * Setzt den Titel des Stellenangebots.
     *
     * @param mixed $value Der neue Titel des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setTitle(mixed $value) : self {
        $this->setValue("title", $value);
        return $this;
    }

    /**
     * Gibt den Untertitel des Stellenangebots zurück.
     *
     * @return string|null Der Untertitel des Stellenangebots oder null, wenn kein Untertitel gesetzt ist.
     */
    public function getSubtitle() : ?string {
        return $this->getValue("subtitle");
    }

    /**
     * Setzt den Untertitel des Stellenangebots.
     *
     * @param mixed $value Der neue Untertitel des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setSubtitle(mixed $value) : self {
        $this->setValue("subtitle", $value);
        return $this;
    }

    /**
     * Gibt den Hervorhebungsstatus des Stellenangebots zurück.
     *
     * @param bool $asBool Wenn true, wird der Hervorhebungsstatus als boolscher Wert zurückgegeben.
     * @return mixed Der Hervorhebungsstatus des Stellenangebots.
     */
    public function getFeatured(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("featured");
        }
        return $this->getValue("featured");
    }

    /**
     * Setzt den Hervorhebungsstatus des Stellenangebots.
     *
     * @param int $value Der neue Hervorhebungsstatus des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setFeatured(int $value = 1) : self {
        $this->setValue("featured", $value);
        return $this;
    }
            
    /**
     * Gibt das Titelbild des Stellenangebots zurück.
     *
     * @param bool $asMedia Wenn true, wird das Titelbild als rex_media Objekt zurückgegeben.
     * @return mixed Das Titelbild des Stellenangebots.
     */
    public function getImage(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }

    /**
     * Setzt das Titelbild des Stellenangebots.
     *
     * @param string $filename Der Dateiname des neuen Titelbilds.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setImage(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->setValue("image", $filename);
        }
        return $this;
    }
            
    /**
     * Gibt das Intro-Video des Stellenangebots zurück.
     *
     * @param bool $asMedia Wenn true, wird das Video als rex_media Objekt zurückgegeben.
     * @return mixed Das Intro-Video des Stellenangebots.
     */
    public function getVideo(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("video"));
        }
        return $this->getValue("video");
    }

    /**
     * Setzt das Intro-Video des Stellenangebots.
     *
     * @param string $filename Der Dateiname des neuen Videos.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setVideo(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->setValue("video", $filename);
        }
        return $this;
    }
            
    /**
     * Gibt den Teaser des Stellenangebots zurück.
     *
     * @param bool $asPlaintext Wenn true, wird der Teaser als reiner Text ohne HTML-Tags zurückgegeben.
     * @return string|null Der Teaser des Stellenangebots oder null, wenn kein Teaser gesetzt ist.
     */
    public function getTeaser(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("teaser"));
        }
        return $this->getValue("teaser");
    }

    /**
     * Setzt den Teaser des Stellenangebots.
     *
     * @param mixed $value Der neue Teaser des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setTeaser(mixed $value) : self {
        $this->setValue("teaser", $value);
        return $this;
    }
            
    /**
     * Gibt die Art des Stellenangebots zurück, z.B. Vollzeit, Teilzeit, Praktikum o.ä.
     *
     * @return string|null Die Art des Stellenangebots oder null, wenn keine Art gesetzt ist.
     */
    public function getEmploymentType() : ?string {
        return $this->getValue("employment_type");
    }

    /**
     * Setzt die Art des Stellenangebots, z.B. Vollzeit, Teilzeit, Praktikum o.ä.
     *
     * @param mixed $value Die neue Art des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setEmploymentType(mixed $value) : self {
        $this->setValue("employment_type", $value);
        return $this;
    }

    /**
     * Gibt an, ob die Stelle als 100% Home-Office (Remote Office) verfügbar ist.
     *
     * @param bool $asBool Wenn true, wird der Home-Office-Status als boolscher Wert zurückgegeben.
     * @return mixed Der Home-Office-Status des Stellenangebots.
     */
    public function getTelecommute(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("telecommute");
        }
        return $this->getValue("telecommute");
    }

    /**
     * Setzt den Home-Office-Status des Stellenangebots.
     *
     * @param int $value Der neue Home-Office-Status des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setTelecommute(int $value = 1) : self {
        $this->setValue("telecommute", $value);
        return $this;
    }
            
    /**
     * Gibt die Vorteile des Stellenangebots zurück.
     *
     * @return rex_yform_manager_collection|null Die Vorteile des Stellenangebots oder null, wenn keine Vorteile gesetzt sind.
     */
    public function getBenefits() : ?\rex_yform_manager_collection {
        return $this->getRelatedCollection("benefits");
    }

    /**
     * Gibt den Status des Stellenangebots zurück.
     *
     * @return mixed Der Status des Stellenangebots.
     */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }

    /**
     * Setzt den Status des Stellenangebots.
     *
     * @param mixed $param Der neue Status des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setStatus(mixed $param) : self {
        $this->setValue("status", $param);
        return $this;
    }

    /**
     * Gibt die Ansprechperson für das Stellenangebot als Dataset zurück.
     *
     * @return stellenangebote_contact|null Die Ansprechperson für das Stellenangebot oder null, wenn keine Ansprechperson gesetzt ist.
     */
    public function getContact() : ?Contact {
        return $this->getRelatedDataset("contact");
    }

    /**
     * Gibt den Standort des Stellenangebots als Dataset zurück.
     *
     * @return rex_yform_manager_dataset|null Der Standort des Stellenangebots oder null, wenn kein Standort gesetzt ist.
     */
    public function getLocation() : ?Location {
        return $this->getRelatedDataset("location");
    }

    /**
     * Gibt die Kategorie-ID des Stellenangebots zurück.
     *
     * @return int|null Die Kategorie-ID des Stellenangebots oder null, wenn keine Kategorie-ID gesetzt ist.
     */
    public function getCategoryId() : ?int {
        return $this->getRelatedDataset("category_id")->getId();
    }

    /**
     * Gibt die Bewerbungsfrist des Stellenangebots zurück.
     *
     * @return \DateTime|null Die Bewerbungsfrist des Stellenangebots oder null, wenn keine Bewerbungsfrist gesetzt ist.
     */
    public function getValidThrough() : ?\DateTime {
        return $this->getValue("valid_through");
    }

    /**
     * Setzt die Bewerbungsfrist des Stellenangebots.
     *
     * @param mixed $value Die neue Bewerbungsfrist des Stellenangebots.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setValidThrough(mixed $value) : self {
        $this->setValue("valid_through", $value);
        return $this;
    }

    /**
     * Gibt den REDAXO-Artikel zurück, auf den weitergeleitet wird.
     *
     * @param bool $asArticle Wenn true, wird der Artikel als rex_article Objekt zurückgegeben.
     * @return rex_article|null Der REDAXO-Artikel oder null, wenn kein Artikel gesetzt ist.
     */
    public function getArticle() : ?rex_article {
        return rex_article::get($this->getValue("article_id"));
    }

    /**
     * Gibt die ID des REDAXO-Artikels zurück, auf den weitergeleitet wird.
     *
     * @return int|null Die ID des REDAXO-Artikels oder null, wenn kein Artikel gesetzt ist.
     */
    public function getArticleId() : ?int {
        return $this->getValue("article_id");
    }

    /**
     * Gibt die URL des REDAXO-Artikels zurück, auf den weitergeleitet wird.
     *
     * @return string|null Die URL des REDAXO-Artikels oder null, wenn kein Artikel gesetzt ist.
     */
    public function getArticleUrl() : ?string {
        if($article = rex_article::get($this->getArticleId())) {
            return $article->getUrl();
        }
    }

    /**
     * Setzt den REDAXO-Artikel, auf den weitergeleitet wird.
     *
     * @param string $id Die ID des neuen REDAXO-Artikels.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setArticleId(string $id) : self {
        if(rex_article::get($id)) {
            $this->getValue("article_id", $id);
        }
        return $this;
    }

    /**
     * Gibt zurück, ob das Bewerbungsformular direkt angezeigt werden soll.
     *
     * @param bool $asBool Wenn true, wird der Status als boolscher Wert zurückgegeben.
     * @return mixed Der Status des Bewerbungsformulars.
     */
    public function getDirectApply(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("direct_apply");
        }
        return $this->getValue("direct_apply");
    }

    /**
     * Setzt den Status des Bewerbungsformulars, ob dieeses direkt angezeigt werden soll.
     *
     * @param int $value Der neue Status des Bewerbungsformulars.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setDirectApply(int $value = 1) : self {
        $this->setValue("direct_apply", $value);
        return $this;
    }
    /**
     * Gibt die Beschreibung der Aufgaben zurück.
     *
     * @param bool $asPlaintext Wenn true, wird die Beschreibung als reiner Text ohne HTML- oder Markdown-Tags zurückgegeben.
     * @return string|null Die Beschreibung der Aufgaben oder null, wenn keine Beschreibung gesetzt ist.
     */
    public function getDescription(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }

    /**
     * Setzt die Beschreibung der Aufgaben.
     *
     * @param mixed $value Die neue Beschreibung der Aufgaben.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setDescription(mixed $value) : self {
        $this->setValue("description", $value);
        return $this;
    }
    /**
     * Gibt die Beschreibung des Profils zurück.
     *
     * @param bool $asPlaintext Wenn true, wird die Beschreibung als reiner Text ohne HTML- oder Markdown-Tags zurückgegeben.
     * @return string|null Die Beschreibung des Profils oder null, wenn keine Beschreibung gesetzt ist.
     */
    public function getProfile(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("profile"));
        }
        return $this->getValue("profile");
    }

    /**
     * Setzt die Beschreibung des Profils.
     *
     * @param mixed $value Die neue Beschreibung des Profils.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setProfile(mixed $value) : self {
        $this->setValue("profile", $value);
        return $this;
    }
            
    /**
     * Gibt das Datum der letzten Änderung zurück.
     *
     * @return string|null Das Datum der letzten Änderung oder null, wenn kein Datum gesetzt ist.
     */
    public function getUpdatedate() : ?string {
        return $this->getValue("updatedate");
    }

    /**
     * Setzt das Datum der letzten Änderung.
     *
     * @param string $value Das neue Datum der letzten Änderung.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
    public function setUpdatedate(string $value) : self {
        $this->setValue("updatedate", $value);
        return $this;
    }

    /**
     * Gibt das Erstelldatum zurück.
     *
     * @return string|null Das Erstelldatum oder null, wenn kein Datum gesetzt ist.
     */
    public function getCreatedate() : ?string {
        return $this->getValue("createdate");
    }

    /**
     * Setzt das Erstelldatum.
     *
     * @param string $value Das neue Erstelldatum.
     * @return self Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.
     */
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
    
    /**
     * Gibt den Beschäftigungstyp formatiert zurück.
     *
     * @return string Der formatierte Beschäftigungstyp. Die einzelnen Typen sind durch Kommas getrennt.
     */
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

    /**
     * Gibt den Typ des Arbeitsortes zurück.
     *
     * @return string Der Typ des Arbeitsortes. Gibt 'telecommute' zurück, wenn die Arbeit remote ausgeführt wird.
     */
    public function jobLocationType(): string
    {
        return $this->getValue('telecommute');
    }

    /**
     * Gibt die Standorte zurück, an denen diese Stelle ausgeübt wird oder verfügbar ist.
     *
     * @return rex_yform_manager_collection|null Die Standorte oder null, wenn keine Standorte gesetzt sind.
     */
    public function getLocations() : ?\rex_yform_manager_collection
    {
        return  $this->getRelatedCollection('location');
    }

    /**
     * Gibt die Ortsnamen der Standorte als kommagetrennten Text zurück.
     *
     * @return string Die Namen der Standorte, getrennt durch Kommas.
     */
    public function getLocationNames()
    {
        $location_list = [];

        foreach($this->getLocations() as $location) {
            /** @var stellenangebot_collection $location */
            $location_list[] =  $location->getLocality();
        };
        return implode(", ", $location_list);
    }

    /**
     * Gibt das Bewerbungsformular zurück.
     *
     * @return string Das gerenderte HTML des Bewerbungsformulars.
     */
    public function getApplyForm()
    {
        $fragment = new rex_fragment();
        return $fragment->parse('stellenangebote/apply.php');
    }

    /**
     * Gibt das passende Stellenangebot für eine bestimmte Artikel-ID zurück.
     *
     * @param int $id Die Artikel-ID.
     * @return stellenangebote|null Das Stellenangebot oder null, wenn kein Stellenangebot für die gegebene Artikel-ID gefunden wurde.
     */
    public static function getByArticleId($id): ?Entry
    {
        return self::query()->where('article_id', $id)->findOne();
    }

    /**
     * Gibt die URL des Stellenangebots zurück.
     *
     * @return string Die URL des Stellenangebots. Wenn eine Artikel-ID gesetzt ist, wird die URL für diese Artikel-ID zurückgegeben. Andernfalls wird die Standard-URL zurückgegeben.
     */
    public function getUrl(): string
    {
        if(rex_addon::get('yrewrite')->isAvailable()) {
            if ($this->getValue('article_id')) {
                return rex_yrewrite::getFullUrlByArticleId($this->getValue('article_id'));
            }
            return rex_yrewrite::getFullUrlByArticleId();
        }
        /* To Do: URL per URL-Addon ausgeben */
        return "";
    }
    /**
     * Gibt die Kategorie des Stellenangebots zurück.
     *
     * @return stellenangebote_category|null Die Kategorie des Stellenangebots oder null, wenn keine Kategorie gesetzt ist.
     */
    public function getCategory(): ?Category
    {
        return $this->getRelatedDataset('category_id');
    }

    /**
     * Gibt den Namen der Kategorie des Stellenangebots zurück.
     *
     * @return string Der Name der Kategorie des Stellenangebots.
     */
    public function getCategoryName(): string
    {
        return $this->getCategory()->getName();
    }

    /**
     * Gibt das Icon der Kategorie des Stellenangebots zurück.
     *
     * @return string Das Icon der Kategorie des Stellenangebots.
     */
    public function getCategoryIcon(): string
    {
        return $this->getCategory()->getIcon();
    }

    /**
     * Fügt einem Artikel die Möglichkeit hinzu, Stellenangebote zuzuordnen.
     *
     * Diese Methode registriert eine Erweiterung, die eine neue Backend-Seite hinzufügt, wenn die Seiten vorbereitet werden.
     */
    public static function addContentPage()
    {
        \rex_extension::register('PAGES_PREPARED', function () {
            $page = new \rex_be_page('stellenangebote', \rex_i18n::msg('stellenangebote_content_page_title'));
            $page->setPjax(false);
            $page->setSubPath(rex_addon::get('stellenangebote')->getPath('pages/content.form.php'));
            $page_controller = \rex_be_controller::getPageObject('content');
            $page->setItemAttr('class', "pull-left");
            $page_controller->addSubpage($page);
        });
    }

    /**
     * Findet online verfügbare Stellenangebote.
     *
     * @param int $limit Die maximale Anzahl der zurückgegebenen Stellenangebote. Standardmäßig ist dieser Wert auf 6 gesetzt.
     * @return rex_yform_manager_collection|null Eine Sammlung von Stellenangeboten oder null, wenn keine Stellenangebote gefunden wurden.
     */
    public static function findOnline($limit = 6): ?\rex_yform_manager_collection
    {
        return Entry::query()->where("status", 1, '>=')->limit($limit)->find();
    }    
    
    /**
     * Gibt die URL für das Teilen der Stelle per E-Mail zurück.
     *
     * @return string Die URL für das Teilen der Stelle per E-Mail.
     */
    public function getShareMailHref(): string
    {
        return 'mailto:?subject=' . urlencode(rex_article::getCurrent()->getName()) . '&body=' . urlencode($this->getUrl()) . '%0AIst%20diese%20Stelle%20f%C3%BCr%20dich%20interessant?';
    }

    /**
     * Gibt die URL für das Teilen der Stelle auf Facebook zurück.
     *
     * @return string Die URL für das Teilen der Stelle auf Facebook.
     */
    public function getShareFacebookHref(): string
    {
        return "https://www.facebook.com/sharer/sharer.php?u=" . $this->getUrl();
    }

    /**
     * Gibt die URL für das Teilen der Stelle auf LinkedIn zurück.
     *
     * @return string Die URL für das Teilen der Stelle auf LinkedIn.
     */
    public function getShareLinkedInHref(): string
    {
        return "https://www.linkedin.com/sharing/share-offsite/?url=" . $this->getUrl();
    }

    /**
     * Gibt die URL für das Teilen der Stelle auf Twitter zurück.
     *
     * @return string Die URL für das Teilen der Stelle auf Twitter.
     */
    public function getShareTwitterHref(): string
    {
        return "";
    }

    /**
     * Gibt die URL für das Teilen der Stelle auf WhatsApp zurück.
     *
     * @return string Die URL für das Teilen der Stelle auf WhatsApp.
     */
    public function getShareWhatsAppHref(): string
    {
        return "https://api.whatsapp.com/send?text=" . urlencode($this->getUrl());
    }

    /**
     * Gibt die IDs der Vorteile zurück.
     *
     * @return string Die IDs der Vorteile, getrennt durch Kommas.
     */
    public function getBenefitsIds(): string
    {
        return $this->getValue('benefits');
    }

    /**
     * Shortcut, um den Wert einer Konfigurationseinstellung zurückzugeben.
     *
     * @param string $key Der Schlüssel der Konfigurationseinstellung. Wenn kein Schlüssel angegeben ist, werden alle Konfigurationseinstellungen zurückgegeben.
     * @return mixed Der Wert der Konfigurationseinstellung oder ein Array aller Konfigurationseinstellungen, wenn kein Schlüssel angegeben ist.
     */
    public static function getConfig($key = ""): mixed
    {
        return rex_config::get('stellenangebote', $key);
    }

    /**
     * Shortcut, um den Wert einer Konfigurationseinstellung für das Addon anzugeben.
     *
     * @param string $key Der Schlüssel der Konfigurationseinstellung.
     * @param mixed $value Der neue Wert der Konfigurationseinstellung.
     * @return mixed Der alte Wert der Konfigurationseinstellung.
     */
    public static function setConfig($key = "", $value): mixed
    {
        return rex_config::set('stellenangebote', $key, $value);
    }

}
