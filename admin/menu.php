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

$dirname       = \basename(\dirname(__DIR__));
$moduleHandler = \xoops_getHandler('module');
$xoopsModule   = XoopsModule::getByDirname($dirname);
$moduleInfo    = $moduleHandler->get($xoopsModule->getVar('mid'));
$sysPathIcon32 = $moduleInfo->getInfo('sysicons32');

$helper = \XoopsModules\Wgholiday\Helper::getInstance();

$adminmenu[] = [
    'title' => \_MI_WGHOLIDAY_ADMENU1,
    'link' => 'admin/index.php',
    'icon' => 'assets/icons/32/dashboard.png',
];
$adminmenu[] = [
    'title' => \_MI_WGHOLIDAY_ADMENU2,
    'link' => 'admin/event.php',
    'icon' => 'assets/icons/32/event.png',
];
if ($helper->getConfig('displayTabClone')) {
    $adminmenu[] = [
        'title' => \_MI_WGHOLIDAY_ADMENU3,
        'link' => 'admin/clone.php',
        'icon' => 'assets/icons/32/clone.png',
    ];
}
if ($helper->getConfig('displayTabFeedback')) {
    $adminmenu[] = [
        'title' => \_MI_WGHOLIDAY_ADMENU4,
        'link' => 'admin/feedback.php',
        'icon' => 'assets/icons/32/feedback.png',
    ];
}
$adminmenu[] = [
    'title' => \_MI_WGHOLIDAY_ABOUT,
    'link' => 'admin/about.php',
    'icon' => 'assets/icons/32/about.png',
];
