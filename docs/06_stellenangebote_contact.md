# `Contact`-Objekt

Diese Klasse repräsentiert die Ansprechperson zu einem Stellenangebot bei einer Bewerbung. Sie erbt von der Klasse rex_yform_manager_dataset und stellt Methoden zur Verfügung, um auf die Daten der Ansprechperson zuzugreifen und diese zu verändern.

Beispiel für die Verwendung:

```php

$contact = Contact::get($id);
if ($contact) {
    echo $contact->getName('name');
    echo $contact->getStatus();
    echo $contact->getMail();
    echo $contact->getPhone();
    echo $contact->getDescription();
    echo $contact->getPhoto();
    echo $contact->getMedia();
    echo $contact->getImage();

    // eigene Felder klassisch via getValue()
    // echo $contact->getValue('mein_feld');
}
```

```php
$contact = stellenangebote_contact::create();

$contact->setStatus(1);
$contact->setName('John Doe');
$contact->setMail('johndoe@example.com');
$contact->setPhone('0123456789');
$contact->setDescription('<p>Dies ist eine Beschreibung.</p>');
$contact->setPhoto('portrait.jpg');

// eigene Felder klassisch via setValue()
// $contact->setValue('mein_feld', 'mein_wert');

$contact->save();
```

## `getStatus()`

Gibt an, ob die Ansprechperson auswählbar ist / gezeigt werden soll. Gibt den Status der Ansprechperson oder null zurück, wenn kein Status gesetzt ist.

## `setStatus($value)`

Setzt den Status der Ansprechperson, ob die Ansprechperson auswählbar ist / gezeigt werden soll.

## `getName()`

Gibt den Namen der Ansprechperson zurück. Gibt den Namen der Ansprechperson oder null zurück, wenn kein Name gesetzt ist.

## `setName($value)`

Setzt den Namen der Ansprechperson.

## `getMail()`

Gibt die E-Mail-Adresse der Ansprechperson zurück. Gibt die E-Mail-Adresse der Ansprechperson oder null zurück, wenn keine E-Mail-Adresse gesetzt ist.

## `setMail($value)`

Setzt die E-Mail-Adresse der Ansprechperson.

## `getPhone()`

Gibt die Telefonnummer der Ansprechperson zurück. Gibt die Telefonnummer der Ansprechperson oder null zurück, wenn keine Telefonnummer gesetzt ist.

## `setPhone($value)`

Setzt die Telefonnummer der Ansprechperson.

## `getDescription($asPlaintext = false)`

Gibt die Beschreibung der Ansprechperson zurück. Wenn $asPlaintext auf true gesetzt ist, wird die Beschreibung ohne HTML-Tags zurückgegeben.

## `setDescription($value)`

Setzt die Beschreibung der Ansprechperson.

## `getPhoto($asMedia = false)`

Gibt das Portraitfoto der Ansprechperson zurück. Wenn $asMedia auf true gesetzt ist, wird ein rex_media-Objekt zurückgegeben.

## `getMedia()`

Gibt das Portraitfoto der Ansprechperson als rex_media-Objekt zurück.

## `getImage()`

Gibt das Portraitfoto der Ansprechperson als String zurück.

## `setPhoto($filename)`

Setzt das Portraitfoto der Ansprechperson. Das Foto muss als Dateiname eines Bildes in rex_media angegeben werden.
