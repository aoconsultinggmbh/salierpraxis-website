# Übergabe — Neue Webseite Salierpraxis

Stand: 08.09.2026 · Design-Variante C · statisches HTML-Paket in `site/` (21 Seiten)

Dieses Dokument bündelt drei Teile:

1. **Technische Übergabe & Livegang** (Abschnitt A)
2. **Fachliche Freigabe der Leistungstexte** (Abschnitt B)
3. **SEO/GEO — was eingebaut ist und was noch zu tun ist** (Abschnitt C)

---

# A. Technische Übergabe & Livegang


Stand: 08.09.2026 · Design-Variante C („Behutsames Update", umgesetzt nach Vorlage
`webseiten-mockups-workspace/…/mockups/variante-a/`). Ausgabe in `site/`,
Generator für die Leistungs-Detailseiten: `build_leistungen.py` (Projektroot,
Aufruf `python3 build_leistungen.py`), QC-Screenshots in `qc/`.

---

### 1. Getroffene Annahmen

- **Startseiten-Leistungsteaser:** 6 Kacheln (Prophylaxe, Implantologie, Zahnersatz,
  Lachgassedierung, Vollnarkose, Pinhole-Technik) gemäß der Auswahl in
  `startseite.md`, jeweils direkt auf die Detailseiten verlinkt, plus Button
  „Alle 12 Leistungen ansehen" → `leistungen.html`. „Kinderzahnheilkunde" aus der
  Teaser-Auswahl hat keine eigene Leistungsseite und wird stattdessen prominent auf
  der Kempen-Seite behandelt.
- **Info-Strip Startseite:** Dritte Zelle zeigt die USP „Intraoral-Scanner"
  statt des TV-Bezugs aus dem Mockup (TV-Bezug ist laut README zu klären, siehe
  Punkt 3; er erscheint weiterhin — sachlich formuliert — im Team-Abschnitt).
