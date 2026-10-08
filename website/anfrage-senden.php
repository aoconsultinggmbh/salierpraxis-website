<?php
/* ============================================================================
   Kontaktformular der Salierpraxis (kontakt.html).
   Nimmt die Anfrage entgegen und schickt sie als E-Mail an die Praxis.

   WAS HIER EINGESTELLT WIRD  (und sonst nichts):
     $an    Wer die Anfragen bekommt (abgestimmt mit der Praxis, Oktober 2026)
     $von   Absenderadresse. MUSS ein echtes Postfach auf derselben Domain sein,
            sonst stuft der Empfaenger die Mail als Spam ein. Wir nehmen
            dieselbe Adresse wie den Empfaenger. Zum Antworten zaehlt das
            Reply-To weiter unten, dort steht die Adresse der Patientin oder
            des Patienten.

   SICHERHEIT
   - Honigtopf: ein fuer Menschen unsichtbares Feld. Fuellt es jemand aus,
     war es ein Roboter, und wir tun so, als waere alles gut.
   - Zeitsperre: wer das Formular in unter drei Sekunden absendet, ist keiner.
   - Alle Werte fuer den Kopf der Mail werden von Zeilenumbruechen befreit
     (sonst koennte jemand fremde Empfaenger einschmuggeln).
   - Es wird nichts gespeichert: keine Datenbank, keine Datei, kein Cookie.
   ============================================================================ */

$an  = 'info@salierpraxis.de';
$von = 'info@salierpraxis.de';

date_default_timezone_set('Europe/Berlin');
header('Content-Type: application/json; charset=utf-8');

function ende($ok, $text = '') {
  echo json_encode(array('ok' => $ok, 'text' => $text), JSON_UNESCAPED_UNICODE);
  exit;
}
function feld($name) {
  $wert = isset($_POST[$name]) ? (string) $_POST[$name] : '';
  return mb_substr(trim($wert), 0, 3000);
}
function einzeilig($wert) {
  return trim(preg_replace('/[\r\n]+/', ' ', $wert));
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); ende(false, 'Nur POST.'); }

/* --- Roboterpruefung: stiller Erfolg, damit der Absender nichts lernt --- */
if (feld('website') !== '') { ende(true); }
$start = (int) feld('zeit');
if ($start > 0 && (time() - $start) < 3) { ende(true); }

/* --- Felder --- */
$nachname  = einzeilig(feld('nachname'));
$vorname   = einzeilig(feld('vorname'));
$strasse   = einzeilig(feld('strasse'));
$plz_ort   = einzeilig(feld('plz_ort'));
$telefon   = einzeilig(feld('telefon'));
$email     = einzeilig(feld('email'));
$nachricht = feld('nachricht');
$zustimmung = feld('datenschutz');

if ($nachname === '' || $vorname === '' || $nachricht === '') { http_response_code(400); ende(false, 'Bitte füllen Sie alle Pflichtfelder aus.'); }
if (!filter_var($email, FILTER_VALIDATE_EMAIL))               { http_response_code(400); ende(false, 'Bitte prüfen Sie Ihre E-Mail-Adresse.'); }
if ($zustimmung === '')                                        { http_response_code(400); ende(false, 'Bitte stimmen Sie der Datenschutzerklärung zu.'); }

/* --- Mail bauen --- */
$name    = $vorname . ' ' . $nachname;
$betreff = 'Anfrage über die Webseite: ' . $name;
$text  = "Anfrage über salierpraxis.de\n\n";
$text .= "Name:      $name\n";
$text .= "E-Mail:    $email\n";
if ($telefon !== '') { $text .= "Telefon:   $telefon\n"; }
if ($strasse !== '' || $plz_ort !== '') { $text .= "Anschrift: " . trim($strasse . ', ' . $plz_ort, ' ,') . "\n"; }
$text .= "\nNachricht:\n$nachricht\n";
$text .= "\n---\nGesendet am " . date('d.m.Y, H:i') . " Uhr.\n";
$text .= "Antworten Sie einfach auf diese Mail, die Antwort geht direkt an den Absender.\n";

$kopf  = 'From: Webseite Salierpraxis <' . $von . ">\r\n";
$anzeige = trim(preg_replace('/["<>,;:\\\\]/', '', $name));
$kopf .= 'Reply-To: =?UTF-8?B?' . base64_encode($anzeige) . '?= <' . $email . ">\r\n";
$kopf .= "Content-Type: text/plain; charset=UTF-8\r\n";
$kopf .= "X-Mailer: PHP/" . phpversion();

$betreff_kodiert = '=?UTF-8?B?' . base64_encode($betreff) . '?=';

if (@mail($an, $betreff_kodiert, $text, $kopf, '-f' . $von)) {
  ende(true);
}
http_response_code(500);
ende(false, 'Die Nachricht konnte gerade nicht verschickt werden. Bitte rufen Sie uns an: Düsseldorf 0211 550 24 80, Kempen 02152 51 01 46.');
