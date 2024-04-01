<?php 

namespace FriendsOfRedaxo\Stellenangebote;

use rex_addon;
use rex_media;
use rex_media_plus;


/**
 * Diese Klasse repräsentiert die Mitarbeiter*innen-Vorteile eines Stellenangebots in der Datenbank.
 * Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung,
 * um auf die Daten der Vorteile zuzugreifen und diese zu manipulieren.
 * Beispiele für Vorteile sind "E-Bike-Leasing", "Zusätzliche Urlaubstage", usw.
 *
 * Beispiel für die Verwendung:
 * $benefit = stellenangebote_benefits::get($id);
 * if ($benefit) {
 *     echo $benefit->getValue('name');
 * }
 */
class Benefits extends \rex_yform_manager_dataset {

    /**
     * Findet Datensätze basierend auf einem gegebenen Set.
     *
     * @param string $set Ein String, der die IDs der gesuchten Datensätze enthält.
     * @return rex_yform_manager_collection|null Eine Sammlung von Datensätzen oder null, wenn keine Datensätze gefunden wurden.
     *
     * @deprecated Diese Methode ist veraltet und sollte nicht mehr verwendet werden. Stattdessen direkt die Methode getBenefits() eines Stellenangebots verwenden.
     */
    public static function findBySet($set = ''): ?\rex_yform_manager_collection
    {
        return self::query()->whereRaw('FIND_IN_SET(id, "' . $set . '")')->find();
    }

    /**
     * Gibt das Bootstrap 5 Icon des Vorteils zurück.
     *
     * @return string|null Das Bootstrap 5 Icon des Vorteils (als CSS-Klasse) oder null, wenn kein Icon gesetzt ist.
     */
    public function getIcon() : ?string {
        return $this->getValue("icon");
    }

    /**
     * Setzt das Bootstrap 5 Icon des Vorteils.
     *
     * @param mixed $value Das neue Bootstrap 5 Icon des Vorteils als CSS-Klasse.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setIcon(mixed $value) : self {
        $this->setValue("icon", $value);
        return $this;
    }

    /**
     * Gibt das benutzerdefinierte Icon des Vorteils zurück.
     *
     * @param bool $asMedia Wenn true, wird das Icon als rex_media-Objekt zurückgegeben. Andernfalls wird der Dateiname zurückgegeben.
     * @return mixed Das benutzerdefinierte Icon des Vorteils.
     */
    public function getIconCustom(bool $asMedia = false) : mixed {
        if($asMedia) {
            return rex_media::get($this->getValue("icon_custom"));
        }
        return $this->getValue("icon_custom");
    }

    /**
     * Setzt das benutzerdefinierte Icon des Vorteils.
     *
     * @param string $filename Der Dateiname des neuen benutzerdefinierten Icons.
     * @return self Die aktuelle Instanz der Klasse.
     */
    public function setIconCustom(string $filename) : self {
        if(rex_media::get($filename)) {
            $this->getValue("icon_custom", $filename);
        }
        return $this;
    }

    /**
     * Gibt den Namen des Vorteils zurück.
     *
     * @return string|null Der Name des Vorteils oder null, wenn kein Name gesetzt ist.
     * @api
     */
    public function getName() : ?string {
        return $this->getValue("name");
    }

    /**
     * Setzt den Namen des Vorteils.
     *
     * @param mixed $value Der neue Name des Vorteils.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setName(mixed $value) : self {
        $this->setValue("name", $value);
        return $this;
    }

    /**
     * Gibt den Highlight-Status des Vorteils zurück.
     *
     * @param bool $asBool Wenn true, wird der Highlight-Status als boolscher Wert zurückgegeben. Andernfalls wird der Wert so zurückgegeben, wie er in der Datenbank gespeichert ist.
     * @return mixed Der Highlight-Status des Vorteils.
     * @api
     */
    public function getHighlight(bool $asBool = false) : mixed {
        if($asBool) {
            return (bool) $this->getValue("highlight");
        }
        return $this->getValue("highlight");
    }

    /**
     * Setzt den Highlight-Status des Vorteils.
     *
     * @param int $value Der neue Highlight-Status des Vorteils. Standardmäßig ist dieser Wert auf 1 gesetzt.
     * @return self Die aktuelle Instanz der Klasse.
     * @api
     */
    public function setHighlight(int $value = 1) : self {
        $this->setValue("highlight", $value);
        return $this;
    } 
            /* Beschreibung */
            /**
             * Gibt die Beschreibung des Vorteils zurück.
             *
             * @param bool $asPlaintext Wenn true, wird die Beschreibung ohne HTML-Tags zurückgegeben.
             * @return string|null Die Beschreibung des Vorteils oder null, wenn keine Beschreibung gesetzt ist.
             * @api
             */
            public function getDescription(bool $asPlaintext = false) : ?string {
                if($asPlaintext) {
                    return strip_tags($this->getValue("description"));
                }
                return $this->getValue("description");
            }

            /**
             * Setzt die Beschreibung des Vorteils.
             *
             * @param mixed $value Die neue Beschreibung des Vorteils.
             * @return self Die aktuelle Instanz der Klasse.
             * @api
             */
            public function setDescription(mixed $value) : self {
                $this->setValue("description", $value);
                return $this;
            }

            /**
             * Zeigt das Icon des Vorteils an.
             *
             * Wenn ein benutzerdefiniertes Icon gesetzt ist, wird dieses angezeigt. Andernfalls wird das Bootstrap 5 Icon angezeigt.
             * @return void
             */
            public function showIcon(): void
            {
                if(rex_addon::get('rex_media_responsive')->isAvailable()) {
                    if($icon = rex_media_plus::get($this->getValue('icon_custom'))) {
                        echo $icon->getImg();
                        return;
                    }
                } else {
                    if($icon = rex_media::get($this->getValue('icon_custom'))) {
                        echo '<img src="'.$icon->getUrl().'" alt="'.$icon->getTitle().'">';
                        return;
                    }
                } 
                if($this->getValue('icon')) {
                    echo '<i class="' . $this->getIcon() . '"></i>';
                }
            }

}
