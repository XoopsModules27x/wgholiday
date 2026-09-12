<?php declare(strict_types=1);
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * Wfdownloads module
 *
 * @copyright       XOOPS Project (https://xoops.org)
 * @license         GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @since           3.23
 * @author          Xoops Development Team
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_WGHOLIDAY_GDLIBSTATUS', 'GD-Bibliotheksunterstützung: ');
\define('_CO_WGHOLIDAY_GDLIBVERSION', 'GD-Bibliotheksversion: ');
\define('_CO_WGHOLIDAY_GDOFF', "<span style='font-weight: bold;'>Deaktiviert</span> (Keine Vorschaubilder verfügbar)");
\define('_CO_WGHOLIDAY_GDON', "<span style='font-weight: bold;'>Aktiviert</span> (Vorschaubilder verfügbar)");
\define('_CO_WGHOLIDAY_IMAGEINFO', 'Serverstatus');
\define('_CO_WGHOLIDAY_MAXPOSTSIZE', 'Maximal zulässige POST-Größe (Direktive post_max_size in php.ini): ');
\define('_CO_WGHOLIDAY_MAXUPLOADSIZE', 'Maximal zulässige Upload-Größe (Direktive upload_max_filesize in php.ini): ');
\define('_CO_WGHOLIDAY_MEMORYLIMIT', 'Speicherlimit (Direktive memory_limit in php.ini): ');
\define('_CO_WGHOLIDAY_METAVERSION', "<span style='font-weight: bold;'>Meta-Version der Downloads:</span> ");
\define('_CO_WGHOLIDAY_OFF', "<span style='font-weight: bold;'>AUS</span>");
\define('_CO_WGHOLIDAY_ON', "<span style='font-weight: bold;'>EIN</span>");
\define('_CO_WGHOLIDAY_SERVERPATH', 'Serverpfad zum XOOPS-Hauptverzeichnis: ');
\define('_CO_WGHOLIDAY_SERVERUPLOADSTATUS', 'Status des Server-Uploads: ');
\define('_CO_WGHOLIDAY_SPHPINI', "<span style='font-weight: bold;'>Informationen aus der PHP-INI-Datei:</span>");
\define('_CO_WGHOLIDAY_UPLOADPATHDSC', 'Hinweis: Der Upload-Pfad *MUSS* den vollständigen Serverpfad zu Ihrem Upload-Ordner enthalten.');

\define('_CO_WGHOLIDAY_PRINT', "<span style='font-weight: bold;'>Drucken</span>");
\define('_CO_WGHOLIDAY_PDF', "<span style='font-weight: bold;'>PDF erstellen</span>");

\define('_CO_WGHOLIDAY_UPGRADEFAILED0', "Aktualisierung fehlgeschlagen – Feld '%s' konnte nicht umbenannt werden");
\define('_CO_WGHOLIDAY_UPGRADEFAILED1', 'Aktualisierung fehlgeschlagen – neue Felder konnten nicht hinzugefügt werden');
\define('_CO_WGHOLIDAY_UPGRADEFAILED2', "Aktualisierung fehlgeschlagen – Tabelle '%s' konnte nicht umbenannt werden");
\define('_CO_WGHOLIDAY_ERROR_COLUMN', 'Spalte konnte in der Datenbank nicht erstellt werden: %s');
\define('_CO_WGHOLIDAY_ERROR_BAD_XOOPS', 'Dieses Modul benötigt XOOPS %s+ (%s ist installiert)');
\define('_CO_WGHOLIDAY_ERROR_BAD_PHP', 'Dieses Modul benötigt PHP Version %s+ (%s ist installiert)');
\define('_CO_WGHOLIDAY_ERROR_TAG_REMOVAL', 'Tags konnten nicht aus dem Tag-Modul entfernt werden');

\define('_CO_WGHOLIDAY_FOLDERS_DELETED_OK', 'Upload-Ordner wurden gelöscht');

// Fehlermeldungen
\define('_CO_WGHOLIDAY_ERROR_BAD_DEL_PATH', 'Das Verzeichnis %s konnte nicht gelöscht werden');
\define('_CO_WGHOLIDAY_ERROR_BAD_REMOVE', '%s konnte nicht gelöscht werden');
\define('_CO_WGHOLIDAY_ERROR_NO_PLUGIN', 'Plugin konnte nicht geladen werden');

// Hilfe
\define('_CO_WGHOLIDAY_DIRNAME', \basename(\dirname(__DIR__, 2)));
\define('_CO_WGHOLIDAY_HELP_HEADER', __DIR__ . '/help/helpheader.tpl');
\define('_CO_WGHOLIDAY_BACK_2_ADMIN', 'Zurück zur Administration von ');
\define('_CO_WGHOLIDAY_OVERVIEW', 'Übersicht');

//\define('_CO_WGHOLIDAY_HELP_DIR', __DIR__);

// Hilfe – mehrere Seiten
\define('_CO_WGHOLIDAY_DISCLAIMER', 'Haftungsausschluss');
\define('_CO_WGHOLIDAY_LICENSE', 'Lizenz');
\define('_CO_WGHOLIDAY_SUPPORT', 'Support');

// Beispieldaten
\define('_CO_WGHOLIDAY_ADD_SAMPLEDATA', 'Beispieldaten importieren (ALLE aktuellen Daten werden gelöscht)');
\define('_CO_WGHOLIDAY_SAMPLEDATA_SUCCESS', 'Beispieldaten wurden erfolgreich importiert');
\define('_CO_WGHOLIDAY_SAVE_SAMPLEDATA', 'Tabellen als YAML exportieren');
\define('_CO_WGHOLIDAY_SAVE_SAMPLEDATA_SUCCESS', 'Tabellen wurden erfolgreich als YAML exportiert');
\define('_CO_WGHOLIDAY_SAVE_SAMPLEDATA_ERROR', 'FEHLER: Export der Tabellen als YAML fehlgeschlagen');
\define('_CO_WGHOLIDAY_SHOW_SAMPLE_BUTTON', 'Schaltfläche für Beispieldaten anzeigen?');
\define('_CO_WGHOLIDAY_SHOW_SAMPLE_BUTTON_DESC', 'Wenn Ja, wird die Schaltfläche „Beispieldaten hinzufügen“ für den Administrator angezeigt. Bei der ersten Installation ist diese Option standardmäßig aktiviert.');
\define('_CO_WGHOLIDAY_EXPORT_SCHEMA', 'Datenbankschema als YAML exportieren');
\define('_CO_WGHOLIDAY_EXPORT_SCHEMA_SUCCESS', 'Datenbankschema wurde erfolgreich als YAML exportiert');
\define('_CO_WGHOLIDAY_EXPORT_SCHEMA_ERROR', 'FEHLER: Export des Datenbankschemas als YAML fehlgeschlagen');
\define('_CO_WGHOLIDAY_ADD_SAMPLEDATA_OK', 'Möchten Sie wirklich die Beispieldaten importieren? (ALLE aktuellen Daten werden gelöscht)');
\define('_CO_WGHOLIDAY_HIDE_SAMPLEDATA_BUTTONS', 'Importschaltflächen ausblenden');
\define('_CO_WGHOLIDAY_SHOW_SAMPLEDATA_BUTTONS', 'Importschaltflächen anzeigen');
\define('_CO_WGHOLIDAY_CONFIRM', 'Bestätigen');

// Buchstabenauswahl
\define('_CO_WGHOLIDAY_BROWSETOTOPIC', "<span style='font-weight: bold;'>Einträge alphabetisch durchsuchen</span>");
\define('_CO_WGHOLIDAY_OTHER', 'Andere');
\define('_CO_WGHOLIDAY_ALL', 'Alle');

// Blockdefinitionen
\define('_CO_WGHOLIDAY_ACCESSRIGHTS', 'Zugriffsrechte');
\define('_CO_WGHOLIDAY_ACTION', 'Aktion');
\define('_CO_WGHOLIDAY_ACTIVERIGHTS', 'Aktive Rechte');
\define('_CO_WGHOLIDAY_BADMIN', 'Blockverwaltung');
\define('_CO_WGHOLIDAY_BLKDESC', 'Beschreibung');
\define('_CO_WGHOLIDAY_CBCENTER', 'Mitte – Mitte');
\define('_CO_WGHOLIDAY_CBLEFT', 'Mitte – Links');
\define('_CO_WGHOLIDAY_CBRIGHT', 'Mitte – Rechts');
\define('_CO_WGHOLIDAY_SBLEFT', 'Seite – Links');
\define('_CO_WGHOLIDAY_SBRIGHT', 'Seite – Rechts');
\define('_CO_WGHOLIDAY_SIDE', 'Ausrichtung');
\define('_CO_WGHOLIDAY_TITLE', 'Titel');
\define('_CO_WGHOLIDAY_VISIBLE', 'Sichtbar');
\define('_CO_WGHOLIDAY_VISIBLEIN', 'Sichtbar in');
\define('_CO_WGHOLIDAY_WEIGHT', 'Reihenfolge');

\define('_CO_WGHOLIDAY_PERMISSIONS', 'Berechtigungen');
\define('_CO_WGHOLIDAY_BLOCKS', 'Blockverwaltung');
\define('_CO_WGHOLIDAY_BLOCKS_DESC', 'Block-/Gruppenverwaltung');

\define('_CO_WGHOLIDAY_BLOCKS_MANAGMENT', 'Verwalten');
\define('_CO_WGHOLIDAY_BLOCKS_ADDBLOCK', 'Neuen Block hinzufügen');
\define('_CO_WGHOLIDAY_BLOCKS_EDITBLOCK', 'Block bearbeiten');
\define('_CO_WGHOLIDAY_BLOCKS_CLONEBLOCK', 'Block klonen');

// myblocksadmin
\define('_CO_WGHOLIDAY_AGDS', 'Administratorgruppen');
\define('_CO_WGHOLIDAY_BCACHETIME', 'Cache-Zeit');
\define('_CO_WGHOLIDAY_BLOCKS_ADMIN', 'Blockverwaltung');

// Template-Verwaltung
\define('_CO_WGHOLIDAY_TPLSETS', 'Template-Verwaltung');
\define('_CO_WGHOLIDAY_GENERATE', 'Generieren');
\define('_CO_WGHOLIDAY_FILENAME', 'Dateiname');

// Menü
\define('_CO_WGHOLIDAY_ADMENU_MIGRATE', 'Migration');
\define('_CO_WGHOLIDAY_FOLDER_YES', 'Ordner "%s" ist vorhanden');
\define('_CO_WGHOLIDAY_FOLDER_NO', 'Ordner "%s" ist nicht vorhanden. Erstellen Sie den angegebenen Ordner mit CHMOD 777.');
\define('_CO_WGHOLIDAY_SHOW_DEV_TOOLS', 'Schaltfläche für Entwicklungstools anzeigen?');
\define('_CO_WGHOLIDAY_SHOW_DEV_TOOLS_DESC', 'Wenn Ja, werden der Tab „Migration“ und weitere Entwicklungstools für den Administrator angezeigt.');
\define('_CO_WGHOLIDAY_ADMENU_FEEDBACK', 'Feedback');

// Prüfung auf aktuelle Version
\define('_CO_WGHOLIDAY_NEW_VERSION', 'Neue Version: ');

// Verzeichnisprüfung
\define('_CO_WGHOLIDAY_AVAILABLE', "<span style='color: green;'>Verfügbar</span>");
\define('_CO_WGHOLIDAY_NOTAVAILABLE', "<span style='color: red;'>Nicht verfügbar</span>");
\define('_CO_WGHOLIDAY_NOTWRITABLE', "<span style='color: red;'>Berechtigung ( %d ) erforderlich, aktuell ist ( %d ) gesetzt</span>");
\define('_CO_WGHOLIDAY_CREATETHEDIR', 'Erstellen');
\define('_CO_WGHOLIDAY_SETMPERM', 'Berechtigung setzen');
\define('_CO_WGHOLIDAY_DIRCREATED', 'Das Verzeichnis wurde erstellt');
\define('_CO_WGHOLIDAY_DIRNOTCREATED', 'Das Verzeichnis konnte nicht erstellt werden');
\define('_CO_WGHOLIDAY_PERMSET', 'Die Berechtigung wurde gesetzt');
\define('_CO_WGHOLIDAY_PERMNOTSET', 'Die Berechtigung konnte nicht gesetzt werden');

// Datei-Prüfung
//\define('_CO_WGHOLIDAY_AVAILABLE', "<span style='color: green;'>Verfügbar</span>");
//\define('_CO_WGHOLIDAY_NOTAVAILABLE', "<span style='color: red;'>Nicht verfügbar</span>");
//\define('_CO_WGHOLIDAY_NOTWRITABLE', "<span style='color: red;'>Berechtigung ( %d ) erforderlich, aktuell ist ( %d ) gesetzt</span>");
//\define('_CO_WGHOLIDAY_COPYTHEFILE', 'Kopieren');
//\define('_CO_WGHOLIDAY_CREATETHEFILE', 'Erstellen');
//\define('_CO_WGHOLIDAY_SETMPERM', 'Berechtigung setzen');

\define('_CO_WGHOLIDAY_FILECOPIED', 'Die Datei wurde kopiert');
\define('_CO_WGHOLIDAY_FILENOTCOPIED', 'Die Datei konnte nicht kopiert werden');

//\define('_CO_WGHOLIDAY_PERMSET', 'Die Berechtigung wurde gesetzt');
//\define('_CO_WGHOLIDAY_PERMNOTSET', 'Die Berechtigung konnte nicht gesetzt werden');

// Bildkonfiguration
\define('_CO_WGHOLIDAY_IMAGE_WIDTH', 'Anzeigebreite des Bildes');
\define('_CO_WGHOLIDAY_IMAGE_WIDTH_DSC', 'Anzeigebreite für das Bild');
\define('_CO_WGHOLIDAY_IMAGE_HEIGHT', 'Anzeigehöhe des Bildes');
\define('_CO_WGHOLIDAY_IMAGE_HEIGHT_DSC', 'Anzeigehöhe für das Bild');
\define('_CO_WGHOLIDAY_IMAGE_CONFIG', '<span style="color: #FF0000; font-size: Small; font-weight: bold;">--- EXTERNE Bildkonfiguration ---</span> ');
\define('_CO_WGHOLIDAY_IMAGE_CONFIG_DSC', '');
\define('_CO_WGHOLIDAY_IMAGE_UPLOAD_PATH', 'Bild-Upload-Pfad');
\define('_CO_WGHOLIDAY_IMAGE_UPLOAD_PATH_DSC', 'Pfad zum Hochladen von Bildern');

// Einstellungen
\define('_CO_WGHOLIDAY_TRUNCATE_LENGTH', 'Anzahl der Zeichen, auf die das lange Textfeld gekürzt wird');
\define('_CO_WGHOLIDAY_TRUNCATE_LENGTH_DESC', 'Legen Sie die maximale Anzahl der Zeichen fest, auf die lange Textfelder gekürzt werden');

// Modulstatistik
\define('_CO_WGHOLIDAY_STATS_SUMMARY', 'Modulstatistik');
\define('_CO_WGHOLIDAY_TOTAL_CATEGORIES', 'Kategorien:');
\define('_CO_WGHOLIDAY_TOTAL_ITEMS', 'Einträge');
\define('_CO_WGHOLIDAY_TOTAL_OFFLINE', 'Offline');
\define('_CO_WGHOLIDAY_TOTAL_PUBLISHED', 'Veröffentlicht');
\define('_CO_WGHOLIDAY_TOTAL_REJECTED', 'Abgelehnt');
\define('_CO_WGHOLIDAY_TOTAL_SUBMITTED', 'Eingereicht');
