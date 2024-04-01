<?php 

namespace FriendsOfRedaxo\Stellenangebote;

class Apply extends \rex_yform_manager_dataset {
	
    /* Bewerbung erfolgte am... */
    /** @api */
    public function getCreatedate() : ?string {
        return $this->getValue("createdate");
    }
    /** @api */
    public function setCreatedate(string $value) : self {
        $this->setValue("createdate", $value);
        return $this;
    }

    /* Löschdatum */
    /** @api */
    public function getDeletedate() : ?\DateTime {
        return $this->getValue("deletedate");
    }
    /** @api */
    public function setDeletedate(mixed $value) : self {
        $this->setValue("deletedate", $value);
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

    /* E-Mail-Adresse */
    /** @api */
    public function getEmail() : ?string {
        return $this->getValue("email");
    }
    /** @api */
    public function setEmail(mixed $value) : self {
        $this->setValue("email", $value);
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

    /* Wann sind Sie am besten erreichbar? */
    /** @api */
    public function getAvailability() : ?string {
        return $this->getValue("availability");
    }
    /** @api */
    public function setAvailability(mixed $value) : self {
        $this->setValue("availability", $value);
        return $this;
    }

    /* Nachricht */
    /** @api */
    public function getMessage(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("message"));
        }
        return $this->getValue("message");
    }
    /** @api */
    public function setMessage(mixed $value) : self {
        $this->setValue("message", $value);
        return $this;
    }
            
    /* Anhang 1 */
    /** @api */
    public function getUpload1() : ?string {
        return $this->getValue("upload1");
    }
    /** @api */
    public function setUpload1(mixed $value) : self {
        $this->setValue("upload1", $value);
        return $this;
    }

    /* Anhang 2 */
    /** @api */
    public function getUpload2() : ?string {
        return $this->getValue("upload2");
    }
    /** @api */
    public function setUpload2(mixed $value) : self {
        $this->setValue("upload2", $value);
        return $this;
    }

    /* Anhang 3 */
    /** @api */
    public function getUpload3() : ?string {
        return $this->getValue("upload3");
    }
    /** @api */
    public function setUpload3(mixed $value) : self {
        $this->setValue("upload3", $value);
        return $this;
    }

    /* Datenschutzerklärung */
    /** @api */
    public function getPrivacyPolicy() : ?\DateTime {
        return $this->getValue("privacy_policy");
    }
    /** @api */
    public function setPrivacyPolicy(mixed $value) : self {
        $this->setValue("privacy_policy", $value);
        return $this;
    }

}
?>
