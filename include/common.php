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
if (!\defined('XOOPS_ICONS32_PATH')) {
    \define('XOOPS_ICONS32_PATH', \XOOPS_ROOT_PATH . '/Frameworks/moduleclasses/icons/32');
}
if (!\defined('XOOPS_ICONS32_URL')) {
    \define('XOOPS_ICONS32_URL', \XOOPS_URL . '/Frameworks/moduleclasses/icons/32');
}
\define('WGHOLIDAY_DIRNAME', 'wgholiday');
\define('WGHOLIDAY_PATH', \XOOPS_ROOT_PATH . '/modules/' . \WGHOLIDAY_DIRNAME);
\define('WGHOLIDAY_URL', \XOOPS_URL . '/modules/' . \WGHOLIDAY_DIRNAME);
\define('WGHOLIDAY_ICONS_PATH', \WGHOLIDAY_PATH . '/assets/icons');
\define('WGHOLIDAY_ICONS_URL', \WGHOLIDAY_URL . '/assets/icons');
\define('WGHOLIDAY_IMAGE_PATH', \WGHOLIDAY_PATH . '/assets/images');
\define('WGHOLIDAY_IMAGE_URL', \WGHOLIDAY_URL . '/assets/images');
\define('WGHOLIDAY_UPLOAD_PATH', \XOOPS_UPLOAD_PATH . '/' . \WGHOLIDAY_DIRNAME);
\define('WGHOLIDAY_UPLOAD_URL', \XOOPS_UPLOAD_URL . '/' . \WGHOLIDAY_DIRNAME);
\define('WGHOLIDAY_UPLOAD_IMAGE_PATH', \WGHOLIDAY_UPLOAD_PATH . '/images');
\define('WGHOLIDAY_UPLOAD_IMAGE_URL', \WGHOLIDAY_UPLOAD_URL . '/images');
\define('WGHOLIDAY_ADMIN', \WGHOLIDAY_URL . '/admin/index.php');
$localLogo = \WGHOLIDAY_IMAGE_URL . '/wedega_logo.png';
// Module Information
$copyright = "<a href='https://wedega.com' title='XOOPS on Wedega' target='_blank'><img src='" . $localLogo . "' alt='XOOPS on Wedega' ></a>";
require_once \XOOPS_ROOT_PATH . '/class/xoopsrequest.php';
require_once \WGHOLIDAY_PATH . '/include/functions.php';
