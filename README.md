# Salierpraxis – Webseite

Neue Webseite der **Salierpraxis** (Zahnarztpraxis, Düsseldorf-Oberkassel und Kempen).
Statisches HTML, 21 Seiten, Design-Variante C („Behutsames Update").
Erstellt von AO Consulting GmbH, Stand 08.09.2026.

## Aufbau

| Ordner | Inhalt |
|---|---|
| `website/` | **Die Webseite.** Nur was hier liegt, geht online. |
| `doku/` | Übergabe, Livegang, fachliche Freigabe der Leistungstexte, SEO |
| `.github/workflows/` | Die zwei Abläufe: Vorschau und Livegang |

Seiten: Startseite, Leistungen (Übersicht + 12 Detailseiten), Standorte Düsseldorf
und Kempen, Notdienst, Kontakt, Impressum, Datenschutz, 404.

## Die zwei Zweige

- **`main` = Vorschau.** Jede Änderung erscheint nach 1–2 Minuten unter
  <https://salierpraxis.vorschau.ao-consult.de>. Suchmaschinen sind dort ausgesperrt.
- **`live` = echte Webseite.** Erst wenn der Zweig `live` auf den Stand von `main`
  gesetzt wird, lädt GitHub die Dateien zum Hoster hoch.

Nichts geht ohne Freigabe live.

## Regeln

1. Änderungen immer zuerst in der Vorschau prüfen, dann dem Kunden zeigen.
2. Keine externen Schriften, Skripte, Karten oder Tracker. Die Seite nutzt
   Systemschriften, es gibt keine Cookies und keine Einbettungen.
3. Impressum und Datenschutz nur nach Rücksprache mit der Praxis ändern.
4. Zugangsdaten in den Passwort-Manager und in GitHub-Secrets, nie in Dateien.

## Vor dem Livegang zu erledigen

- **Kontaktformular verschickt noch nichts** (`action="#"`, `onsubmit="return false"`).
  Für den Versand kommt ein PHP-Skript beim Hoster dazu, plus Honeypot gegen Spam.
  Empfängeradresse mit der Praxis abstimmen. Bei Gesundheitsdaten im Freitextfeld
  auf Verschlüsselung und Hinweistext achten.
- Offene **[PRÜFEN]-Punkte** aus der Übergabe abklären (Online-Terminbuchung,
  Notdienstnummer, Aufsichtsbehörde im Impressum juristisch bestätigen) –
  Liste in `doku/uebergabe-und-livegang.md`, Abschnitt A.2.
- Fachliche **Freigabe der Leistungstexte** durch die Praxis (Abschnitt B).
- Die Seiten verweisen bereits auf `www.salierpraxis.de`. Vor dem Livegang prüfen,
  dass alle Adressen der alten Seite weiter funktionieren (Weiterleitungen).
