# `Stellenangebot`

Diese Klasse erweitert die rex_yform_manager_dataset Klasse und repräsentiert ein einzelnes Stellenangebot in der Datenbank. Sie enthält Methoden zum Abrufen und Setzen des Titels eines Stellenangebots.

## Beispiele

```php
// Holen Sie sich ein Standortobjekt anhand der ID
$stellenangebot = Alexplusde\Stellenangebote\Posting::get($id);
if ($stellenangebot) {

    $benefits = $stellenangebot->getBenefits();
    $article = $stellenangebot->getArticle();
    $locations = stellenangebot->getLocations();
    $category = $stellenangebot->getCategory();

    echo $stellenangebot->getTitle();
    echo $stellenangebot->getSubtitle();
    echo $stellenangebot->getFeatured();
    echo $stellenangebot->getImage();
    echo $stellenangebot->getVideo();
    echo $stellenangebot->getTeaser();
    echo $stellenangebot->getEmploymentType();
    echo $stellenangebot->getTelecommute();
    echo $stellenangebot->getStatus();
    echo $stellenangebot->getContact();
    echo $stellenangebot->getLocation();
    echo $stellenangebot->getCategoryId();
    echo $stellenangebot->getValidThrough();
    echo $stellenangebot->getArticleId();
    echo $stellenangebot->getArticleUrl();
    echo $stellenangebot->getDirectApply();
    echo $stellenangebot->getDescription();
    echo $stellenangebot->getProfile();
    echo $stellenangebot->getUpdatedate();
    echo $stellenangebot->getCreatedate();
    echo $stellenangebot->getDatePosted();
    echo $stellenangebot->getDatePostedFormatted();
    echo $stellenangebot->getValidThroughFormatted();
    echo $stellenangebot->getEmploymentTypeFormatted();
    echo $stellenangebot->jobLocationType();
    echo $stellenangebot->getLocationNames();
    echo $stellenangebot->getApplyForm();
    echo $stellenangebot->getUrl();
    echo $stellenangebot->getCategoryName();
    echo $stellenangebot->getCategoryIcon();
    echo $stellenangebot->getShareMailHref();
    echo $stellenangebot->getShareFacebookHref();
    echo $stellenangebot->getShareLinkedInHref();
    echo $stellenangebot->getShareTwitterHref();
    echo $stellenangebot->getShareWhatsAppHref();

    // eigene Felder klassisch via getValue()
    // echo $stellenangebot->getValue('mein_feld');
}
```

```php
$stellenangebot = stellenangebote::create();

$stellenangebot->setTitle('Mein Stellenangebot');
$stellenangebot->setSubtitle('Mein Untertitel');
$stellenangebot->setFeatured(1);
$stellenangebot->setImage('bild.jpg');
$stellenangebot->setVideo('video.mp4');
$stellenangebot->setTeaser('Mein Teaser');
$stellenangebot->setEmploymentType('Vollzeit');
$stellenangebot->setTelecommute(1);
$stellenangebot->setStatus(1);
$stellenangebot->setValidThrough('2022-12-31');
$stellenangebot->setArticleId(1);
$stellenangebot->setDirectApply(1);
$stellenangebot->setDescription('<p>Aufgabenbeschreibung</p>');
$stellenangebot->setProfile('<p>Profilbeschreibung</p>');
$stellenangebot->setUpdatedate('2022-01-01');
$stellenangebot->setCreatedate('2022-01-01');

// eigene Felder klassisch via setValue()
// $location->setValue('mein_feld', 'mein_wert');

$stellenangebot->save();
```

## Methoden

### `getTitle() : ?string`

Gibt den Titel des Stellenangebots zurück. Der Titel des Stellenangebots oder null, wenn kein Titel gesetzt ist.

### `setTitle(mixed $value) : self`

Setzt den Titel des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getSubtitle() : ?string`

Gibt den Untertitel des Stellenangebots zurück. Der Untertitel des Stellenangebots oder null, wenn kein Untertitel gesetzt ist.

### `setSubtitle(mixed $value) : self`

Setzt den Untertitel des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getFeatured(bool $asBool = false) : mixed`

Gibt den Hervorhebungsstatus des Stellenangebots zurück. Der Hervorhebungsstatus des Stellenangebots.

### `setFeatured(int $value = 1) : self`

