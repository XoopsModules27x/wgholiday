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

// ---------------- Admin Main ----------------
\define('_MI_WGHOLIDAY_NAME', 'wgHoliday');
\define('_MI_WGHOLIDAY_DESC', 'Dieses Modul zeigt Informationen über Ihre Urlaubstage an');

// ---------------- Admin Menu ----------------
\define('_MI_WGHOLIDAY_ADMENU1', 'Dashboard');
\define('_MI_WGHOLIDAY_ADMENU2', 'Einträge');
\define('_MI_WGHOLIDAY_ADMENU3', 'Klonen');
\define('_MI_WGHOLIDAY_ADMENU4', 'Feedback');
\define('_MI_WGHOLIDAY_ABOUT', 'Über');

// ---------------- Admin Nav ----------------
\define('_MI_WGHOLIDAY_ADMIN_PAGER', 'Administration – Einträge pro Seite');
\define('_MI_WGHOLIDAY_ADMIN_PAGER_DESC', 'Anzahl der Einträge pro Seite im Administrationsbereich');

// User
\define('_MI_WGHOLIDAY_USER_PAGER', 'Benutzer – Einträge pro Seite');
\define('_MI_WGHOLIDAY_USER_PAGER_DESC', 'Anzahl der Einträge pro Seite im Benutzerbereich');

// Submenu
\define('_MI_WGHOLIDAY_SMNAME1', 'Startseite');
\define('_MI_WGHOLIDAY_SMNAME2', 'Einträge');
\define('_MI_WGHOLIDAY_SMNAME3', 'Eintrag einreichen');

// Blocks
\define('_MI_WGHOLIDAY_EVENT_BLOCK', 'Einträge-Block');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_DESC', 'Block für die Anzeige von Einträgen');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT', 'Einträge-Block – Spotlight');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT_DESC', 'Spotlight-Block für die Anzeige von Einträgen');

// Config
\define('_MI_WGHOLIDAY_MDESC', 'Meta-Modulbeschreibung');
\define('_MI_WGHOLIDAY_MDESC_DESC', 'Geben Sie hier die Modulbeschreibung ein, die in den Meta-Daten als Beschreibung angezeigt werden soll');
\define('_MI_WGHOLIDAY_KEYWORDS', 'Meta-Schlüsselwörter');
\define('_MI_WGHOLIDAY_KEYWORDS_DESC', 'Geben Sie hier die Schlüsselwörter ein (durch Kommas getrennt), die in den Meta-Daten angezeigt werden sollen');
\define('_MI_WGHOLIDAY_EDITOR', 'Editor im Administrationsbereich');
\define('_MI_WGHOLIDAY_EDITOR_DESC', 'Wählen Sie den Editor aus, der im Administrationsbereich für Textfelder verwendet werden soll');
\define('_MI_WGHOLIDAY_EDITOR_MAXCHAR', 'Maximale Textlänge');
\define('_MI_WGHOLIDAY_EDITOR_MAXCHAR_DESC', 'Maximale Anzahl der Zeichen, die im Administrationsbereich für ein Textfeld oder Editorfeld angezeigt werden');
\define('_MI_WGHOLIDAY_SIZE_MB', 'MB');
\define('_MI_WGHOLIDAY_MAXSIZE_IMAGE', 'Maximale Bildgröße');
\define('_MI_WGHOLIDAY_MAXSIZE_IMAGE_DESC', 'Legen Sie die maximale Größe für das Hochladen von Bildern fest');
\define('_MI_WGHOLIDAY_MIMETYPES_IMAGE', 'MIME-Typen für Bilder');
\define('_MI_WGHOLIDAY_MIMETYPES_IMAGE_DESC', 'Legen Sie die zulässigen MIME-Typen für das Hochladen von Bildern fest');
\define('_MI_WGHOLIDAY_MAXWIDTH_IMAGE', 'Maximale Bildbreite');
\define('_MI_WGHOLIDAY_MAXWIDTH_IMAGE_DESC', 'Legen Sie die maximale Breite fest, auf die hochgeladene Bilder skaliert werden sollen (in Pixel).<br>0 bedeutet, dass die Bilder ihre ursprüngliche Größe behalten.<br>Wenn ein Bild kleiner als der angegebene Maximalwert ist, wird es nicht vergrößert, sondern in seiner ursprünglichen Breite gespeichert.');
\define('_MI_WGHOLIDAY_MAXHEIGHT_IMAGE', 'Maximale Bildhöhe');
\define('_MI_WGHOLIDAY_MAXHEIGHT_IMAGE_DESC', 'Legen Sie die maximale Höhe fest, auf die hochgeladene Bilder skaliert werden sollen (in Pixel).<br>0 bedeutet, dass die Bilder ihre ursprüngliche Größe behalten.<br>Wenn ein Bild kleiner als der angegebene Maximalwert ist, wird es nicht vergrößert, sondern in seiner ursprünglichen Höhe gespeichert');
\define('_MI_WGHOLIDAY_SHOW_BREADCRUMBS', 'Brotkrümelnavigation anzeigen');
\define('_MI_WGHOLIDAY_SHOW_BREADCRUMBS_DESC', 'Zeigt eine Brotkrümelnavigation an, die die aktuelle Seite im Kontext der Seitenstruktur darstellt');
\define('_MI_WGHOLIDAY_SHOW_TAB_CLONE', 'Registerkarte „Klonen“ auf der Übersichtsseite anzeigen');
\define('_MI_WGHOLIDAY_SHOW_TAB_FEEDBACK', 'Registerkarte „Feedback“ auf der Übersichtsseite anzeigen');
\define('_MI_WGHOLIDAY_SHOW_COPYRIGHT', 'Copyright anzeigen');
\define('_MI_WGHOLIDAY_SHOW_COPYRIGHT_DESC', 'Sie können das Copyright entfernen, jedoch wird ersucht, an einer beliebigen Stelle einen Backlink auf www.wedega.com anzubringen');
\define('_MI_WGHOLIDAY_USE_HEADER', 'Header verwenden');
\define('_MI_WGHOLIDAY_USE_HEADER_DESC', 'Wählen Sie, ob ein Header verwendet werden soll');
\define('_MI_WGHOLIDAY_USE_FOOTER', 'Footer verwenden');
\define('_MI_WGHOLIDAY_USE_FOOTER_DESC', 'Wählen Sie, ob ein Footer verwendet werden soll');
\define('_MI_WGHOLIDAY_TYPE_ONOFF', 'Art der Online-Schaltung');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_DESC', 'Legen Sie fest, wie die Online-Schaltung erfolgen soll. Wenn Sie diese Option ändern, müssen Sie jedes Ereignis einmal öffnen und speichern, damit die Änderung übernommen wird');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_DATE', 'Online-Schaltung nach Datum von/bis');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_RADIO', 'Online-Schaltung per Ein-/Aus-Schalter');
// ---------------- End ----------------
