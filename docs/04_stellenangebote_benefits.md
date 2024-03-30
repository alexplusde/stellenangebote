# `stellenangebote_benefits`-Objekt

Diese Klasse repräsentiert die Mitarbeiter*innen-Vorteile eines Stellenangebots in der Datenbank. Sie erbt von der Klasse `rex_yform_manager_dataset` und stellt Methoden zur Verfügung, um auf die Daten der Vorteile zuzugreifen und diese zu manipulieren. Beispiele für Vorteile sind "E-Bike-Leasing", "Zusätzliche Urlaubstage", usw.

## Beispiel

```php
// Ein Vorteil anhand seiner ID abrufen
$benefit = stellenangebote_benefits::get($id);

if ($benefit) {
    // Getter-Methoden verwenden
    echo $benefit->getIcon();
    echo $benefit->getIconCustom();
    echo $benefit->getName();
    echo $benefit->getHighlight();
    echo $benefit->getDescription();

    // Eigene Felder über getValue() abrufen
    // echo $benefit->getValue('mein_feld');
}
```

```php
// Ein neues Vorteilsobjekt erstellen
$benefit = stellenangebote_benefits::create();

// Setter-Methoden verwenden
$benefit->setIcon('neues-icon');
$benefit->setIconCustom('file.ext');
$benefit->setName('Neuer Name');
$benefit->setHighlight(0);
$benefit->setDescription('Neue Beschreibung');

// Änderungen speichern
$benefit->save();
}
```

## Methoden

### `findBySet($set = ''): ?rex_yform_manager_collection`

Findet Datensätze basierend auf einem gegebenen Set. Diese Methode ist veraltet und sollte nicht mehr verwendet werden. Stattdessen direkt die Methode getBenefits() eines Stellenangebots verwenden.

### `getIcon() : ?string`

Gibt das Bootstrap 5 Icon des Vorteils zurück.

### `setIcon(mixed $value) : self`

Setzt das Bootstrap 5 Icon des Vorteils.

### `getIconCustom(bool $asMedia = false) : mixed`

Gibt das benutzerdefinierte Icon des Vorteils zurück. Wenn `asMedia` true ist, wird das Icon als rex_media-Objekt zurückgegeben. Andernfalls wird der Dateiname zurückgegeben.

### `setIconCustom(string $filename) : self`

Setzt das benutzerdefinierte Icon des Vorteils.

### `getName() : ?string`

Gibt den Namen des Vorteils zurück.

### `setName(mixed $value) : self`

Setzt den Namen des Vorteils.

### `getHighlight(bool $asBool = false) : mixed`

Gibt den Highlight-Status des Vorteils zurück. Wenn `asBool` true ist, wird der Highlight-Status als boolscher Wert zurückgegeben. Andernfalls wird der Wert so zurückgegeben, wie er in der Datenbank gespeichert ist.

### `setHighlight(int $value = 1) : self`

Setzt den Highlight-Status des Vorteils. Standardmäßig ist dieser Wert auf 1 gesetzt.

### `getDescription(bool $asPlaintext = false) : ?string`

Gibt die Beschreibung des Vorteils zurück. Wenn `asPlaintext` true ist, wird die Beschreibung ohne HTML-Tags zurückgegeben.

### `setDescription(mixed $value) : self`

Setzt die Beschreibung des Vorteils.

### `showIcon(): void`

Zeigt das Icon des Vorteils an. Wenn ein benutzerdefiniertes Icon gesetzt ist, wird dieses angezeigt. Andernfalls wird das Bootstrap 5 Icon angezeigt.