Setzt den Hervorhebungsstatus des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getImage(bool $asMedia = false) : mixed`

Gibt das Titelbild des Stellenangebots zurück. Das Titelbild des Stellenangebots.

### `setImage(string $filename) : self`

Setzt das Titelbild des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getVideo(bool $asMedia = false) : mixed`

Gibt das Intro-Video des Stellenangebots zurück. Das Intro-Video des Stellenangebots.

### `setVideo(string $filename) : self`

Setzt das Intro-Video des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getTeaser(bool $asPlaintext = false) : ?string`

Gibt den Teaser des Stellenangebots zurück. Der Teaser des Stellenangebots oder null, wenn kein Teaser gesetzt ist.

### `setTeaser(mixed $value) : self`

Setzt den Teaser des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getEmploymentType() : ?string`

Gibt die Art des Stellenangebots zurück, z.B. Vollzeit, Teilzeit, Praktikum o.ä. Die Art des Stellenangebots oder null, wenn keine Art gesetzt ist.

### `setEmploymentType(mixed $value) : self`

Setzt die Art des Stellenangebots, z.B. Vollzeit, Teilzeit, Praktikum o.ä. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getTelecommute(bool $asBool = false) : mixed`

Gibt an, ob die Stelle als 100% Home-Office (Remote Office) verfügbar ist. Der Home-Office-Status des Stellenangebots.

### `setTelecommute(int $value = 1) : self`

Setzt den Home-Office-Status des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getBenefits() : ?rex_yform_manager_dataset`

Gibt die Vorteile des Stellenangebots zurück. Die Vorteile des Stellenangebots oder null, wenn keine Vorteile gesetzt sind.

### `getStatus() : mixed`

Gibt den Status des Stellenangebots zurück. Der Status des Stellenangebots.

### `setStatus(mixed $param) : self`

Setzt den Status des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getContact() : ?stellenangebote_contact`

Gibt die Ansprechperson für das Stellenangebot als Dataset zurück. Die Ansprechperson für das Stellenangebot oder null, wenn keine Ansprechperson gesetzt ist.

### `getLocation() : ?rex_yform_manager_dataset`

Gibt den Standort des Stellenangebots als Dataset zurück. Der Standort des Stellenangebots oder null, wenn kein Standort gesetzt ist.

### `getCategoryId() : ?int`

Gibt die Kategorie-ID des Stellenangebots zurück. Die Kategorie-ID des Stellenangebots oder null, wenn keine Kategorie-ID gesetzt ist.

### `getValidThrough() : ?\DateTime`

Gibt die Bewerbungsfrist des Stellenangebots zurück. Die Bewerbungsfrist des Stellenangebots oder null, wenn keine Bewerbungsfrist gesetzt ist.

### `setValidThrough(mixed $value) : self`

Setzt die Bewerbungsfrist des Stellenangebots. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getArticle(bool $asArticle = false) : ?rex_article`

Gibt den REDAXO-Artikel zurück, auf den weitergeleitet wird. Der REDAXO-Artikel oder null, wenn kein Artikel gesetzt ist.

### `getArticleId() : ?int`

Gibt die ID des REDAXO-Artikels zurück, auf den weitergeleitet wird. Die ID des REDAXO-Artikels oder null, wenn kein Artikel gesetzt ist.

### `getArticleUrl() : ?string`

Gibt die URL des REDAXO-Artikels zurück, auf den weitergeleitet wird. Die URL des REDAXO-Artikels oder null, wenn kein Artikel gesetzt ist.

### `setArticleId(string $id) : self`

Setzt den REDAXO-Artikel, auf den weitergeleitet wird. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getDirectApply(bool $asBool = false) : mixed`

Gibt zurück, ob das Bewerbungsformular direkt angezeigt werden soll. Der Status des Bewerbungsformulars.

### `setDirectApply(int $value = 1) : self`

Setzt den Status des Bewerbungsformulars, ob dieses direkt angezeigt werden soll. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getDescription(bool $asPlaintext = false) : ?string`

Gibt die Beschreibung der Aufgaben zurück. Die Beschreibung der Aufgaben oder null, wenn keine Beschreibung gesetzt ist.

### `setDescription(mixed $value) : self`

Setzt die Beschreibung der Aufgaben. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getProfile(bool $asPlaintext = false) : ?string`

Gibt die Beschreibung des Profils zurück. Die Beschreibung des Profils oder null, wenn keine Beschreibung gesetzt ist.

### `setProfile(mixed $value) : self`

Setzt die Beschreibung des Profils. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getUpdatedate()`

