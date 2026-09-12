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
\define('_MD_WGHOLIDAY_INDEX', 'Overview wgHoliday');
\define('_MD_WGHOLIDAY_TITLE', 'wgHoliday');
\define('_MD_WGHOLIDAY_DESC', 'This module is showing an information about your holidays');
\define('_MD_WGHOLIDAY_NO_PDF_LIBRARY', 'Libraries TCPDF not there yet, upload them in root/Frameworks');
\define('_MD_WGHOLIDAY_NO', 'No');
\define('_MD_WGHOLIDAY_DETAILS', 'Show details');
\define('_MD_WGHOLIDAY_BROKEN', 'Notify broken');
// ---------------- Contents ----------------
// Events
\define('_MD_WGHOLIDAY_EVENTS', 'Events');
\define('_MD_WGHOLIDAY_EVENT_ADD', 'Add Events');
\define('_MD_WGHOLIDAY_EVENT_EDIT', 'Edit Events');
\define('_MD_WGHOLIDAY_EVENT_DELETE', 'Delete Events');
\define('_MD_WGHOLIDAY_EVENT_CLONE', 'Clone Events');
\define('_MD_WGHOLIDAY_EVENT_DETAILS', 'Details Events');
\define('_MD_WGHOLIDAY_EVENT_LIST', 'List of Events');
\define('_MD_WGHOLIDAY_EVENT_TITLE', 'Events title');
\define('_MD_WGHOLIDAY_EVENT_DESC', 'Events description');
// Caption of Events
\define('_MD_WGHOLIDAY_EVENT_ID', 'Id');
\define('_MD_WGHOLIDAY_EVENT_NAME', 'Name');
\define('_MD_WGHOLIDAY_EVENT_HEADER', 'Header');
\define('_MD_WGHOLIDAY_EVENT_BODY', 'Body');
\define('_MD_WGHOLIDAY_EVENT_FOOTER', 'Footer');
\define('_MD_WGHOLIDAY_EVENT_IMAGE', 'Image');
\define('_MD_WGHOLIDAY_EVENT_DATE_SHOWFROM', 'Display from');
\define('_MD_WGHOLIDAY_EVENT_DATE_SHOWTO', 'to');
\define('_MD_WGHOLIDAY_EVENT_DATE_WAIT', 'Waiting');
\define('_MD_WGHOLIDAY_EVENT_DATE_RUNNING', 'Running');
\define('_MD_WGHOLIDAY_EVENT_DATE_CLOSED', 'Closed');
\define('_MD_WGHOLIDAY_EVENT_STATUS', 'Status');
\define('_MD_WGHOLIDAY_EVENT_STATUS_OFFLINE', 'Offline');
\define('_MD_WGHOLIDAY_EVENT_STATUS_ONLINE', 'Online');
\define('_MD_WGHOLIDAY_EVENT_DATE_CREATED', 'Date_created');
\define('_MD_WGHOLIDAY_EVENT_SUBMITTER', 'Submitter');
\define('_MD_WGHOLIDAY_INDEX_THEREARE', 'There are %s Events');
\define('_MD_WGHOLIDAY_INDEX_LATEST_LIST', 'Last wgHoliday');
//Displaying event items
\define('_MD_WGHOLIDAY_EVENT_DISPLAY', 'Display:');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_NONE', 'Do not display');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK', 'Display only on website');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL', 'Display only on modal');
\define('_MD_WGHOLIDAY_EVENT_DISPLAY_BOTH', 'Display on both');
//Displaying event image
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS', 'Image position');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_TOP', 'Display before body');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_LEFT', 'Display on left side of body');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT', 'Display on right side of body');
\define('_MD_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM', 'Display after body');
\define('_MD_WGHOLIDAY_EVENT_IMAGE_FOR', 'Image for');
// Submit
\define('_MD_WGHOLIDAY_SUBMIT', 'Submit');
\define('_MD_WGHOLIDAY_SAVE', 'Save');
// Form
\define('_MD_WGHOLIDAY_FORM_OK', 'Successfully saved');
\define('_MD_WGHOLIDAY_FORM_DELETE_OK', 'Successfully deleted');
\define('_MD_WGHOLIDAY_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_MD_WGHOLIDAY_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Errors
\define('_MD_WGHOLIDAY_INVALID_PARAM', 'Invalid parameter');
\define('_MD_WGHOLIDAY_ERROR_CHANGE_STATUS', 'Error when changing the status');
// Admin link
\define('_MD_WGHOLIDAY_ADMIN', 'Admin');
// ---------------- End ----------------