- **Fakten-Karten der Detailseiten:** Die je 3 Fakten-Karten sind redaktionelle
  Verdichtungen aus den Content-Texten (v. a. „Gut zu wissen"), gepflegt im
  Generator (`build_leistungen.py`, Dict `KONFIG`).
- **Bilder:** Leistungs-Zuordnung exakt wie im Mockup vorgegeben. Seitenspalten- und
  Standort-/Teambilder wurden aus dem restlichen Bildpool sinnvoll zugeordnet
  (ebenfalls in `KONFIG` bzw. den Seiten dokumentiert). Alt-Texte generisch-korrekt,
  da keine Bildbeschreibungen vorlagen.
- **Telefonformat:** Sichtbar wie im Mockup („0211 – 550 24 80"), technisch als
  `tel:+49…`-Links.
- **Anfahrt:** Auf den Standortseiten nur neutrale Hinweise + Google-Maps-Button
  (Route öffnet extern, keine Karteneinbettung). Konkrete Angaben zu Parken/ÖPNV/
  Barrierefreiheit fehlen im Content (siehe Punkt 2) — als „gern telefonisch"
  formuliert.
- **Impressum:** Aufsichtsbehörde bereits mit aktuellem Namen („Ministerium für
  Arbeit, Gesundheit und Soziales NRW") gesetzt, wie im Content empfohlen —
  juristisch bestätigen lassen. Abschnitte USt-IdNr. und „Design/Umsetzung"
  weggelassen (alte Angaben veraltet/nicht vorhanden).
- **Notdienst:** Erste-Hilfe-Tipps bei Zahnunfällen ergänzt (Vorschlag aus
  `notdienst.md`); Apotheken-Notdienst als Link auf aponet.de statt dynamischem
  Widget (statisches Paket, keine externen Einbettungen/Tracker).
- **Kein Canonical, keine externen Fonts/CDNs, keine Cookies/Tracker** — wie gefordert.
- **Inman Aligner / Beautiful Smile:** nirgends erwähnt (per Skript geprüft).

### 2. [PRÜFEN]-Punkte aus dem Content (nicht auf die Seiten übernommen)

1. **Online-Terminbuchung** (z. B. Doctolib) gewünscht? (startseite.md)
2. **Notdienstnummer 01805 986700** (KZV Nordrhein): auf der Notdienstseite
   verwendet, aber auf der alten Website nicht genannt — **vor Livegang verifizieren**;
   ebenso die Online-Suche www.zahnaerzte-nrw.de.
3. **RTL2-Bezug „Extrem Schön!":** klären, ob weiterhin aktiv beworben werden soll
   (Sendung nicht mehr in Produktion). Aktuell sachlich im Team-Abschnitt erwähnt.
4. **Teamzuordnung Kempen:** Welche Düsseldorfer Behandler sind regelmäßig in
   Kempen tätig? (Auf der Kempen-Seite bewusst allgemein formuliert.)
5. **Anfahrt/Parken/ÖPNV/Barrierefreiheit** beider Standorte: beim Praxisteam
   einholen und auf den Standortseiten ergänzen.
6. **Behandler-Vitae/Fotos/Qualifikationen:** beim Praxisteam anfragen (für eine
   spätere Team-Seite).
7. **Kassen-/Kostenhinweise** in den Leistungstexten basieren auf allgemeinem
   Fachwissen — fachlich verifizieren lassen.
8. **Facebook-/Jameda-Profile:** aktuelle URLs unbekannt — daher nicht verlinkt;
   bei Bedarf auf der Kontaktseite ergänzen.
9. **Impressum:** aktuelle Bezeichnung der Aufsichtsbehörde bestätigen; klären, ob
   USt-IdNr. anzugeben ist; neuen technischen Dienstleister eintragen.

### 3. Hinweise für den Livegang

- **Kontaktformular** (`kontakt.html`) ist eine Attrappe (Absenden ohne Funktion,
  HTML-Kommentar im Quelltext markiert die Stelle). Anbindung bei Livegang:
  serverseitiger Versand, SSL, unsichtbarer Spamschutz (Honeypot) statt CAPTCHA.
- **Datenschutzerklärung** (`datenschutz.html`) ist eine generische Struktur-Vorlage.
  **Bitte durch Rechtstexte des Datenschutzbeauftragten ersetzen** (so auch als
  HTML-Kommentar im Quelltext vermerkt; Platzhalter für DSB, Hosting/AVV,
  Formular-Details und Stand/Datum als Kommentare markiert).
- **Redirects (301) von den alten URLs**, mindestens:
  - `leistungen_paradontitis.php` (Tippfehler in der alten URL!) →
    `leistungen/parodontitis.html`
  - alle übrigen `leistungen_<name>.php` → `leistungen/<slug>.html`
  - `leistungen_inman.php` / „Beautiful Smile"-Seiten (nicht mehr im Angebot) →
    `leistungen.html`
  - `duesseldorf.php` → `duesseldorf.html`, `kempen.php` → `kempen.html`,
    `kontakt.php` → `kontakt.html`, `notdienst.php` → `notdienst.html`,
    `impressum.php` → `impressum.html`
- **Domainstrategie:** salierpraxis.de und salierpraxis-duesseldorf.de führen bisher
  teils unterschiedliche Inhalte. Empfehlung: **eine** Hauptdomain festlegen
  (naheliegend: salierpraxis.de, da standortübergreifend), die andere per 301
  komplett weiterleiten; erst danach ggf. Canonical-Tags ergänzen.
- **404-Seite:** `404.html` liegt bei; im Webserver konfigurieren
  (z. B. Apache: `ErrorDocument 404 /404.html`).
- **Notdienst-Widget:** Falls gewünscht, kann das statische aponet-Linkziel später
  durch ein dynamisches Apotheken-Notdienst-Widget ersetzt werden (Datenschutz
  prüfen — aktuell bewusst keine Dritteinbettung).
- **OG-Image:** og:title/og:description sind gesetzt; ein og:image kann nach Wahl
  eines offiziellen Praxismotivs ergänzt werden.

### 4. Qualitätskontrolle (durchgeführt)

- Alle 21 Seiten mit Playwright (Chromium, file://) bei **1440 px und 390 px** als
  Full-Page-Screenshots gerendert (`qc/`, verkleinerte Sichtprüfungen in
  `qc/thumbs/`), inkl. geöffnetem Mobilmenü; Layoutfehler behoben
  (u. a. Button-Abstände in CTA-Bereichen, Alt-Text Notdienst-Hero).
- Link-/Bildprüfung per Skript: **405 interne Links und 47 Bildpfade — alle gültig**;
  6 externe Links (Karriere, 2× Google-Maps-Route, Zahnärztekammer, zahnaerzte-nrw,
  aponet). Begriffe „Inman"/„Beautiful Smile" kommen nirgends vor.
- Genau ein `<h1>` pro Seite, `lang="de"`, Titel + Meta-Description + og-Tags auf
  allen Seiten, keine externen CDNs/Fonts, kein Canonical.
- **Nachtrag (Feinschliff):** Die Ablauf-Schritte auf den Detailseiten hatten teils
  Überschriften, teils nur Text. Alle 60 Schritte (12 × 5) haben jetzt einen kurzen
  Titel; gepflegt in `content/leistungen/*.md` im Format `Titel: Beschreibung`
  (Skript `fix_steps.py`), Seiten danach mit `build_leistungen.py` neu erzeugt und
  erneut visuell geprüft.


---

# B. Fachliche Freigabe der Leistungstexte


Stand: 08.09.2026 · Diese Datei sammelt **neue fachliche Aussagen**, die beim
inhaltlichen Ausbau der Leistungs-Detailseiten entstanden sind und die die
Praxis vor dem Livegang bestätigen sollte. Grundlage sind allgemeines
zahnmedizinisches Fachwissen und der vorhandene Content — **keine** Angaben aus
Praxisunterlagen. Quellen: `content/leistungen/*.md`, Generator
`build_leistungen.py`, Prüfskripte `qc_check_leistungen.py` /
`qc_render_leistungen.py`.

Bitte nach der Prüfung direkt in `content/leistungen/<slug>.md` korrigieren und
`python3 build_leistungen.py` erneut aufrufen.

---

### 1. Zeitangaben („Dauer: …") — bitte an die Praxisrealität anpassen

Jede Seite enthält jetzt eine Dauer-Angabe. Die Werte sind bewusst als Bereiche
und mit „in der Regel" / „je nach Umfang" formuliert, stammen aber **nicht** aus
der Praxis:

| Leistung | Angabe auf der Seite |
|---|---|
| Prophylaxe | etwa 45–60 Min. pro Sitzung |
| Implantologie | Eingriff etwa 30–60 Min. pro Implantat, Gesamtbehandlung einige Monate |
| Zahnersatz | zwei bis vier Termine über etwa zwei bis vier Wochen |
| Füllungen | Komposit etwa 30–60 Min., Inlay zwei Termine |
| Endodontie | etwa 60–90 Min. pro Sitzung, eine bis drei Sitzungen |
| Parodontitis | zwei bis vier Termine + dauerhafte Nachsorge |
| Veneers | zwei bis drei Termine über etwa zwei bis drei Wochen |
| Bleaching | zwei Praxistermine + Anwendung zu Hause ein bis zwei Wochen |
| Lachgassedierung | Ausleitung etwa fünf Minuten |
| Vollnarkose | eine bis mehrere Stunden + Aufwachphase |
| Pinhole | etwa 30–60 Min. (Angabe war bereits im Bestandstext) |
| Kiefergelenkstherapie | Untersuchung etwa 45–60 Min., Schiene nach ein bis zwei Wochen |

### 2. Abrechnungs- und Kassenaussagen (Abschnitt „Kosten und Krankenkasse")

Konkrete Euro-Beträge kommen nirgends vor; alle Aussagen sind mit „in der Regel",
„je nach Befund/Tarif" relativiert. Trotzdem fachlich bestätigen lassen:

1. **Prophylaxe:** Zahnsteinentfernung als Kassenleistung „üblicherweise einmal
   im Kalenderjahr"; PZR-Zuschüsse „je nach Kasse und Tarif".
2. **Endodontie:** Hinweis auf die Voraussetzungen, unter denen die Kasse eine
   Wurzelbehandlung an **Backenzähnen** übernimmt (geschlossene Zahnreihe /
   Erhalt vorhandenen Zahnersatzes) — Formulierung bewusst allgemein.
3. **Parodontitis:** Beschreibung der gesetzlichen Behandlungsstrecke
   (Befund → Antrag → AIT → Nachsorge/UPT, „mehrjährig", schweregradabhängig).
4. **Füllungen:** „ausreichende und zweckmäßige Grundversorgung" je für Front-
   und Seitenzahnbereich; Mehrkostenvereinbarung bei Komposit/Inlay.
5. **Füllungen, FAQ „Bekommt man heute noch Amalgam?":** Aussage, dass Amalgam
   **seit 2025** nicht mehr für neue Füllungen verwendet wird (EU-Quecksilber-
   verordnung). Bitte gegenprüfen, ob die Praxis das so kommunizieren will.
6. **Vollnarkose:** Kassenübernahme „nur in medizinisch begründeten Fällen —
   etwa bei Kindern unter einer bestimmten Altersgrenze, bei Menschen mit
   Beeinträchtigung". Die Altersgrenze ist absichtlich nicht bezeichnet.
7. **Kiefergelenkstherapie:** Aufbissschiene bei Knirschen „in der Regel
   Kassenleistung", instrumentelle Funktionsanalyse als Privatleistung.
8. **Zahnersatz:** Festzuschuss, Bonusheft, Härtefallregelung, Genehmigung vor
   Anfertigung — generische Darstellung, bitte auf Aktualität prüfen.
9. Jeder Kosten-Abschnitt endet mit einem Standard-Hinweissatz
   („Die Angaben sind allgemeine Hinweise …"). Text steht im Generator
   (`kosten_section`), nicht im Markdown — dort zentral änderbar.

### 3. Aussagen zu Behandlern, Standorten und Ausstattung

Bitte bestätigen, dass diese Zuordnungen stimmen und so genannt werden dürfen:

- **Implantologie:** „Schwerpunkt von Dr. med. dent. Patrick Ilbag"; zusätzlich
  „Implantiert wird an beiden Standorten, in Düsseldorf-Oberkassel und in Kempen."
- **Zahnersatz:** „die prothetische Planung ist ein Schwerpunkt von Oliver Brux
  und Dr. med. dent. Patrick Ilbag".
- **Endodontie:** „in der Salierpraxis ist die Endodontologie ein Schwerpunkt von
  Shirley Hendricks".
- **Veneers / Bleaching:** ästhetische Zahnmedizin als Schwerpunkt von
  „Dr. med. dent. Alexander Ilbag M.Sc.".
- **Pinhole:** „Die Behandlung führt Dr. Alexander Ilbag durch; Termine sind an
  beiden Standorten möglich." (Zertifizierungsaussage stammt aus dem Bestandstext.)
- **Lachgassedierung:** „Angeboten wird sie in Düsseldorf-Oberkassel und in
  Kempen." — **bitte prüfen, ob Lachgas tatsächlich an beiden Standorten
  verfügbar ist.**
- **Parodontitis:** „Beide Standorte … bieten die Behandlung an."
- **Prophylaxe:** „In Düsseldorf-Oberkassel und in Kempen übernehmen speziell
  geschulte Mitarbeiterinnen die Reinigung." — bitte Formulierung/Qualifikation
  bestätigen (ZMP/ZMF?).
- **Kinder:** In *Lachgassedierung* und *Vollnarkose* ist auf
  „Dr. Marthe Blecher, Standort Kempen" verwiesen. Bitte prüfen, ob Kinder in
  Narkose/mit Lachgas in Kempen behandelt werden oder ob der Verweis anders
  lauten soll.
- **Vollnarkose:** Der Text setzt voraus, dass ein **externer Anästhesist** in der
  Praxis narkotisiert, die Aufwachphase in der Praxis stattfindet und der
  Anästhesist **separat abrechnet**. Bitte Ablauf und Abrechnungsweg bestätigen.
- **Bleaching:** Es ist ausschließlich **Home-Bleaching mit Laborschienen**
  beschrieben (wie im Bestandstext). Falls zusätzlich In-Office-Bleaching
  angeboten wird, fehlt das.
- **Zahnersatz / Bleaching / Kiefergelenk / Veneers:** durchgehend
  „Meisterlabor" und teils „digitaler Scan / Intraoral-Scanner" als Option —
  bitte bestätigen, dass digitale Abformung für alle genannten Fälle möglich ist.

### 4. Medizinische Aussagen, die eine Praxis mittragen sollte

Alles ohne Heilsversprechen und mit „in der Regel"/„meist" formuliert; dennoch
zur fachlichen Freigabe:

- **Kontraindikationen Lachgas:** behinderte Nasenatmung, bestimmte
  Lungenerkrankungen, Frühschwangerschaft, Vitamin-B12-Mangel, kurz nach
  Augen-/Ohroperationen.
- **Nüchternheit Vollnarkose:** „sechs Stunden nichts essen, zwei Stunden keine
  klaren Flüssigkeiten" — ausdrücklich mit dem Zusatz, dass die Vorgaben des
  Anästhesisten maßgeblich sind. Bitte an die Praxisvorgaben anpassen.
- **Bleaching:** „Bei Kindern und Jugendlichen unter 18 Jahren, in Schwangerschaft
  und Stillzeit wird von einer Aufhellung abgeraten"; Ergebnis hält „ein bis drei
  Jahre".
- **Haltbarkeiten:** Füllung „häufig fünf bis zehn Jahre", Zahnersatz „häufig
  zehn Jahre und länger", Veneers „häufig zehn Jahre und länger", Implantat
  „viele Jahre bis Jahrzehnte", jeweils mit ausdrücklichem Hinweis, dass es
  keine Garantie gibt.
- **Parodontitis:** Nachsorge „zwei- bis viermal jährlich"; Zusammenhang mit
  Herz-Kreislauf-/rheumatischen Erkrankungen (war bereits im Bestandstext).
- **Implantologie:** Periimplantitis-Risiko, Rauchen verschlechtert die
  Aussichten „messbar", Knirschen als Risikofaktor.
- **Pinhole:** „Neues Zahnfleisch wächst nicht nach — vorhandenes Gewebe wird
  verlagert"; Nachsorgehinweise (ein bis zwei Wochen nicht putzen, weich essen).
  Bitte an das Merkblatt der Praxis anpassen.
- **Kiefergelenkstherapie:** Abgrenzung zu HNO/Orthopädie, Empfehlung gegen
  Fertigschienen aus dem Handel, Kooperation mit Physiotherapie.
- **Prophylaxe:** „etwa eine Stunde nach der Fluoridierung nichts essen".

### 5. Redaktionelle Hinweise

- **Alt-Texte** sind weiterhin bewusst generisch gehalten (Leistung + Praxis +
  Standorte), da keine Bildbeschreibungen vorliegen. Sie beschreiben also **nicht**
  den Bildinhalt. Sobald Bildbeschreibungen vorliegen: `build_leistungen.py`
  (`bild_alt` / `seitenbild_alt` in `build_page`, Kartenbilder in
  `verwandt_section`).
- **Interne Verlinkung:** Jede Seite verweist auf zwei bis drei verwandte
  Leistungen (Abschnitt „Verwandte Leistungen" im Markdown, Format
  `- <slug>: <Satz>`). Nur die 12 vorhandenen Slugs sind zulässig; unbekannte
  Slugs werden beim Bauen stillschweigend ausgelassen.
- **Kinderzahnheilkunde** hat weiterhin keine eigene Leistungsseite; sie wird in
  den FAQ von *Lachgassedierung* und *Vollnarkose* mitbehandelt und bleibt sonst
  auf der Kempen-Seite. Falls eine eigene Seite gewünscht ist, wäre sie der
  naheliegendste Ausbau.
- **Titel/Meta:** `<title>` = „<Kurzform> in Düsseldorf & Kempen | Salierpraxis"
  (Kurzformen im Generator, Dict `TITEL_KURZ`), `meta_description` und die
  ausformulierte H1 (`h1_lang`) stehen im Frontmatter jeder Markdown-Datei.
- **Canonical/JSON-LD** nutzen `BASE_URL = "https://www.salierpraxis.de"` im
  Generator. Sollte die Domainentscheidung (siehe NOTES.md, Punkt 3) anders
  ausfallen, ist das die einzige Stelle, die angepasst werden muss.
- **Achtung `fix_steps.py`:** Das Hilfsskript im Projektroot enthält noch die
  **alten, einsätzigen** Schrittbeschreibungen. Ein erneuter Aufruf würde die
  jetzt zweisätzigen Schritte und die Dauer-Zeilen in
  `content/leistungen/*.md` überschreiben. Vor Gebrauch aktualisieren oder
  löschen.
- **JSON-LD** enthält pro Seite MedicalProcedure (mit Behandlungsschritten),
  FAQPage (alle Fragen der Seite) und BreadcrumbList. Die Anbieterdaten
  (Adressen, Telefonnummern, E-Mail) sind im Generator hinterlegt — bei
  Änderungen dort nachziehen.


---

# C. SEO / GEO


Stand: 08.09.2026 · Ergänzt `NOTES.md` (Design-/Content-Paket). Betrifft die
neun Rahmenseiten in `site/` sowie die neuen Dateien `sitemap.xml`,
`robots.txt`, `llms.txt` und `.htaccess`. Die zwölf Leistungs-Detailseiten
(`site/leistungen/*.html`) waren bereits optimiert und wurden **nicht**
verändert — sie dienten als Stilvorbild (Titelmuster, JSON-LD-`@graph`,
Canonical, Bildattribute).

Generator/Prüfskripte im Projektroot:

| Skript | Zweck |
|---|---|
| `build_seo.py` | setzt Head-Block (Title, Description, Canonical, OG, Twitter, Geo) und JSON-LD auf den neun Rahmenseiten, erzeugt `sitemap.xml` |
| `qc_check_seo.py` | prüft die **gesamte** Site (21 Seiten): JSON-LD, Links, Bilder, Head-Elemente, Längen, sitemap.xml, robots.txt, llms.txt, .htaccess |
| `qc_render_seo.py` | Screenshots der neun Rahmenseiten (1440 px / 390 px) nach `qc/` und `qc/thumbs/` |

Änderungen an Texten oder Metadaten der Rahmenseiten bitte in `build_seo.py`
pflegen und das Skript erneut laufen lassen — es ist idempotent (bestehender
Head-Block und JSON-LD werden ersetzt, nicht dupliziert).

---

### 1. Vor dem Livegang zwingend erledigen

1. **Domain-Entscheidung treffen.** Canonical-Tags, `sitemap.xml`, `llms.txt`
   und alle JSON-LD-`@id`s zeigen auf **`https://www.salierpraxis.de`**
   (mit `www`). Solange die Seite auch ohne `www` oder unter
   `salierpraxis-duesseldorf.de` erreichbar ist, ohne dass weitergeleitet wird,
   entstehen Duplikate.
   → In `site/.htaccess` ist Abschnitt 2 (Domain- und `www`-Vereinheitlichung)
   **bewusst auskommentiert**. Nach der Entscheidung einkommentieren, davor
   prüfen, dass beide Domains auf diesen Webspace zeigen und ein SSL-Zertifikat
   inklusive `www`-Variante vorliegt.
   Soll **ohne** `www` gearbeitet werden, müssen `BASE_URL` in `build_seo.py`
   **und** in `build_leistungen.py` geändert und beide Skripte neu ausgeführt
   werden (sonst zeigen die Detailseiten weiter auf `www`).
2. **HTTPS prüfen.** Abschnitt 1 der `.htaccess` erzwingt HTTPS. Ohne gültiges
   Zertifikat ist die Seite damit nicht erreichbar → dann zuerst Zertifikat
   einrichten oder den Block auskommentiert lassen.
3. **`.htaccess` hochladen und testen.** Die Datei beginnt mit einem Punkt und
   wird von manchen FTP-Programmen ausgeblendet. Nach dem Upload je einen alten
   URL-Aufruf, eine nicht existierende URL (404) und eine normale Seite testen.
4. **Alte URLs verifizieren.** Die 301-Liste in der `.htaccess` beruht auf den
   in `NOTES.md` (Abschnitt 3) dokumentierten Adressen — inklusive der
   Tippfehler-URL `leistungen_paradontitis.php`. Die tatsächlich aufgerufenen
   Altadressen nach dem Livegang in der Google Search Console
   („Seiten“ → „Nicht gefunden (404)“) und in den Server-Logs gegenprüfen und
   fehlende Regeln ergänzen. Für nicht einzeln genannte `leistungen_*.php`
   greift eine Sammelregel auf die Leistungsübersicht.
5. **Search Console und Bing Webmaster Tools** einrichten:
   Property `https://www.salierpraxis.de` anlegen (Domain-Property empfohlen),
   `https://www.salierpraxis.de/sitemap.xml` einreichen, Indexabdeckung nach
   ein bis zwei Wochen prüfen. Beim Domainwechsel zusätzlich die alte Property
   behalten und die Adressänderung dort meldet.
6. **Rich-Results-Test.** Startseite, beide Standortseiten, Leistungsübersicht
   und Notdienstseite einmal durch den Google-Rich-Results-Test und den
   Schema-Markup-Validator schicken (die JSON-LD-Blöcke sind per Skript als
   valides JSON geprüft, nicht aber gegen Googles Anforderungen).

### 2. Google Business Profile (wichtigster Hebel für „Zahnarzt in der Nähe“)

Das strukturierte Markup ersetzt kein gepflegtes Unternehmensprofil. Für beide
Standorte **je ein eigenes** Google-Business-Profil führen:

- Name, Adresse, Telefonnummer **zeichengleich** wie auf der Website
  (NAP-Konsistenz): „Salierpraxis Düsseldorf-Oberkassel“, Achillesstraße 19,
  40545 Düsseldorf, 0211 – 550 24 80 · „Salierpraxis Kempen“, Oelstraße 6,
  47906 Kempen, 02152 – 51 01 46.
- Öffnungszeiten identisch zur Website (Mo–Do 08:00–20:00, Fr 08:00–19:00,
  Sa 09:00–13:00 · Kempen Mo–Fr 08:00–18:00), Feiertage pflegen.
- Website-Link jeweils auf die **Standortseite** (`/duesseldorf.html` bzw.
  `/kempen.html`), nicht auf die Startseite.
- Leistungen und Fotos hinterlegen, Bewertungen beantworten.
- Gleiches Vorgehen für Branchenportale (jameda, sanego, Apple Business
  Connect, Bing Places): identische Schreibweise verwenden.
  → Aktuelle Facebook-/jameda-URLs sind unbekannt (siehe `NOTES.md`
  Punkt 2.8). Sobald sie vorliegen: als `sameAs` in `build_seo.py`
  (Organization-Knoten) ergänzen — das verknüpft die Profile mit der Website.

### 3. Fehlende Angaben — bewusst nicht erfunden

- **Geokoordinaten:** Es liegen keine verifizierten Koordinaten vor, daher
  enthält kein Schema-Knoten ein `geo`-Feld. Stattdessen ist bei beiden
  Standorten `hasMap` mit der bereits auf den Seiten verwendeten
  Google-Maps-URL gesetzt. Sobald die exakten Koordinaten vorliegen (aus dem
  Google-Business-Profil ablesbar), in `build_seo.py` bei den Standorten
  ergänzen:
  `"geo": {"@type": "GeoCoordinates", "latitude": …, "longitude": …}`.
- **`priceRange`** ist mit `"$$"` als grobe Einordnung gesetzt (Schema.org
  erwartet eine Angabe, konkrete Preise wären unzulässig und unseriös).
  Falls diese Einordnung nicht gewünscht ist, Feld entfernen.
- **Kein `aggregateRating`/`review`** im Markup: Bewertungen dürfen nur
  ausgezeichnet werden, wenn sie tatsächlich auf der Seite stehen und selbst
  erhoben sind. Sterne-Snippets sind für Ärzte ohnehin heikel.
- **Parken/ÖPNV/Barrierefreiheit** fehlen weiterhin (siehe `NOTES.md`
  Punkt 2.5). Sobald bekannt: auf den Standortseiten ergänzen und im Schema
  z. B. `publicAccess`, `isAccessibleForFree` bzw. eine
  `amenityFeature`-Angabe nachziehen — das sind häufige Fragen an KI-Systeme.
- **Online-Terminbuchung** besteht nicht (siehe `NOTES.md` Punkt 2.1). Falls
  sie kommt: `potentialAction` (`ReserveAction`) im Organization-Knoten
  ergänzen und in `llms.txt` den Hinweis „Eine Online-Terminbuchung besteht
  derzeit nicht“ korrigieren.

### 4. Neue prüfbedürftige Aussagen (fachlich/redaktionell freigeben)

Alle neuen Texte sind bewusst zurückhaltend formuliert, ohne Preise und ohne
neue Telefonnummern. Trotzdem bitte gegenlesen lassen:

1. **Notdienst-FAQ (4 Fragen, `notdienst.html`)** — neu geschrieben:
   - „Wann ist ein Zahnschmerz ein Notfall?“ (Schwellung, Fieber, Blutung als
     Warnzeichen) — allgemeines Fachwissen, **zahnärztlich bestätigen lassen**.
   - „Was mache ich bei einem ausgeschlagenen Zahn?“ (Zahnrettungsbox,
     H-Milch, erste Stunde) — deckungsgleich mit den bereits vorhandenen
     Erste-Hilfe-Hinweisen der Seite.
   - „Wer hat am Wochenende zahnärztlichen Notdienst?“ — verweist auf die
     Notdienstsuche `zahnaerzte-nrw.de` und die weiter oben auf der Seite
     genannte Nummer; **die Nummer 01805 986700 ist weiterhin unbestätigt**
     (siehe `NOTES.md` Punkt 2.2) und wird in der Antwort deshalb nicht
     wiederholt. Enthält die Aussage „In Düsseldorf-Oberkassel sind wir
     zusätzlich samstags von 9 bis 13 Uhr für Sie da“ — bitte bestätigen, dass
     die Samstagssprechstunde ohne Einschränkung gilt.
   - „Was kostet eine Notfallbehandlung?“ — nennt **keine** Beträge, erwähnt
     aber, dass im Notdienst Zuschläge für Behandlungen außerhalb der
     Sprechzeiten anfallen können (GOZ/BEMA-Systematik). Abrechnungsseitig
     bestätigen lassen.
2. **Einzugsgebiet Düsseldorf** (`duesseldorf.html`): Oberkassel,
   Niederkassel, Heerdt, Lörick, linksrheinisches Düsseldorf, Altstadt und
   Pempelfort „über die Oberkasseler Brücke … wenige Minuten“ — geografisch
   zutreffend, aber eine Fahrzeitaussage; ggf. abschwächen, wenn zu werblich.
3. **Einzugsgebiet Kempen** (`kempen.html`): Kempen, St. Hubert, Tönisvorst,
   Grefrath, Willich, Krefelder Umland, Niederrhein.
4. **Definitionssatz auf der Startseite:** „Die Salierpraxis ist eine
   Zahnarztpraxis mit zwei Standorten in Düsseldorf-Oberkassel und Kempen am
   Niederrhein …“ — dieser Satz wird von KI-Systemen bevorzugt zitiert und ist
   wortgleich in `llms.txt`, im Organization-Schema (`description`) und in der
   Meta-Description der Startseite hinterlegt. Änderungen bitte an **allen
   vier** Stellen gleichzeitig vornehmen (`build_seo.py`: `BESCHREIBUNG_ORG`
   und `SEITEN["index.html"]["desc"]`, `site/llms.txt`, `site/index.html`).
5. **`llms.txt`** enthält die Aussage, dass Kinderzahnheilkunde keine eigene
   Leistungsseite hat, sowie „über 15 Mitarbeitende in Düsseldorf / über 12 in
   Kempen“ und „hauseigene Zahntechnikerin Britta Ilbag“ — alles aus dem
   vorhandenen Content übernommen, bei Personaländerungen mitpflegen.
6. **Behandler-Schwerpunkte im Schema** (`knowsAbout`) folgen den Angaben der
   Startseite. Dr. Alexander Ilbag ist dort mit Implantologie, Parodontologie,
   ästhetischer Zahnmedizin und Sportzahnmedizin geführt; im Schema stehen alle
   vier. `jobTitle` ist neutral „Zahnarzt“/„Zahnärztin“ — Fachzahnarzt- oder
   Spezialisten-Titel wurden **nicht** vergeben (berufsrechtlich sensibel).

### 5. KI-Sichtbarkeit (GEO) — was umgesetzt ist

- **`llms.txt`** (`/llms.txt`): kompakte, maschinenlesbare Faktenübersicht nach
  der llms.txt-Konvention — Kurzbeschreibung, beide Standorte mit vollständigen
  NAP-Daten und Öffnungszeiten, alle zwölf Leistungen als absolute Links mit je
  einem Satz, Team, Notfall, Hinweise. Aus dieser Datei können KI-Systeme die
  Praxis am schnellsten korrekt zusammenfassen. **Bei jeder Änderung an
  Adressen, Zeiten, Team oder Leistungen mitpflegen** (Datum am Dateiende).
- **`robots.txt`**: KI-Crawler (GPTBot, ChatGPT-User, OAI-SearchBot,
  PerplexityBot, ClaudeBot, Google-Extended, CCBot, Applebot-Extended) sind
  **ausdrücklich erlaubt**, damit die Praxis in KI-Antworten mit korrekten
  Daten erscheint. Umstellen lässt sich das pro Anbieter durch Ersetzen von
  `Allow: /` durch `Disallow: /` im jeweiligen Block. Konsequenz eines
  Ausschlusses: Das betreffende System nennt die Praxis dann gar nicht oder mit
  veralteten Fremdangaben.
- **`speakable`** (Sprach- und KI-Antworten) auf Startseite, beiden
  Standortseiten und Kontaktseite — verweist per CSS-Selektor auf den
  Einleitungstext bzw. den Adressblock (`#adresse`, `#kontaktdaten`).
  **Wichtig:** Werden diese Klassen/IDs im HTML umbenannt, brechen die
  Selektoren. `qc_check_seo.py` prüft, dass sie in der Seite vorkommen.
- **FAQ-Blöcke** in Schema und Seite sind deckungsgleich (Notdienstseite neu,
  Detailseiten bereits vorhanden) — der Prüfskript-Abgleich verhindert, dass
  Antworten auseinanderlaufen.
- Empfehlung für später: Eine **Team-Seite** mit Vitae und Qualifikationen
  (siehe `NOTES.md` Punkt 2.6) sowie eine Seite „Kinderzahnheilkunde Kempen“
  wären die beiden größten inhaltlichen Lücken — beides Themen, zu denen
  KI-Systeme und Suchmaschinen gezielt Fragen erhalten.

### 6. Sonstige Hinweise

- **Cache:** Die `.htaccess` setzt für Bilder ein Jahr, für CSS/JS einen Monat
  Cache-Dauer. Wird `css/style.css` später ersetzt, ohne den Dateinamen zu
  ändern, sehen wiederkehrende Besucher bis zu einen Monat die alte Version →
  entweder Dateinamen versionieren (`style.v2.css`) oder Laufzeit kurzzeitig
  senken.
- **HSTS** (`Strict-Transport-Security`) ist in der `.htaccess` vorbereitet,
  aber auskommentiert: erst aktivieren, wenn HTTPS dauerhaft fehlerfrei läuft —
  die Einstellung ist im Browser für ein Jahr nicht widerrufbar.
- **`og:image`:** Als Vorschaubild dient je Seite ein vorhandenes Praxisfoto
  (Startseite `bilder/d147.jpg`). Optimal wäre ein eigenes Motiv im Format
  1200 × 630 px mit Logo; dann in `build_seo.py` bei `bild` eintragen. Damit
  ist der offene Punkt aus `NOTES.md` Abschnitt 3 („OG-Image“) vorläufig
  geschlossen.
- **`NOTES.md` Abschnitt 1** vermerkt „Kein Canonical“ — das ist durch dieses
  Paket überholt: Alle 21 indexierbaren Seiten haben jetzt ein Canonical auf
  `https://www.salierpraxis.de/…` (Startseite auf `/`). Der dortige Hinweis
  „erst nach Domainentscheidung Canonical ergänzen“ ist damit vorweggenommen;
  siehe Punkt 1 dieser Datei.
- **`tel:`-Links** sind einheitlich im internationalen Format ohne Leerzeichen
  gesetzt: `tel:+492115502480` (Düsseldorf) und `tel:+492152510146` (Kempen);
  sichtbar bleibt die gewohnte Schreibweise „0211 – 550 24 80“. Einzige
  Ausnahme ist die Notdienstnummer `tel:01805986700`: 0180x-Servicenummern sind
  aus dem Ausland in der Regel nicht erreichbar, deshalb steht sie bewusst in
  nationaler Schreibweise (die Nummer selbst ist ohnehin noch zu verifizieren,
  siehe Punkt 4.1).
- **404-Seite** trägt `robots: noindex,follow` und steht nicht in der Sitemap;
  `ErrorDocument 404 /404.html` ist in der `.htaccess` gesetzt.
- **Kontaktformular** ist weiterhin eine Attrappe (siehe `NOTES.md`
  Abschnitt 3). Solange es nicht funktioniert, führt die auf mehreren Seiten
  ausgezeichnete Kontaktmöglichkeit ins Leere — vor dem Livegang anbinden.

---

# D. Nachtrag: SEO/GEO auf den Leistungsseiten (09.09.2026)

Die 12 Leistungs-Detailseiten hatten zunächst nur einen Teil der SEO-Ausstattung
(Titel, Description, Canonical, Basis-Schema). Nachgezogen wurde:

- **Vollständiges Open Graph** (`og:site_name`, `og:locale`, `og:image` mit dem
  jeweiligen Hero-Bild als absolute URL, `og:type` = article) und
  **Twitter/X-Cards** (`summary_large_image` inkl. eigenem Bild) — Links zu einer
  Leistungsseite zeigen damit in WhatsApp, Facebook & Co. eine Bildvorschau.
- **Geo-Meta-Tags** `geo.region` (DE-NW) und `geo.placename` (Düsseldorf, Kempen)
  auf allen 12 Seiten.
- **Entitäts-Verknüpfung im Schema:** Die Leistung verweist über
  `provider` → `@id …/#organization` auf **dieselbe** Praxis-Entität wie die
  Startseite; die Praxis ist auf jeder Leistungsseite vollständig mit beiden
  Standorten (Adresse, Telefon, Öffnungszeiten, Kartenlink, Preisniveau)
  ausgezeichnet. Vorher war der Anbieter nur verkürzt hinterlegt und nicht mit der
  Praxis-Entität verbunden — Google und KI-Systeme erkennen die Leistungen jetzt
  eindeutig als Angebot dieser Praxis.
- **Neue Schema-Knoten** je Seite: `WebPage` (mit `primaryImageOfPage`,
  `isPartOf` → WebSite, `breadcrumb`) und `WebSite`. Damit 6 Knoten pro
  Leistungsseite (vorher 3), site-weit 93.
- **`speakable`** auf allen Leistungsseiten: markiert Einleitung, Definitionssatz
  (`p.definition`) und die FAQ-Antworten als vorlese- und zitierfähige Passagen.
  Der erste Absatz von „Was ist das?" trägt dafür jetzt die Klasse `definition`.
- **Titel gekürzt:** Sechs Titel lagen über der Anzeigegrenze von Google
  (Prophylaxe 70 Zeichen). Sie sind jetzt alle unter 60 Zeichen, mit erhaltenem
  Ortsbezug (z. B. „Zahnreinigung (PZR) in Düsseldorf | Salierpraxis"). Pflegbar
  über `TITEL_OVERRIDE` in `build_leistungen.py`.

Geprüft: 21 Seiten, 93 Schema-Knoten (alle valides JSON), alle internen Links und
Bildpfade, je genau ein `<h1>`/Canonical/Title/Description, Titel 30–57 und
Descriptions 152–160 Zeichen, kein horizontaler Überlauf. Änderungen sind im
Generator hinterlegt und werden mit `python3 build_leistungen.py` reproduziert.
