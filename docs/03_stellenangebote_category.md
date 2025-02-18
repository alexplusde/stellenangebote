# `Category`-Objekt

Die Klasse Alexplusde\Stellenangebote\Category repräsentiert die Kategorie eines Stellenangebots in der Datenbank. Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung, um auf die Daten der Kategorie zuzugreifen und diese zu manipulieren. Beispiele für Kategorien sind "Allgemein", "Marketing", "Vertrieb", "IT" usw.

```php
// Holen Sie sich ein Kategorieobjekt anhand der ID
$category = Alexplusde\Stellenangebote\Category::get($id);

if($category) {
    // Zugriff auf die Werte mit den Getter-Methoden
    echo $category->getIcon();
    echo $category->getImage();
    echo $category->getName();
    echo $category->getHighlight();
    echo $category->getDescription();
    echo $category->getStatus();
    echo $category->getPrio();

    // eigene Felder klassisch via getValue()
    // echo $category->getValue('mein_feld');
}
```

```php
// Erstellen Sie ein neues Kategorieobjekt
$category = Alexplusde\Stellenangebote\Category::create();

// Setzen Sie die Werte mit den Setter-Methoden
$category->setIcon('icon-css-class');
$category->setImage('image.jpg');
$category->setName('IT');
$category->setHighlight(1);
$category->setDescription('Beschreibung der Kategorie');
$category->setStatus('status');
$category->setPrio(1);

// eigene Felder klassisch via setValue()
// $category->setValue('mein_feld', 'mein_wert');

// Speichern Sie das Objekt
$category->save();
```

## Methoden

### `getIcon()`

Gibt das Icon (Bootstrap Icon-Bibliothek) der Kategorie zurück.

### `setIcon(mixed $value)`

Setzt das Icon (Bootstrap Icon-Bibliothek) der Kategorie.

### `getImage(bool $asMedia = false)`

Gibt das Titelbild der Kategorie zurück. Wenn `$asMedia` true ist, wird das Bild als rex_media-Objekt zurückgegeben. Andernfalls wird der Dateiname zurückgegeben.

### `setImage(string $filename)`

Setzt das Titelbild der Kategorie.

### `getMedia()`

Gibt das Titelbild der Kategorie als rex_media-Objekt zurück.

### `getName()`

Gibt den Namen der Kategorie zurück.

### `setName(mixed $value)`

Setzt den Namen der Kategorie.

### `getHighlight(bool $asBool = false)`

Gibt an, ob die Kategorie hervorgehoben werden soll. Wenn `$asBool` true ist, wird der Highlight-Status als boolscher Wert zurückgegeben. Andernfalls wird der Wert so zurückgegeben, wie er in der Datenbank gespeichert ist.

### `setHighlight(int $value = 1)`

Setzt, ob die Kategorie hervorgehoben werden soll.

### `getDescription(bool $asPlaintext = false)`

Gibt die Beschreibung der Kategorie zurück. Wenn `$asPlaintext` true ist, wird die Beschreibung ohne HTML-Tags zurückgegeben.

### `setDescription(mixed $value)`

Setzt die Beschreibung der Kategorie.

### `getStatus()`

Gibt den Status der Kategorie zurück.

### `setStatus(mixed $param)`

Setzt den Status der Kategorie.

### `getPrio()`

Gibt die Priorität der Kategorie zurück.

### `setPrio(int $value)`

Setzt die Priorität der Kategorie.
