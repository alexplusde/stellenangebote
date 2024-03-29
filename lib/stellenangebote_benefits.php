<?php 
class stellenangebote_benefits extends \rex_yform_manager_dataset {
	
    /** @api */
    public static function findBySet($set = ''): ?rex_yform_manager_collection
    {
        return self::query()->whereRaw('FIND_IN_SET(id, "' . $set . '")')->find();
    }

    /* Icon (Bootstrap 5) */
    /** @api */
    public function getIcon() : ?string {
        return $this->getValue("icon");
    }
    /** @api */
    public function setIcon(mixed $value) : self {
        $this->setValue("icon", $value);
        return $this;
    }

    /* Icon (Medienpool) */
    /** @api */
    public function getIconCustom(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("icon_custom"));
        }
        return $this->getValue("icon_custom");
    }
    /** @api */
    public function setIconCustom(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("icon_custom", $filename);
        }
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

    public function showIcon(): void
    {
        if($icon = rex_media_plus::get($this->getValue('icon_custom'))) {
            echo $icon->getImg();
        } elseif($this->getValue('icon')) {
            echo '<i class="' . $this->getIcon() . '"></i>';
        }
    }

}
