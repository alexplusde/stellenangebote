<?php 

class stellenangebote_category extends \rex_yform_manager_dataset {
	
    /* Symbol */
    /** @api */
    public function getIcon() : ?string {
        return $this->getValue("icon");
    }
    /** @api */
    public function setIcon(mixed $value) : self {
        $this->setValue("icon", $value);
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

    /** @api */
    public function getMedia(): rex_media
    {
        return $this->getImage(true);
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

    /* Highlight */
    /** @api */
    public function getHighlight(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("highlight");
        }
        return $this->getValue("highlight");
    }
    /** @api */
    public function setHighlight(int $value = 1) : self {
        $this->setValue("highlight", $value);
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

    /* Reihenfolge */
    /** @api */
    public function getPrio() : ?int {
        return $this->getValue("prio");
    }
    /** @api */
    public function setPrio(int $value) : self {
        $this->setValue("prio", $value);
        return $this;
    }

}
?>
