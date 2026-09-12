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

require_once __DIR__ . '/common.php';
require_once __DIR__ . '/main.php';

// ---------------- Admin Index ----------------
\define('_AM_WGHOLIDAY_STATISTICS', 'Statistik');
// Es gibt
\define('_AM_WGHOLIDAY_THEREARE_EVENTS', "Es gibt <span class='bold'>%s</span> Einträge in der Datenbank");
// ---------------- Admin Files ----------------
// Es gibt keine
\define('_AM_WGHOLIDAY_THEREARENT_EVENTS', "Es gibt keine Einträge");
// Speichern/Löschen
\define('_AM_WGHOLIDAY_FORM_OK', 'Erfolgreich gespeichert');
\define('_AM_WGHOLIDAY_FORM_DELETE_OK', 'Erfolgreich gelöscht');
\define('_AM_WGHOLIDAY_FORM_SURE_DELETE', "Möchten Sie wirklich löschen: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGHOLIDAY_FORM_SURE_RENEW', "Möchten Sie wirklich aktualisieren: <b><span style='color : Red;'>%s </span></b>");
// Errors
\define('_AM_WGHOLIDAY_INVALID_PARAM', 'Ungültiger Parameter');
\define('_AM_WGHOLIDAY_INVALID_DATE', 'Ungültiges Datum');
\define('_AM_WGHOLIDAY_ERROR_CHANGE_STATUS', 'Fehler beim Ändern des Status');
// Buttons
\define('_AM_WGHOLIDAY_ADD_EVENT', 'Neuen Eintrag hinzufügen');
// Listen
\define('_AM_WGHOLIDAY_LIST_EVENTS', 'Liste der Einträge');
// ---------------- Admin Classes ----------------
// Einträge hinzufügen/bearbeiten
\define('_AM_WGHOLIDAY_EVENT_ADD', 'Eintrag hinzufügen');
\define('_AM_WGHOLIDAY_EVENT_EDIT', 'Eintrag bearbeiten');
// Elemente der Einträge
\define('_AM_WGHOLIDAY_EVENT_ID', 'ID');
\define('_AM_WGHOLIDAY_EVENT_NAME', 'Name');
\define('_AM_WGHOLIDAY_EVENT_HEADER', 'Kopfbereich');
\define('_AM_WGHOLIDAY_EVENT_BODY', 'Inhalt');
\define('_AM_WGHOLIDAY_EVENT_FOOTER', 'Fußbereich');
\define('_AM_WGHOLIDAY_EVENT_IMAGE', 'Bild');
\define('_AM_WGHOLIDAY_EVENT_IMAGE_UPLOADS', 'Bild in %s:');
\define('_AM_WGHOLIDAY_EVENT_DATE_SHOWFROM', 'Anzeigen von');
\define('_AM_WGHOLIDAY_EVENT_DATE_SHOWTO', 'Anzeigen bis');
\define('_AM_WGHOLIDAY_EVENT_DATE_WAIT', 'Warten');
\define('_AM_WGHOLIDAY_EVENT_DATE_RUNNING', 'Läuft');
\define('_AM_WGHOLIDAY_EVENT_DATE_CLOSED', 'Abgeschlossen');
\define('_AM_WGHOLIDAY_EVENT_STATUS', 'Status');
\define('_AM_WGHOLIDAY_EVENT_STATUS_OFFLINE', 'Offline');
\define('_AM_WGHOLIDAY_EVENT_STATUS_ONLINE', 'Online');
\define('_AM_WGHOLIDAY_EVENT_DATE_CREATED', 'Erstellungsdatum');
\define('_AM_WGHOLIDAY_EVENT_SUBMITTER', 'Ersteller');
// Anzeige der Einträge
\define('_AM_WGHOLIDAY_EVENT_DISPLAY', 'Anzeigen');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_NONE', 'Nicht anzeigen');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK', 'Nur auf der Website anzeigen');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL', 'Nur im Modal-Fenster anzeigen');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH', 'Auf der Website und im Modal-Fenster anzeigen');
// Anzeige des Eintragsbildes
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS', 'Bildposition:');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_TOP', 'Vor dem Inhalt anzeigen');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_LEFT', 'Links neben dem Inhalt anzeigen');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT', 'Rechts neben dem Inhalt anzeigen');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM', 'Nach dem Inhalt anzeigen');
\define('_AM_WGHOLIDAY_EVENT_IMAGE_FOR', 'Bild für');
// Allgemein
\define('_AM_WGHOLIDAY_FORM_UPLOAD', 'Datei hochladen');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_NEW', 'Neue Datei hochladen: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_SIZE', 'Maximale Dateigröße: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_IMG_WIDTH', 'Maximale Bildbreite: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_IMG_HEIGHT', 'Maximale Bildhöhe: ');
\define('_AM_WGHOLIDAY_FORM_IMAGE_PATH', 'Dateien in %s:');
\define('_AM_WGHOLIDAY_FORM_ACTION', 'Aktion');
\define('_AM_WGHOLIDAY_FORM_EDIT', 'Bearbeiten');
\define('_AM_WGHOLIDAY_FORM_DELETE', 'Löschen');
// Clone-Funktion
\define('_AM_WGHOLIDAY_CLONE', 'Klonen');
\define('_AM_WGHOLIDAY_CLONE_DSC', 'Das Klonen eines Moduls war noch nie so einfach! Geben Sie einfach den gewünschten Namen ein und klicken Sie auf die Schaltfläche zum Absenden!');
\define('_AM_WGHOLIDAY_CLONE_TITLE', '%s klonen');
\define('_AM_WGHOLIDAY_CLONE_NAME', 'Namen für das neue Modul wählen');
\define('_AM_WGHOLIDAY_CLONE_NAME_DSC', 'Verwenden Sie keine Sonderzeichen! <br>Verwenden Sie keinen bereits vorhandenen Modulnamen (dirname) oder Datenbanktabellennamen!');
\define('_AM_WGHOLIDAY_CLONE_INVALIDNAME', 'FEHLER: Ungültiger Modulname. Bitte versuchen Sie es mit einem anderen Namen!');
\define('_AM_WGHOLIDAY_CLONE_EXISTS', 'FEHLER: Der Modulname ist bereits vergeben. Bitte versuchen Sie es mit einem anderen Namen!');
\define('_AM_WGHOLIDAY_CLONE_CONGRAT', 'Herzlichen Glückwunsch! %s wurde erfolgreich erstellt!<br>Eventuell müssen Sie noch Änderungen an den Sprachdateien vornehmen.');
\define('_AM_WGHOLIDAY_CLONE_IMAGEFAIL', 'Achtung: Das neue Modul-Logo konnte nicht erstellt werden. Bitte passen Sie die Datei assets/images/logo_module.png gegebenenfalls manuell an!');
\define('_AM_WGHOLIDAY_CLONE_FAIL', 'Leider konnte das neue Modul nicht erstellt werden. Möglicherweise müssen Sie vorübergehend die Schreibrechte (CHMOD 777) für den modules-Ordner setzen und es erneut versuchen.');
// ---------------- Admin Others ----------------
\define('_AM_WGHOLIDAY_ABOUT_MAKE_DONATION', 'Absenden');
\define('_AM_WGHOLIDAY_SUPPORT_FORUM', 'Support-Forum');
\define('_AM_WGHOLIDAY_DONATION_AMOUNT', 'Spendenbetrag');
\define('_AM_WGHOLIDAY_MAINTAINEDBY', ' wird gepflegt von ');
// ---------------- Ende ----------------

