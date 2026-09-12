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
\define('_MI_WGHOLIDAY_DESC', 'This module is showing an information about your holidays');
// ---------------- Admin Menu ----------------
\define('_MI_WGHOLIDAY_ADMENU1', 'Dashboard');
\define('_MI_WGHOLIDAY_ADMENU2', 'Events');
\define('_MI_WGHOLIDAY_ADMENU3', 'Clone');
\define('_MI_WGHOLIDAY_ADMENU4', 'Feedback');
\define('_MI_WGHOLIDAY_ABOUT', 'About');
// ---------------- Admin Nav ----------------
\define('_MI_WGHOLIDAY_ADMIN_PAGER', 'Admin pager');
\define('_MI_WGHOLIDAY_ADMIN_PAGER_DESC', 'Admin per page list');
// User
\define('_MI_WGHOLIDAY_USER_PAGER', 'User pager');
\define('_MI_WGHOLIDAY_USER_PAGER_DESC', 'User per page list');
// Submenu
\define('_MI_WGHOLIDAY_SMNAME1', 'Index page');
\define('_MI_WGHOLIDAY_SMNAME2', 'Events');
\define('_MI_WGHOLIDAY_SMNAME3', 'Submit Events');
// Blocks
\define('_MI_WGHOLIDAY_EVENT_BLOCK', 'Events block');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_DESC', 'Events block description');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT', 'Events block spotlight');
\define('_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT_DESC', 'Events block spotlight description');
// Config
\define('_MI_WGHOLIDAY_MDESC', 'Meta module description');
\define('_MI_WGHOLIDAY_MDESC_DESC', 'Insert here module description which should be shown in meta data description');
\define('_MI_WGHOLIDAY_KEYWORDS', 'Meta keywords');
\define('_MI_WGHOLIDAY_KEYWORDS_DESC', 'Insert here the keywords (separate by comma) which should be shown in meta data');
\define('_MI_WGHOLIDAY_EDITOR', 'Editor admin');
\define('_MI_WGHOLIDAY_EDITOR_DESC', 'Select the editor which should be used in admin area for text area fields');
\define('_MI_WGHOLIDAY_EDITOR_MAXCHAR', 'Text max characters');
\define('_MI_WGHOLIDAY_EDITOR_MAXCHAR_DESC', 'Max characters for showing text of a textarea or editor field in admin area');
\define('_MI_WGHOLIDAY_SIZE_MB', 'MB');
\define('_MI_WGHOLIDAY_MAXSIZE_IMAGE', 'Max size image');
\define('_MI_WGHOLIDAY_MAXSIZE_IMAGE_DESC', 'Define the max size for uploading images');
\define('_MI_WGHOLIDAY_MIMETYPES_IMAGE', 'Mime types image');
\define('_MI_WGHOLIDAY_MIMETYPES_IMAGE_DESC', 'Define the allowed mime types for uploading images');
\define('_MI_WGHOLIDAY_MAXWIDTH_IMAGE', 'Max width image');
\define('_MI_WGHOLIDAY_MAXWIDTH_IMAGE_DESC', 'Set the max width to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original width.');
\define('_MI_WGHOLIDAY_MAXHEIGHT_IMAGE', 'Max height image');
\define('_MI_WGHOLIDAY_MAXHEIGHT_IMAGE_DESC', 'Set the max height to which uploaded images should be scaled (in pixel)<br>0 means, that images keeps the original size. <br>If an image is smaller than maximum value then the image will be not enlarge, it will be save in original height');
\define('_MI_WGHOLIDAY_SHOW_BREADCRUMBS', 'Show breadcrumb navigation');
\define('_MI_WGHOLIDAY_SHOW_BREADCRUMBS_DESC', 'Show breadcrumb navigation which displays the current page in context within the site structure');
\define('_MI_WGHOLIDAY_SHOW_TAB_CLONE', 'Show tab "Clone" on dashboard page');
\define('_MI_WGHOLIDAY_SHOW_TAB_FEEDBACK', 'Show tab "Feedback" on dashboard page');
\define('_MI_WGHOLIDAY_SHOW_COPYRIGHT', 'Show copyright');
\define('_MI_WGHOLIDAY_SHOW_COPYRIGHT_DESC', 'You can remove the copyright, but a backlinks to www.wedega.com is expected, anywhere on your site');
\define('_MI_WGHOLIDAY_AUTO_BLOCK', 'Create block automatically');
\define('_MI_WGHOLIDAY_AUTO_BLOCK_DESC', 'When saving an event, wgHoliday can create a related block automatically and set him online');
\define('_MI_WGHOLIDAY_USE_HEADER', 'Use Header');
\define('_MI_WGHOLIDAY_USE_HEADER_DESC', 'Select whether you want to use a header');
\define('_MI_WGHOLIDAY_USE_FOOTER', 'Use Footer');
\define('_MI_WGHOLIDAY_USE_FOOTER_DESC', 'Select whether you want to use a footer');
\define('_MI_WGHOLIDAY_TYPE_ONOFF', 'Type of setting online');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_DESC', 'Define the type of setting online. If you change this option you have to open and save each event once in order to apply this change');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_DATE', 'Setting online by dates from/to');
\define('_MI_WGHOLIDAY_TYPE_ONOFF_RADIO', 'Setting online radio on-/offline');
// ---------------- End ----------------
