# `Location`-Objekt

Die Klasse `Alexplusde\Stellenangebote\Location` repräsentiert einen Standort, an dem eine Tätigkeit ausgeführt wird, oder eine Filiale/Niederlassung in Bezug auf ein Stellenangebot in der Datenbank. Sie erbt von der Klasse `rex_yform_manager_dataset` und stellt Methoden zur Verfügung, um auf die Daten des Standorts zuzugreifen und diese zu manipulieren.

## Beispiele

```php
// Holen Sie sich ein Standortobjekt anhand der ID
$location = Alexplusde\Stellenangebote\Location::get($id);
if ($location) {
    echo $location->getGooglePlaces();
    echo $location->getName();
    echo $location->getStreet();
    echo $location->getZip();
    echo $location->getLocality();
    echo $location->getCountrycode();
    echo $location->getLatLng();
    echo $location->getLat();
    echo $location->getLng();
    echo $location->getUpdateuser();
    echo $location->getCreateuser();
    // eigene Felder klassisch via getValue()
    // echo $location->getValue('mein_feld');
}
```

```php
$location = Alexplusde\Stellenangebote\Location::create();

$location->setGooglePlaces('Embed-Code');
$location->setName('Firmenname');
$location->setStreet('Straße');
$location->setZip('12345');
$location->setLocality('Stadt');
$location->setCountrycode('DE');
$location->setLat('52.5200');
$location->setLng('13.4050');
$location->setUpdateuser('username');
$location->setCreateuser('username');

// eigene Felder klassisch via setValue()
// $location->setValue('mein_feld', 'mein_wert');
$location->save();
```

## Methoden

### `getGooglePlaces()`

Gibt den Google Places Embed-Code des Standorts zurück.

### `setGooglePlaces(mixed $value)`

Setzt den Google Places Embed-Code des Standorts.

### `getAsString()`

Gibt die Adresse des Standorts als String zurück.

### `getFormattedAddress()`

Gibt die formatierte Adresse des Standorts zurück.

### `getName()`

Gibt den Namen des Standorts zurück, z.B. Firmenname, Filialname oder Niederlassung.

### `setName(mixed $value)`

Setzt den Namen des Standorts, z.B. Firmenname, Filialname oder Niederlassung.

### `getStreet()`

Gibt die Straße des Standorts zurück.

### `setStreet(mixed $value)`

Setzt die Straße des Standorts.

### `getZip()`

Gibt die Postleitzahl des Standorts zurück.

### `setZip(mixed $value)`

Setzt die Postleitzahl des Standorts.

### `getLocality()`

Gibt die Stadt des Standorts zurück.

### `setLocality(mixed $value)`

Setzt die Stadt des Standorts.

### `getCountrycode()`

Gibt den Ländercode des Standorts zurück.

### `setCountrycode(mixed $value)`

Setzt den Ländercode des Standorts.

### `getLatLng()`

Gibt den Längen- und Breitengrad des Standorts zurück.

### `setLatLng(mixed $value)`

Setzt den Längen- und Breitengrad des Standorts.

### `getLat()`

Gibt den Breitengrad des Standorts zurück.

### `setLat(mixed $value)`

Setzt den Breitengrad des Standorts.

### `getLng()`

Gibt den Längengrad des Standorts zurück.

### `setLng(mixed $value)`

Setzt den Längengrad des Standorts.

### `getUpdateuser()`

Gibt den Benutzer zurück, der den Standort zuletzt geändert hat.

### `setUpdateuser(mixed $value)`

Setzt den Benutzer, der den Standort zuletzt geändert hat.

### `getCreateuser()`

Gibt den Benutzer zurück, der den Standort erstellt hat.

### `setCreateuser(mixed $value)`

Setzt den Benutzer, der den Standort erstellt hat.
