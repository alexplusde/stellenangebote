<?php

namespace Alexplusde\Stellenangebote;

use rex_media;

/**
 * Diese Klasse repräsentiert die Kategorie eines Stellenangebots in der Datenbank.
 * Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung,
 * um auf die Daten der Kategorie zuzugreifen und diese zu manipulieren.
 * Beispiele für Kategorien sind "Allgemein", "Marketing", "Vertrieb", "IT" usw.
 *
 * Beispiel für die Verwendung:
 * $category = stellenangebote_category::get($id);
 * if ($category) {
 *     echo $category->getValue('name');
 * }
 *
 */

 class Category extends \rex_yform_manager_dataset {

    /**
     * Gibt das Icon (Bootstrap Icon-Bibliothek) der Kategorie zurück.
     *
     * @return string|null Die Icon-Klasse der Kategorie oder null, wenn kein Symbol gesetzt ist.
     */
    public function getIcon() : ?string {
        return $this->getValue("icon");
    }

    /**
     * Setzt das Icon (Bootstrap Icon-Bibliothek) der Kategorie.
     *
     * @param mixed $value Das neue Symbol der Kategorie als CSS-Klasse.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setIcon(mixed $value) : self {
        $this->setValue("icon", $value);
        return $this;
    }

    /* Titelbild */
    /**
     * Gibt das Titelbild der Kategorie zurück.
     *
     * @param bool $asMedia Wenn true, wird das Bild als rex_media-Objekt zurückgegeben. Andernfalls wird der Dateiname zurückgegeben.
     * @return mixed Das Titelbild der Kategorie.
     */
    public function getImage(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("image"));
        }
        return $this->getValue("image");
    }

    /**
     * Setzt das Titelbild der Kategorie.
     *
     * @param string $filename Der Dateiname des neuen Titelbilds.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setImage(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->setValue("image", $filename);
        }
        return $this;
    }

    /**
     * Gibt das Titelbild der Kategorie als rex_media-Objekt zurück.
     *
     * @return rex_media Das Titelbild der Kategorie.
     */
    public function getMedia(): rex_media
    {
        return $this->getImage(true);
    }

    /**
     * Gibt den Namen der Kategorie zurück.
     *
     * @return string|null Der Name der Kategorie oder null, wenn kein Name gesetzt ist.
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * Setzt den Namen der Kategorie.
     *
     * @param mixed $value Der neue Name der Kategorie.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /**
     * Gibt an, ob die Kategorie hervorgehoben werden soll.
     *
     * @param bool $asBool Wenn true, wird der Highlight-Status als boolscher Wert zurückgegeben. Andernfalls wird der Wert so zurückgegeben, wie er in der Datenbank gespeichert ist.
     * @return mixed Der Highlight-Status der Kategorie.
     */
    public function getHighlight(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("highlight");
        }
        return $this->getValue("highlight");
    }

    /**
     * Setzt, ob die Kategorie hervorgehoben werden soll.
     *
     * @param int $value Der neue Highlight-Status der Kategorie. Standardmäßig ist dieser Wert auf 1 gesetzt.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setHighlight(int $value = 1) : self {
        $this->setValue("highlight", $value);
        return $this;
    }

    /**
     * Gibt die Beschreibung der Kategorie zurück.
     *
     * @param bool $asPlaintext Wenn true, wird die Beschreibung ohne HTML-Tags zurückgegeben.
     * @return string|null Die Beschreibung der Kategorie oder null, wenn keine Beschreibung gesetzt ist.
     */
    public function getDescription(bool $asPlaintext = false) : ?string {
        if($asPlaintext) {
            return strip_tags($this->getValue("description"));
        }
        return $this->getValue("description");
    }

    /**
     * Setzt die Beschreibung der Kategorie.
     *
     * @param mixed $value Die neue Beschreibung der Kategorie.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setDescription(mixed $value) : self {
        $this->setValue("description", $value);
        return $this;
    }
            
    /**
     * Gibt den Status der Kategorie zurück.
     *
     * @return mixed Der Status der Kategorie.
     */
    public function getStatus() : mixed {
        return $this->getValue("status");
    }

    /**
     * Setzt den Status der Kategorie.
     *
     * @param mixed $param Der neue Status der Kategorie.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setStatus(mixed $param) : self {
        $this->setValue("status", $param);
        return $this;
    }

    /**
     * Gibt die Priorität der Kategorie zurück.
     *
     * @return int|null Die Priorität der Kategorie oder null, wenn keine Priorität gesetzt ist.
     */
    public function getPrio() : ?int {
        return $this->getValue("prio");
    }

    /**
     * Setzt die Priorität der Kategorie.
     *
     * @param int $value Die neue Priorität der Kategorie.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setPrio(int $value) : self {
        $this->setValue("prio", $value);
        return $this;
    }

}
?>
