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

use XoopsModules\Wgholiday\Common;

require_once \dirname(__DIR__) . '/preloads/autoloader.php';
require __DIR__ . '/header.php';

// Template Index
$templateMain = 'wgholiday_admin_index.tpl';

// Count elements
$countEvents = $eventsHandler->getCount();

// InfoBox Statistics
$adminObject->addInfoBox(\_AM_WGHOLIDAY_STATISTICS);
// Info elements
$adminObject->addInfoBoxLine(\sprintf( '<label>' . \_AM_WGHOLIDAY_THEREARE_EVENTS . '</label>', $countEvents));

// Upload Folders
$configurator = new Common\Configurator();
if ($configurator->uploadFolders && \is_array($configurator->uploadFolders)) {
    foreach (\array_keys($configurator->uploadFolders) as $i) {
        $folder[] = $configurator->uploadFolders[$i];
    }
}
// Uploads Folders Created
foreach (\array_keys($folder) as $i) {
    $adminObject->addConfigBoxLine($folder[$i], 'folder');
    $adminObject->addConfigBoxLine([$folder[$i], '777'], 'chmod');
}

// Render Index
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('index.php'));
// Test Data
if ($helper->getConfig('displaySampleButton')) {
    \xoops_loadLanguage('admin/modulesadmin', 'system');
    require_once \dirname(__DIR__) . '/testdata/index.php';
    $adminObject->addItemButton(\constant('_CO_WGHOLIDAY_ADD_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=load', 'add');
    $adminObject->addItemButton(\constant('_CO_WGHOLIDAY_SAVE_SAMPLEDATA'), '__DIR__ . /../../testdata/index.php?op=save', 'add');
//    $adminObject->addItemButton(\constant('_CO_WGHOLIDAY_EXPORT_SCHEMA'), '__DIR__ . /../../testdata/index.php?op=exportschema', 'add');
    $adminObject->displayButton('left');
}
$GLOBALS['xoopsTpl']->assign('index', $adminObject->displayIndex());
// End Test Data
require __DIR__ . '/footer.php';
