/* Kontaktformular der Salierpraxis
   Schickt die Anfrage an anfrage-senden.php (liegt neben kontakt.html).
   Klappt das nicht (z. B. auf der Vorschau, dort gibt es kein PHP), oeffnet
   sich das E-Mail-Programm mit vorausgefuellter Nachricht. So geht keine
   Anfrage verloren. Pflichtfelder werden hier, im Browser (required) und im
   PHP-Skript geprueft. */
(function () {
  'use strict';
  var form = document.getElementById('kontaktformular');
  if (!form) return;
  var status = document.getElementById('formular-status');
  var zeit = form.querySelector('input[name="zeit"]');
  if (zeit) zeit.value = Math.floor(Date.now() / 1000);

  function melden(text, art) {
    status.textContent = text;
    status.className = 'formular-status ' + (art || '');
    status.hidden = false;
  }
  function wert(name) {
    var el = form.elements[name];
    return el ? String(el.value || '').trim() : '';
  }
  function perMail() {
    var zeilen = [
      'Name: ' + wert('vorname') + ' ' + wert('nachname'),
      'E-Mail: ' + wert('email'),
      wert('telefon') ? 'Telefon: ' + wert('telefon') : '',
      (wert('strasse') || wert('plz_ort')) ? 'Anschrift: ' + [wert('strasse'), wert('plz_ort')].filter(Boolean).join(', ') : '',
      '',
      wert('nachricht')
    ].filter(function (z, i) { return z !== '' || i === 4; });
    window.location.href = 'mailto:info@salierpraxis.de?subject=' +
      encodeURIComponent('Anfrage über die Webseite: ' + wert('vorname') + ' ' + wert('nachname')) +
      '&body=' + encodeURIComponent(zeilen.join('\n'));
    melden('Ihr E-Mail-Programm wurde geöffnet. Bitte senden Sie die Nachricht dort ab.', '');
  }

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (!wert('nachname') || !wert('vorname') || !wert('nachricht') || !form.elements.datenschutz.checked) {
      melden('Bitte füllen Sie alle Pflichtfelder aus und stimmen Sie der Datenschutzerklärung zu.', 'fehler');
      return;
    }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(wert('email'))) {
      melden('Bitte prüfen Sie Ihre E-Mail-Adresse.', 'fehler');
      return;
    }
    var knopf = form.querySelector('button[type="submit"]');
    knopf.disabled = true;
    melden('Ihre Nachricht wird gesendet …', '');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', form.getAttribute('action'));
    xhr.timeout = 15000;
    xhr.onload = function () {
      knopf.disabled = false;
      var antwort = null;
      try { antwort = JSON.parse(xhr.responseText); } catch (err) { antwort = null; }
      if (antwort && antwort.ok) {
        form.reset();
        if (zeit) zeit.value = Math.floor(Date.now() / 1000);
        melden('Vielen Dank! Ihre Nachricht ist bei uns angekommen. Wir melden uns so bald wie möglich.', 'ok');
      } else if (antwort && antwort.text) {
        melden(antwort.text, 'fehler');
      } else {
        perMail();
      }
    };
    xhr.onerror = xhr.ontimeout = function () { knopf.disabled = false; perMail(); };
    xhr.send(new FormData(form));
  });
})();
