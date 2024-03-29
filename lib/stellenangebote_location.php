<?php

class stellenangebote_location extends \rex_yform_manager_dataset {
	
    /* Google Maps Embed-Code */
    /** @api */
    public function getGooglePlaces() : ?string {
        return $this->getValue("google_places");
    }
    /** @api */
    public function setGooglePlaces(mixed $value) : self {
        $this->setValue("google_places", $value);
        return $this;
    }

    
    public function getAsString() :string
    {
        return $this->getValue('street') .", ". $this->getValue('zip') .", ".$this->getValue('locality').", ".$this->getValue('countrycode');
    }
    
    public function getFormattedAddress() :string
    {
        return $this->getValue('street') .", ". $this->getValue('zip') ." ".$this->getValue('locality');
    }

    /* Name */
    /** @api */
    public function getName() : ?string {
        return $this->getValue("name");
    }
    /** @api */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /* Adresse */
    /** @api */
    public function getStreet() : ?string {
        return $this->getValue("street");
    }
    /** @api */
    public function setStreet(mixed $value) : self {
        $this->setValue("street", $value);
        return $this;
    }

    /* PLZ */
    /** @api */
    public function getZip() : ?string {
        return $this->getValue("zip");
    }
    /** @api */
    public function setZip(mixed $value) : self {
        $this->setValue("zip", $value);
        return $this;
    }

    /* Stadt */
    /** @api */
    public function getLocality() : ?string {
        return $this->getValue("locality");
    }
    /** @api */
    public function setLocality(mixed $value) : self {
        $this->setValue("locality", $value);
        return $this;
    }

    /* Staat */
    /** @api */
    public function getCountrycode() : ?string {
        return $this->getValue("countrycode");
    }
    /** @api */
    public function setCountrycode(mixed $value) : self {
        $this->setValue("countrycode", $value);
        return $this;
    }

    /* Standort */
    /** @api */
    public function getLatLng() : ?string {
        return $this->getValue("lat_lng");
    }
    /** @api */
    public function setLatLng(mixed $value) : self {
        $this->setValue("lat_lng", $value);
        return $this;
    }

    /* Breitengrad (lat) */
    /** @api */
    public function getLat() : ?string {
        return $this->getValue("lat");
    }
    /** @api */
    public function setLat(mixed $value) : self {
        $this->setValue("lat", $value);
        return $this;
    }

    /* Längengrad (lng) */
    /** @api */
    public function getLng() : ?string {
        return $this->getValue("lng");
    }
    /** @api */
    public function setLng(mixed $value) : self {
        $this->setValue("lng", $value);
        return $this;
    }

    /* zuletzt geändert von... */
    /** @api */
    public function getUpdateuser() : ?rex_user {
        return rex_user::get($this->getValue("updateuser"));
    }
    /** @api */
    public function setUpdateuser(mixed $value) : self {
        $this->setValue("updateuser", $value);
        return $this;
    }

    /* erstellt von... */
    /** @api */
    public function getCreateuser() : ?rex_user {
        return rex_user::get($this->getValue("createuser"));
    }
    /** @api */
    public function setCreateuser(mixed $value) : self {
        $this->setValue("createuser", $value);
        return $this;
    }

}?>
