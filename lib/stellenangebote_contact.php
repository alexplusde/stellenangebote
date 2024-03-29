<?php 
class stellenangebote_contact extends \rex_yform_manager_dataset {
	
    /* Status */
    /** @api */
    public function getStatus() : ?string {
        return $this->getValue("status");
    }
    /** @api */
    public function setStatus(mixed $value) : self {
        $this->setValue("status", $value);
        return $this;
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

    /* E-Mail */
    /** @api */
    public function getMail() : ?string {
        return $this->getValue("mail");
    }
    /** @api */
    public function setMail(mixed $value) : self {
        $this->setValue("mail", $value);
        return $this;
    }

    /* Telefonnummer */
    /** @api */
    public function getPhone() : ?string {
        return $this->getValue("phone");
    }
    /** @api */
    public function setPhone(mixed $value) : self {
        $this->setValue("phone", $value);
        return $this;
    }

    /* Beschreibung */
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
            
    /* Portraitfoto */
    /** @api */
    public function getPhoto(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("photo"));
        }
        return $this->getValue("photo");
    }

    /** @api */
    public function getMedia(): rex_media {
        return $this->getPhoto(true);
    }
    
    /** @api */
    public function getImage(): string {
        return $this->getPhoto(false);
    }

    /** @api */
    public function setPhoto(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("photo", $filename);
        }
        return $this;
    }
            
}

?>
