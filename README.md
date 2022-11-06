# Stellenangebote AddOn für REDAXO

Ein Addon zum Verwalten von Stellenanzeigen in REDAXO mit sinnvollen Vorlagen für Bewerbungsformulare und einer Verwaltung von Bewerberdaten.

## Features

* Vollständig mit **YForm** umgesetzt: Alle Features und Anpassungsmöglichkeiten von YForm verfügbar
* Einfach: Die Ausgabe erfolgt über [`rex_sql`](https://redaxo.org/doku/master/datenbank-queries) oder objektorientiert über [YOrm](https://github.com/yakamara/redaxo_yform_docs/blob/master/de_de/yorm.md)
* Flexibel: Stellenanzeigen lassen sich auf **Offline**, **Entwurf** oder **Online** stellen
* Sinnvoll: Nur ausgewählte **Rollen**/Redakteure haben Zugriff
* Suchmaschinenoptimiert: Bereit für das [JSON+LD-Format](https://jsonld.com/question-and-answer/) und Strucured Data auf Basis von schema.org
* Bereit für mehr: Kompatibel zum [URL2-Addon](https://github.com/tbaddade/redaxo_url)
* Bereit für noch mehr: Inklusive Bewerbungsformular-Vorlage!
* Bereit für viel mehr: Inklusive Bewerbungsformular-Vorlage!

> **Tipp:** Das Addon arbeitet hervorragend zusammen mit der Status-Funktion von [`yform_usability`](https://github.com/FriendsOfREDAXO/yform_usability/).

> **Steuere eigene Verbesserungen** dem [GitHub-Repository von Stellenangebote](https://github.com/alexplusde/stellenangebote) bei. Oder **unterstütze dieses Addon:** Mit einer [Beauftragung unterstützt du die Weiterentwicklung dieses AddOns](https://github.com/sponsors/alexplusde)

### Einstellungs-Seite

Folgt...

## Vorgefertigte Klassen

Neben der allgemeinen Methoden von YOrm <https://github.com/yakamara/redaxo_yform/blob/master/docs/04_yorm.md> gibt es spezifische Methoden der einzelnen Klassen.

### Die Klasse `stellenangebote`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_stellenangebote` mit Fragen und Antworten zu.

```php
$stelle = stellenangebote::get(3); // Stellenangebot mit der id=3
```

### Die Klasse `stellenangebote_contact`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_stellenangebote_contact` auf die Ansprechperson der Stelle zu.

### Die Klasse `stellenangebote_location`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_stellenangebote_location` mit Standorten des Unternehmens zu.

### Die Klasse `stellenangebote_apply`

Typ `rex_yform_manager_dataset`. Greift auf die Tabelle `rex_stellenangebote_apply` mit Bewerberdaten zu, sofern das Bewerberformular verfügbar ist.

## Lizenz

MIT Lizenz, siehe [LICENSE](https://github.com/alexplusde/stellenangebote/blob/master/LICENSE)

## Autoren

**Alexander Walther**  
http://www.alexplus.de  
https://github.com/alexplusde  

**Projekt-Lead**  
[Alexander Walther](https://github.com/alexplusde)

## Credits

stellenangebote basiert auf: [YForm](https://github.com/yakamara/redaxo_yform)  
