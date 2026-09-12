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
 * feedback plugin for xoops modules
 *
 * @copyright      module for xoops
 * @license         GNU GPL 2.0 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @since          1.0
 * @min_xoops      2.5.11
 * @author         XOOPS - Website:<https://xoops.org>
 */
$moduleDirName      = \basename(\dirname(__DIR__, 2));
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

\define('_CO_WGHOLIDAY_FB_FORM_TITLE', 'Feedback senden');
\define('_CO_WGHOLIDAY_FB_RECIPIENT', 'Empfänger');
\define('_CO_WGHOLIDAY_FB_NAME', 'Name');
\define('_CO_WGHOLIDAY_FB_NAME_PLACEHOLER', 'Bitte geben Sie Ihren Namen ein');
\define('_CO_WGHOLIDAY_FB_SITE', 'Website');
\define('_CO_WGHOLIDAY_FB_SITE_PLACEHOLER', 'Bitte geben Sie Ihre Website ein');
\define('_CO_WGHOLIDAY_FB_MAIL', 'E-Mail');
\define('_CO_WGHOLIDAY_FB_MAIL_PLACEHOLER', 'Bitte geben Sie Ihre E-Mail-Adresse ein');
\define('_CO_WGHOLIDAY_FB_TYPE', 'Art des Feedbacks');
\define('_CO_WGHOLIDAY_FB_TYPE_SUGGESTION', 'Vorschläge');
\define('_CO_WGHOLIDAY_FB_TYPE_BUGS', 'Fehler');
\define('_CO_WGHOLIDAY_FB_TYPE_TESTIMONIAL', 'Erfahrungsberichte');
\define('_CO_WGHOLIDAY_FB_TYPE_FEATURES', 'Funktionen');
\define('_CO_WGHOLIDAY_FB_TYPE_OTHERS', 'Sonstiges');
\define('_CO_WGHOLIDAY_FB_TYPE_CONTENT', 'Feedback-Inhalt');
\define('_CO_WGHOLIDAY_FB_SEND_FOR', 'Feedback für das Modul ');
\define('_CO_WGHOLIDAY_FB_SEND_SUCCESS', 'Feedback wurde erfolgreich gesendet');
\define('_CO_WGHOLIDAY_FB_SEND_ERROR', 'Beim Senden des Feedbacks ist ein Fehler aufgetreten!');
