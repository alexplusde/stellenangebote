<?php

/**
 * Diese Klasse repräsentiert den Tätigkeits-Standort oder eine Filiale / Niederlassung zu einem Stellenangebot in der Datenbank.
 * Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung,
 * um auf die Daten des Standorts zuzugreifen und diese zu manipulieren.
 * Die Daten umfassen die Adresse des Standorts.
 *
 * Beispiel für die Verwendung:
 * $location = stellenangebote_location::get($id);
 * if ($location) {
 *     echo $location->getValue('address');
 * }
 *
 * @package stellenangebote
 */
class stellenangebote_location extends \rex_yform_manager_dataset {
	
    /**
     * Gibt den Google Places Embed-Code des Standorts zurück.
     *
     * @return string|null Der Google Places Embed-Code des Standorts oder null, wenn kein Code gesetzt ist.
     * @api
     */
    public function getGooglePlaces() : ?string {
        return $this->getValue("google_places");
    }

    /**
     * Setzt den Google Places Embed-Code des Standorts.
     *
     * @param mixed $value Der neue Google Places Embed-Code des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setGooglePlaces(mixed $value) : self {
        $this->setValue("google_places", $value);
        return $this;
    }

    /**
     * Gibt die Adresse des Standorts als String zurück.
     *
     * @return string Die Adresse des Standorts im Format "Straße, PLZ, Ort, Ländercode".
     */
    public function getAsString() :string
    {
        return $this->getValue('street') .", ". $this->getValue('zip') .", ".$this->getValue('locality').", ".$this->getValue('countrycode');
    }
    
    /**
     * Gibt die formatierte Adresse des Standorts zurück.
     *
     * @return string Die formatierte Adresse des Standorts im Format "Straße, PLZ Ort".
     */
    public function getFormattedAddress() :string
    {
        return $this->getValue('street') .", ". $this->getValue('zip') ." ".$this->getValue('locality');
    }

    /**
     * Gibt den Namen des Standorts zurück, z.B. Firmenname, Filialname oder Niederlassung.
     *
     * @return string|null Der Name des Standorts oder null, wenn kein Name gesetzt ist.
     * @api
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * Setzt den Namen des Standorts, z.B. Firmenname, Filialname oder Niederlassung
     *
     * @param mixed $value Der neue Name des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /**
     * Gibt die Straße des Standorts zurück.
     *
     * @return string|null Die Straße des Standorts oder null, wenn keine Straße gesetzt ist.
     * @api
     */
    public function getStreet() : ?string {
        return $this->getValue("street");
    }

    /**
     * Setzt die Straße des Standorts.
     *
     * @param mixed $value Die neue Straße des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setStreet(mixed $value) : self {
        $this->setValue("street", $value);
        return $this;
    }

    /**
     * Gibt die Postleitzahl des Standorts zurück.
     *
     * @return string|null Die Postleitzahl des Standorts oder null, wenn keine Postleitzahl gesetzt ist.
     * @api
     */
    public function getZip() : ?string {
        return $this->getValue("zip");
    }

    /**
     * Setzt die Postleitzahl des Standorts.
     *
     * @param mixed $value Die neue Postleitzahl des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setZip(mixed $value) : self {
        $this->setValue("zip", $value);
        return $this;
    }

    /**
     * Gibt die Stadt des Standorts zurück.
     *
     * @return string|null Die Stadt des Standorts oder null, wenn keine Stadt gesetzt ist.
     * @api
     */
    public function getLocality() : ?string {
        return $this->getValue("locality");
    }

    /**
     * Setzt die Stadt des Standorts.
     *
     * @param mixed $value Die neue Stadt des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setLocality(mixed $value) : self {
        $this->setValue("locality", $value);
        return $this;
    }

    /**
     * Gibt den Ländercode des Standorts zurück.
     *
     * @return string|null Der Ländercode des Standorts oder null, wenn kein Ländercode gesetzt ist.
     * @api
     */
    public function getCountrycode() : ?string {
        return $this->getValue("countrycode");
    }

    /**
     * Setzt den Ländercode des Standorts.
     *
     * @param mixed $value Der neue Ländercode des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setCountrycode(mixed $value) : self {
        $this->setValue("countrycode", $value);
        return $this;
    }

    /**
     * Gibt den Längen- und Breitengrad des Standorts zurück.
     *
     * @return string|null Der Längen- und Breitengrad des Standorts oder null, wenn keine Koordinaten gesetzt sind.
     * @api
     */
    public function getLatLng() : ?string {
        return $this->getValue("lat_lng");
    }

    /**
     * Setzt den Längen- und Breitengrad des Standorts.
     *
     * @param mixed $value Die neuen Koordinaten des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setLatLng(mixed $value) : self {
        $this->setValue("lat_lng", $value);
        return $this;
    }

    /**
     * Gibt den Breitengrad des Standorts zurück.
     *
     * @return string|null Der Breitengrad des Standorts oder null, wenn kein Breitengrad gesetzt ist.
     * @api
     */
    public function getLat() : ?string {
        return $this->getValue("lat");
    }

    /**
     * Setzt den Breitengrad des Standorts.
     *
     * @param mixed $value Der neue Breitengrad des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setLat(mixed $value) : self {
        $this->setValue("lat", $value);
        return $this;
    }

    /**
     * Gibt den Längengrad des Standorts zurück.
     *
     * @return string|null Der Längengrad des Standorts oder null, wenn kein Längengrad gesetzt ist.
     * @api
     */
    public function getLng() : ?string {
        return $this->getValue("lng");
    }

    /**
     * Setzt den Längengrad des Standorts.
     *
     * @param mixed $value Der neue Längengrad des Standorts.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setLng(mixed $value) : self {
        $this->setValue("lng", $value);
        return $this;
    }

    /**
     * Gibt den Benutzer zurück, der den Standort zuletzt geändert hat.
     *
     * @return rex_user|null Der Benutzer, der den Standort zuletzt geändert hat, oder null, wenn kein Benutzer gesetzt ist.
     * @api
     */
    public function getUpdateuser() : ?rex_user {
        return rex_user::get($this->getValue("updateuser"));
    }

    /**
     * Setzt den Benutzer, der den Standort zuletzt geändert hat.
     *
     * @param mixed $value Der neue Benutzer, der den Standort zuletzt geändert hat.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setUpdateuser(mixed $value) : self {
        $this->setValue("updateuser", $value);
        return $this;
    }

    /**
     * Gibt den Benutzer zurück, der den Standort erstellt hat.
     *
     * @return rex_user|null Der Benutzer, der den Standort erstellt hat, oder null, wenn kein Benutzer gesetzt ist.
     * @api
     */
    public function getCreateuser() : ?rex_user {
        return rex_user::get($this->getValue("createuser"));
    }

    /**
     * Setzt den Benutzer, der den Standort erstellt hat.
     *
     * @param mixed $value Der neue Benutzer, der den Standort erstellt hat.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setCreateuser(mixed $value) : self {
        $this->setValue("createuser", $value);
        return $this;
    }

}?>
