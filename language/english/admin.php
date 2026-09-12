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
\define('_AM_WGHOLIDAY_STATISTICS', 'Statistics');
// There are
\define('_AM_WGHOLIDAY_THEREARE_EVENTS', "There are <span class='bold'>%s</span> events in the database");
// ---------------- Admin Files ----------------
// There aren't
\define('_AM_WGHOLIDAY_THEREARENT_EVENTS', "There aren't events");
// Save/Delete
\define('_AM_WGHOLIDAY_FORM_OK', 'Successfully saved');
\define('_AM_WGHOLIDAY_FORM_DELETE_OK', 'Successfully deleted');
\define('_AM_WGHOLIDAY_FORM_SURE_DELETE', "Are you sure to delete: <b><span style='color : Red;'>%s </span></b>");
\define('_AM_WGHOLIDAY_FORM_SURE_RENEW', "Are you sure to update: <b><span style='color : Red;'>%s </span></b>");
// Errors
\define('_AM_WGHOLIDAY_INVALID_PARAM', 'Invalid parameter');
\define('_AM_WGHOLIDAY_INVALID_DATE', 'Invalid date');
\define('_AM_WGHOLIDAY_ERROR_CHANGE_STATUS', 'Error when changing the status');
// Buttons
\define('_AM_WGHOLIDAY_ADD_EVENT', 'Add New Event');
// Lists
\define('_AM_WGHOLIDAY_LIST_EVENTS', 'List of Events');
// ---------------- Admin Classes ----------------
// Events add/edit
\define('_AM_WGHOLIDAY_EVENT_ADD', 'Add Events');
\define('_AM_WGHOLIDAY_EVENT_EDIT', 'Edit Events');
// Elements of Events
\define('_AM_WGHOLIDAY_EVENT_ID', 'Id');
\define('_AM_WGHOLIDAY_EVENT_NAME', 'Name');
\define('_AM_WGHOLIDAY_EVENT_HEADER', 'Header');
\define('_AM_WGHOLIDAY_EVENT_BODY', 'Body');
\define('_AM_WGHOLIDAY_EVENT_FOOTER', 'Footer');
\define('_AM_WGHOLIDAY_EVENT_IMAGE', 'Image');
\define('_AM_WGHOLIDAY_EVENT_IMAGE_UPLOADS', 'Image in %s :');
\define('_AM_WGHOLIDAY_EVENT_DATE_SHOWFROM', 'Date show from');
\define('_AM_WGHOLIDAY_EVENT_DATE_SHOWTO', 'Date show to');
\define('_AM_WGHOLIDAY_EVENT_DATE_WAIT', 'Waiting');
\define('_AM_WGHOLIDAY_EVENT_DATE_RUNNING', 'Running');
\define('_AM_WGHOLIDAY_EVENT_DATE_CLOSED', 'Closed');
\define('_AM_WGHOLIDAY_EVENT_STATUS', 'Status');
\define('_AM_WGHOLIDAY_EVENT_STATUS_OFFLINE', 'Offline');
\define('_AM_WGHOLIDAY_EVENT_STATUS_ONLINE', 'Online');
\define('_AM_WGHOLIDAY_EVENT_DATE_CREATED', 'Date created');
\define('_AM_WGHOLIDAY_EVENT_SUBMITTER', 'Submitter');
//Displaying event items
\define('_AM_WGHOLIDAY_EVENT_DISPLAY', 'Display');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_NONE', 'Do not display');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK', 'Display only on website');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL', 'Display only on modal');
\define('_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH', 'Display on both');
//Displaying event image
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS', 'Image position:');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_TOP', 'Display before body');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_LEFT', 'Display on left side of body');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT', 'Display on right side of body');
\define('_AM_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM', 'Display after body');
\define('_AM_WGHOLIDAY_EVENT_IMAGE_FOR', 'Image for');
// General
\define('_AM_WGHOLIDAY_FORM_UPLOAD', 'Upload file');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_NEW', 'Upload new file: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_SIZE', 'Max file size: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_SIZE_MB', 'MB');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_IMG_WIDTH', 'Max image width: ');
\define('_AM_WGHOLIDAY_FORM_UPLOAD_IMG_HEIGHT', 'Max image height: ');
\define('_AM_WGHOLIDAY_FORM_IMAGE_PATH', 'Files in %s :');
\define('_AM_WGHOLIDAY_FORM_ACTION', 'Action');
\define('_AM_WGHOLIDAY_FORM_EDIT', 'Modification');
\define('_AM_WGHOLIDAY_FORM_DELETE', 'Clear');
// Clone feature
\define('_AM_WGHOLIDAY_CLONE', 'Clone');
\define('_AM_WGHOLIDAY_CLONE_DSC', 'Cloning a module has never been this easy! Just type in the name you want for it and hit submit button!');
\define('_AM_WGHOLIDAY_CLONE_TITLE', 'Clone %s');
\define('_AM_WGHOLIDAY_CLONE_NAME', 'Choose a name for the new module');
\define('_AM_WGHOLIDAY_CLONE_NAME_DSC', 'Do not use special characters! <br>Do not choose an existing module dirname or database table name!');
\define('_AM_WGHOLIDAY_CLONE_INVALIDNAME', 'ERROR: Invalid module name, please try another one!');
\define('_AM_WGHOLIDAY_CLONE_EXISTS', 'ERROR: Module name already taken, please try another one!');
\define('_AM_WGHOLIDAY_CLONE_CONGRAT', 'Congratulations! %s was sucessfully created!<br>You may want to make changes in language files.');
\define('_AM_WGHOLIDAY_CLONE_IMAGEFAIL', 'Attention, we failed creating the new module logo. Please consider modifying assets/images/logo_module.png manually!');
\define('_AM_WGHOLIDAY_CLONE_FAIL', 'Sorry, we failed in creating the new clone. Maybe you need to temporally set write permissions (CHMOD 777) to modules folder and try again.');
// ---------------- Admin Others ----------------
\define('_AM_WGHOLIDAY_ABOUT_MAKE_DONATION', 'Submit');
\define('_AM_WGHOLIDAY_SUPPORT_FORUM', 'Support Forum');
\define('_AM_WGHOLIDAY_DONATION_AMOUNT', 'Donation Amount');
\define('_AM_WGHOLIDAY_MAINTAINEDBY', ' is maintained by ');
// ---------------- End ----------------