Gibt das Datum der letzten Änderung zurück. Wenn kein Datum gesetzt ist, wird null zurückgegeben.

### `setUpdatedate(string $value)`

Setzt das Datum der letzten Änderung. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getCreatedate()`

Gibt das Erstelldatum zurück. Wenn kein Datum gesetzt ist, wird null zurückgegeben.

### `setCreatedate(string $value)`

Setzt das Erstelldatum. Gibt die Instanz der Klasse zurück, um Methodenverkettung zu ermöglichen.

### `getDatePosted()`

Gibt das Erstelldatum zurück. Diese Methode ist veraltet und wird in zukünftigen Versionen entfernt.

### `getDatePostedFormatted()`

Gibt das formatierte Erstelldatum zurück. Diese Methode ist veraltet und wird in zukünftigen Versionen entfernt.

### `getValidThroughFormatted()`

Gibt das formatierte Gültigkeitsdatum zurück. Diese Methode ist veraltet und wird in zukünftigen Versionen entfernt.

### `getEmploymentTypeFormatted()`

Gibt den Beschäftigungstyp formatiert zurück. Die einzelnen Typen sind durch Kommas getrennt.

### `jobLocationType()`

Gibt den Typ des Arbeitsortes zurück. Gibt 'telecommute' zurück, wenn die Arbeit remote ausgeführt wird.

### `getLocations()`

Gibt die Standorte zurück, an denen diese Stelle ausgeübt wird oder verfügbar ist. Wenn keine Standorte gesetzt sind, wird null zurückgegeben.

### `getLocationNames()`

Gibt die Ortsnamen der Standorte als kommagetrennten Text zurück.

### `getApplyForm()`

Gibt das Bewerbungsformular zurück. Das gerenderte HTML des Bewerbungsformulars wird zurückgegeben.

### `getByArticleId(int $id)`

Gibt das passende Stellenangebot für eine bestimmte Artikel-ID zurück. Wenn kein Stellenangebot für die gegebene Artikel-ID gefunden wurde, wird null zurückgegeben.

### `getUrl()`

Gibt die URL des Stellenangebots zurück. Wenn eine Artikel-ID gesetzt ist, wird die URL für diese Artikel-ID zurückgegeben. Andernfalls wird die Standard-URL zurückgegeben.

### `getCategory()`

Gibt die Kategorie des Stellenangebots zurück. Wenn keine Kategorie gesetzt ist, wird null zurückgegeben.

### `getCategoryName()`

Gibt den Namen der Kategorie des Stellenangebots zurück.

### `getCategoryIcon()`

Gibt das Icon der Kategorie des Stellenangebots zurück.

### `addContentPage()`

Fügt einem Artikel die Möglichkeit hinzu, Stellenangebote zuzuordnen. Diese Methode registriert eine Erweiterung, die eine neue Backend-Seite hinzufügt, wenn die Seiten vorbereitet werden.

### `findOnline(int $limit = 6)`

Findet online verfügbare Stellenangebote. Die maximale Anzahl der zurückgegebenen Stellenangebote ist standardmäßig auf 6 gesetzt. Wenn keine Stellenangebote gefunden wurden, wird null zurückgegeben.

### `getShareMailHref()`

Gibt die URL für das Teilen der Stelle per E-Mail zurück.

### `getShareFacebookHref()`

Gibt die URL für das Teilen der Stelle auf Facebook zurück.

### `getShareLinkedInHref()`

Gibt die URL für das Teilen der Stelle auf LinkedIn zurück.

### `getShareTwitterHref()`

Gibt die URL für das Teilen der Stelle auf Twitter zurück.

### `getShareWhatsAppHref()`

Gibt die URL für das Teilen der Stelle auf WhatsApp zurück.

### `getBenefitsIds()`

Gibt die IDs der Vorteile zurück, getrennt durch Kommas.

### `getConfig(string $key = "")`

Shortcut, um den Wert einer Konfigurationseinstellung zurückzugeben. Wenn kein Schlüssel angegeben ist, werden alle Konfigurationseinstellungen zurückgegeben.

### `setConfig(string $key = "", mixed $value)`

Shortcut, um den Wert einer Konfigurationseinstellung für das Addon anzugeben. Gibt den alten Wert der Konfigurationseinstellung zurück.
