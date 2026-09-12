<?php

declare(strict_types=1);

/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgHoliday module for xoops
 *
 * @copyright    2025 XOOPS Project (https://xoops.org)
 * @license      GPL 2.0 or later
 * @package      wgholiday
 * @author       Goffy - Wedega - Email:webmaster@wedega.com - Website:https://wedega.com
 */

require_once __DIR__ . '/admin.php';

// ---------------- Main ----------------
\define('_MD_WGHOLIDAY_INDEX', 'Übersicht wgHoliday');
\define('_MD_WGHOLIDAY_TITLE', 'wgHoliday');
\define('_MD_WGHOLIDAY_DESC', 'Dieses Modul zeigt Informationen über Ihre Urlaubstage an');
\define('_MD_WGHOLIDAY_NO_PDF_LIBRARY', 'Die TCPDF-Bibliotheken sind noch nicht vorhanden. Bitte laden Sie diese nach root/Frameworks hoch');
\define('_MD_WGHOLIDAY_NO', 'Nein');
\define('_MD_WGHOLIDAY_DETAILS', 'Details anzeigen');
\define('_MD_WGHOLIDAY_BROKEN', 'Fehler melden');

// ---------------- Contents ----------------
// Events
\define('_MD_WGHOLIDAY_EVENTS', 'Einträge');
\define('_MD_WGHOLIDAY_EVENT_ADD', 'Eintrag hinzufügen');
\define('_MD_WGHOLIDAY_EVENT_EDIT', 'Eintrag bearbeiten');
\define('_MD_WGHOLIDAY_EVENT_DELETE', 'Eintrag löschen');
\define('_MD_WGHOLIDAY_EVENT_CLONE', 'Eintrag klonen');
\define('_MD_WGHOLIDAY_EVENT_DETAILS', 'Details zum Eintrag');
\define('_MD_WGHOLIDAY_EVENT_LIST', 'Liste der Einträge');
\define('_MD_WGHOLIDAY_EVENT_TITLE', 'Titel des Eintrags');
\define('_MD_WGHOLIDAY_EVENT_DESC', 'Beschreibung des Eintrags');

// Caption of Events
\define('_MD_WGHOLIDAY_EVENT_ID', 'ID');
\define('_MD_WGHOLIDAY_EVENT_NAME', 'Name');
\define('_MD_WGHOLIDAY_EVENT_HEADER', 'Kopfbereich');
\define('_MD_WGHOLIDAY_EVENT_BODY', 'Inhalt');
\define('_MD_WGHOLIDAY_EVENT_FOOTER', 'Fußbereich');
\define('_MD_WGHOLIDAY_EVENT_IMAGE', 'Bild');
\define('_MD_WGHOLIDAY_EVENT_DATE_SHOWFROM', 'Anzeigen von');
\define('_MD_WGHOLIDAY_EVENT_DATE_SHOWTO', 'bis');
\define('_MD_WGHOLIDAY_EVENT_DATE_WAIT', 'Warten');
\define('_MD_WGHOLIDAY_EVENT_DATE_RUNNING', 'Läuft');
\define('_MD_WGHOLIDAY_EVENT_DATE_CLOSED', 'Abgeschlossen');
\define('_MD_WGHOLIDAY_EVENT_STATUS', 'Status');
\define('_MD_WGHOLIDAY_EVENT_STATUS_OFFLINE', 'Offline');
\define('_MD_WGHOLIDAY_EVENT_STATUS_ONLINE', 'Online');
\define('_MD_WGHOLIDAY_EVENT_DATE_CREATED', 'Erstellungsdatum');
\define('_MD_WGHOLIDAY_EVENT_SUBMITTER', 'Ersteller');
\define('_MD_WGHOLIDAY_INDEX_THEREARE', 'Es gibt %s Einträge');
\define('_MD_WGHOLIDAY_INDEX_LATEST_LIST', 'Letzte Einträge von wgHoliday');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY', 'Anzeigen:');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_NONE', 'Nicht anzeigen');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK', 'Nur auf der Website anzeigen');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL', 'Nur im Modal-Fenster anzeigen');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_BOTH', 'Auf der Website und im Modal-Fenster anzeigen');
// Anzeige des Eintragsbildes
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS', 'Bildposition');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_TOP', 'Vor dem Inhalt anzeigen');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_LEFT', 'Links neben dem Inhalt anzeigen');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT', 'Rechts neben dem Inhalt anzeigen');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM', 'Nach dem Inhalt anzeigen');
\define('_MD_WGHOLIDAY_EVENT_IMAGE_FOR', 'Bild für');
// Submit
\define('_MD_WGHOLIDAY_SUBMIT', 'Absenden');
\define('_MD_WGHOLIDAY_SAVE', 'Speichern');

// Form
\define('_MD_WGHOLIDAY_FORM_OK', 'Erfolgreich gespeichert');
\define('_MD_WGHOLIDAY_FORM_DELETE_OK', 'Erfolgreich gelöscht');
\define('_MD_WGHOLIDAY_FORM_SURE_DELETE', "Möchten Sie wirklich löschen: <b><span style='color : Red;'>%s </span></b>");
\define('_MD_WGHOLIDAY_FORM_SURE_RENEW', "Möchten Sie wirklich aktualisieren: <b><span style='color : Red;'>%s </span></b>");
// Errors
\define('_MD_WGHOLIDAY_INVALID_PARAM', 'Ungültiger Parameter');
\define('_MD_WGHOLIDAY_ERROR_CHANGE_STATUS', 'Fehler beim Ändern des Status');
// Admin link
\define('_MD_WGHOLIDAY_ADMIN', 'Administration');

// ---------------- End ----------------
