# Projektübersicht

Dieses Projekt enthält zwei Ordner, die Beispiele für sicheres und unsicheres PHP-Coding zeigen:

- `savecode`: Enthält sicher implementierten Code, der SQL-Injection-Angriffe verhindert.
- `unsavecode`: Enthält unsicher implementierten Code, der anfällig für SQL-Injection-Angriffe ist.

## Nutzung

### Vorbereitungen

1. **Installiere XAMPP**:
   - Lade XAMPP von der [offiziellen Website] herunter und installiere es, falls noch nicht geschehen.

2. **Starte XAMPP**:
   - Öffne das XAMPP Control Panel.
   - Starte die Module **Apache** und **MySQL**.

### Projektdateien platzieren

1. **Navigiere zum `htdocs`-Verzeichnis**:
   - Der Standardpfad für das `htdocs`-Verzeichnis auf Windows ist `C:\xampp\htdocs`.
   - Der Standardpfad auf macOS ist `/Applications/XAMPP/htdocs`.

2. **Erstelle einen neuen Ordner für das Projekt**:
   - Erstelle einen neuen Ordner namens `my_projects` im `htdocs`-Verzeichnis.

3. **Platziere die Projektdateien**:
   - Lege die Ordner `savecode` und `unsavecode` innerhalb von `my_projects` ab.
   - Die Struktur sollte so aussehen:
     ```
     xampp/
     └── htdocs/
         └── my_projects/
             ├── savecode/
             │   ├── login.html
             │   └── login.php
             └── unsavecode/
                 ├── login.html
                 └── login.php
     ```

### Zugriff auf die Projekte

1. **Sicheres Beispiel (`savecode`)**:
   - Öffne deinen Webbrowser und gehe zu [http://localhost/my_projects/savecode/login.html](http://localhost/my_projects/savecode/login.html).
   - Teste das Login-System, das Prepared Statements verwendet, um SQL-Injection-Angriffe zu verhindern.

2. **Unsicheres Beispiel (`unsavecode`)**:
   - Öffne deinen Webbrowser und gehe zu [http://localhost/my_projects/unsavecode/login.html](http://localhost/my_projects/unsavecode/login.html).
   - Teste das Login-System, das anfällig für SQL-Injection ist. Versuche, SQL-Injection-Angriffe durchzuführen:
     - **Benutzername:** `admin`
     - **Passwort:** `' OR '1'='1`
     oder
     - **Benutzername:** `admin #`
     - **Passwort:** ``

## Hinweise 

- **Sicherheits- und Bildungszweck**: Dieser Abschnitt erklärt detailliert, warum der unsichere Code vorhanden ist und wie er als Lernwerkzeug verwendet wird. Es wird betont, dass der Code nur für Bildungszwecke gedacht ist und nicht in echten Anwendungen eingesetzt werden sollte.
- **Verwendung des Codes**: Hier wird klar gemacht, dass der unsichere Code nur für Tests und Lernzwecke verwendet werden soll.
