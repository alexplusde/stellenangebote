<?php 

namespace Alexplusde\Stellenangebote;

use rex_media;

/**
 * Diese Klasse repräsentiert die Ansprechperson zu einem Stellenangebot bei einer Bewerbung.
 * Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung,
 * um auf die Daten der Ansprechperson zuzugreifen und diese zu verändern.
 *
 * Beispiel für die Verwendung:
 * $contact = stellenangebote_contact::get($id);
 * if ($contact) {
 *     echo $contact->getValue('name');
 * }
 */

 class Contact extends \rex_yform_manager_dataset {
	
    /**
     * Gibt an, ob die Ansprechperson auswählbar ist / gezeigt werden soll.
     *
     * @return string|null Der Status der Ansprechperson oder null, wenn kein Status gesetzt ist.
     * @api
     */
    public function getStatus() : ?string {
        return $this->getValue("status");
    }

    /**
     * Setzt den Status der Ansprechperson, ob die Ansprechperson auswählbar ist / gezeigt werden soll.
     *
     * @param mixed $value Der neue Status der Ansprechperson.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setStatus(mixed $value) : self {
        $this->setValue("status", $value);
        return $this;
    }

    /**
     * Gibt den Namen der Ansprechperson zurück.
     *
     * @return string|null Der Name der Ansprechperson oder null, wenn kein Name gesetzt ist.
     * @api
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * Setzt den Namen der Ansprechperson.
     *
     * @param mixed $value Der neue Name der Ansprechperson.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /**
     * Gibt die E-Mail-Adresse der Ansprechperson zurück.
     *
     * @return string|null Die E-Mail-Adresse der Ansprechperson oder null, wenn keine E-Mail-Adresse gesetzt ist.
     * @api
     */
    public function getMail() : ?string {
        return $this->getValue("mail");
    }

    /**
     * Setzt die E-Mail-Adresse der Ansprechperson.
     *
     * @param mixed $value Die neue E-Mail-Adresse der Ansprechperson.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setMail(mixed $value) : self {
        $this->setValue("mail", $value);
        return $this;
    }

    /**
     * Gibt die Telefonnummer der Ansprechperson zurück.
     *
     * @return string|null Die Telefonnummer der Ansprechperson oder null, wenn keine Telefonnummer gesetzt ist.
     * @api
     */
    public function getPhone() : ?string {
        return $this->getValue("phone");
    }

    /**
     * Setzt die Telefonnummer der Ansprechperson.
     *
     * @param mixed $value Die neue Telefonnummer der Ansprechperson.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setPhone(mixed $value) : self {
        $this->setValue("phone", $value);
        return $this;
    }

    /**
     * Gibt die Beschreibung der Ansprechperson zurück.
     * Wenn $asPlaintext auf true gesetzt ist, wird die Beschreibung ohne HTML-Tags zurückgegeben.
     *
     * @param bool $asPlaintext Optional. Wenn true, wird die Beschreibung ohne HTML-Tags zurückgegeben. Standard ist false.
     * @return string|null Die Beschreibung der Ansprechperson oder null, wenn keine Beschreibung gesetzt ist.
     * @api
     */
    public function getDescription(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }

    /**
     * Setzt die Beschreibung der Ansprechperson.
     *
     * @param mixed $value Die neue Beschreibung der Ansprechperson.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setDescription(mixed $value) : self {
        $this->setValue("description", $value);
        return $this;
    }

    /**
     * Gibt das Portraitfoto der Ansprechperson zurück.
     * Wenn $asMedia auf true gesetzt ist, wird ein rex_media-Objekt zurückgegeben.
     *
     * @param bool $asMedia Optional. Wenn true, wird ein rex_media-Objekt zurückgegeben. Standard ist false.
     * @return mixed Das Portraitfoto der Ansprechperson als String oder rex_media-Objekt, oder null, wenn kein Foto gesetzt ist.
     * @api
     */
    public function getPhoto(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("photo"));
        }
        return $this->getValue("photo");
    }

    /**
     * Gibt das Portraitfoto der Ansprechperson als rex_media-Objekt zurück.
     *
     * @return rex_media Das Portraitfoto der Ansprechperson als rex_media-Objekt.
     * @api
     */
    public function getMedia(): rex_media {
        return $this->getPhoto(true);
    }
    
    /**
     * Gibt das Portraitfoto der Ansprechperson als String zurück.
     *
     * @return string Das Portraitfoto der Ansprechperson als String.
     * @api
     */
    public function getImage(): string {
        return $this->getPhoto(false);
    }

    /**
     * Setzt das Portraitfoto der Ansprechperson.
     * Das Foto muss als Dateiname eines Bildes in rex_media angegeben werden.
     *
     * @param string $filename Der Dateiname des Fotos in rex_media.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setPhoto(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->setValue("photo", $filename);
        }
        return $this;
    }
            
}

?>
