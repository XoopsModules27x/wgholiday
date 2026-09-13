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

use XoopsModules\Wgholiday\Constants;

// 
$moduleDirName      = \basename(__DIR__);
$moduleDirNameUpper = \mb_strtoupper($moduleDirName);

include \XOOPS_ROOT_PATH . '/modules/' . $moduleDirName . '/preloads/autoloader.php';

// ------------------- Informations ------------------- //
$modversion = [
    'name'                => \_MI_WGHOLIDAY_NAME,
    'version'             => '1.0.0',
    'description'         => \_MI_WGHOLIDAY_DESC,
    'author'              => 'Goffy - Wedega',
    'author_mail'         => 'webmaster@wedega.com',
    'author_website_url'  => 'https://wedega.com',
    'author_website_name' => 'XOOPS on Wedega',
    'credits'             => 'Goffy - Wedega / XOOPS Development Team',
    'license'             => 'GPL 2.0 or later',
    'license_url'         => 'https://www.gnu.org/licenses/gpl-3.0.en.html',
    'help'                => 'page=help',
    'release_info'        => 'release_info',
    'release_file'        => \XOOPS_URL . '/modules/wgholiday/docs/release_info file',
    'release_date'        => '2026/09/01',
    'manual'              => 'link to manual file',
    'manual_file'         => \XOOPS_URL . '/modules/wgholiday/docs/install.txt',
    'min_php'             => '8.4',
    'min_xoops'           => '2.7.3',
    'min_admin'           => '1.2',
    'min_db'              => ['mysql' => '5.7', 'mysqli' => '5.7'],
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => \basename(__DIR__),
    'dirmoduleadmin'      => 'Frameworks/moduleclasses/moduleadmin',
    'sysicons16'          => '../../Frameworks/moduleclasses/icons/16',
    'sysicons32'          => '../../Frameworks/moduleclasses/icons/32',
    'modicons16'          => 'assets/icons/16',
    'modicons32'          => 'assets/icons/32',
    'demo_site_url'       => 'https://xoops.org',
    'demo_site_name'      => 'XOOPS Demo Site',
    'support_url'         => 'https://xoops.org/modules/newbb',
    'support_name'        => 'Support Forum',
    'module_website_url'  => 'www.xoops.org',
    'module_website_name' => 'XOOPS Project',
    'release'             => '01.09.2026',
    'module_status'       => 'Beta 1',
    'system_menu'         => 1,
    'hasAdmin'            => 1,
    'hasMain'             => 1,
    'adminindex'          => 'admin/index.php',
    'adminmenu'           => 'admin/menu.php',
    'onInstall'           => 'include/install.php',
    'onUninstall'         => 'include/uninstall.php',
    'onUpdate'            => 'include/update.php',
];
// ------------------- Templates ------------------- //
$modversion['templates'] = [
    // Admin templates
    ['file' => 'wgholiday_admin_about.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgholiday_admin_header.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgholiday_admin_index.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgholiday_admin_event.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgholiday_admin_clone.tpl', 'description' => '', 'type' => 'admin'],
    ['file' => 'wgholiday_admin_footer.tpl', 'description' => '', 'type' => 'admin'],
    // User templates
    ['file' => 'wgholiday_header.tpl', 'description' => ''],
    ['file' => 'wgholiday_index.tpl', 'description' => ''],
    ['file' => 'wgholiday_event.tpl', 'description' => ''],
    ['file' => 'wgholiday_breadcrumbs.tpl', 'description' => ''],
    ['file' => 'wgholiday_footer.tpl', 'description' => ''],
];
// ------------------- Mysql ------------------- //
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';
// Tables
$modversion['tables'] = [
    'wgholiday_events',
];
// ------------------- Menu ------------------- //
$currdirname  = isset($GLOBALS['xoopsModule']) && \is_object($GLOBALS['xoopsModule']) ? $GLOBALS['xoopsModule']->getVar('dirname') : 'system';
if ($currdirname == $moduleDirName) {
    $modversion['sub'][] = [
        'name' => \_MI_WGHOLIDAY_SMNAME1,
        'url'  => 'index.php',
    ];
    // Sub events
    $modversion['sub'][] = [
        'name' => \_MI_WGHOLIDAY_SMNAME2,
        'url'  => 'event.php',
    ];
    // Sub Submit
    $modversion['sub'][] = [
        'name' => \_MI_WGHOLIDAY_SMNAME3,
        'url'  => 'event.php?op=new',
    ];
}
// ------------------- Default Blocks ------------------- //
// Events spotlight
$modversion['blocks'][] = [
    'file'        => 'events_spotlight.php',
    'name'        => \_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT,
    'description' => \_MI_WGHOLIDAY_EVENT_BLOCK_SPOTLIGHT_DESC,
    'show_func'   => 'b_wgholiday_event_spotlight_show',
    'edit_func'   => 'b_wgholiday_event_spotlight_edit',
    'template'    => 'wgholiday_block_event_spotlight.tpl',
    'options'     => 'spotlight|0',
];
// ------------------- Config ------------------- //
// Meta descrition
$modversion['config'][] = [
    'name'        => 'metadescription',
    'title'       => '\_MI_WGHOLIDAY_MDESC',
    'description' => '\_MI_WGHOLIDAY_MDESC_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => \_MI_WGHOLIDAY_DESC,
];
// Meta Keywords
$modversion['config'][] = [
    'name'        => 'keywords',
    'title'       => '\_MI_WGHOLIDAY_KEYWORDS',
    'description' => '\_MI_WGHOLIDAY_KEYWORDS_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'text',
    'default'     => 'wgholiday, events',
];
// Editor
\xoops_load('xoopseditorhandler');
$editorHandler = XoopsEditorHandler::getInstance();
$modversion['config'][] = [
    'name'        => 'editor',
    'title'       => '\_MI_WGHOLIDAY_EDITOR',
    'description' => '\_MI_WGHOLIDAY_EDITOR_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'text',
    'default'     => 'dhtml',
    'options'     => array_flip($editorHandler->getList()),
];
// Editor : max characters admin area
$modversion['config'][] = [
    'name'        => 'editor_maxchar',
    'title'       => '\_MI_WGHOLIDAY_EDITOR_MAXCHAR',
    'description' => '\_MI_WGHOLIDAY_EDITOR_MAXCHAR_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 200,
];
// create increment steps for file size
require_once __DIR__ . '/include/xoops_version.inc.php';
$iniPostMaxSize       = wgholidayReturnBytes(\ini_get('post_max_size'));
$iniUploadMaxFileSize = wgholidayReturnBytes(\ini_get('upload_max_filesize'));
$maxSize              = min($iniPostMaxSize, $iniUploadMaxFileSize);
if ($maxSize > 10000 * 1048576) {
    $increment = 500;
}
if ($maxSize <= 10000 * 1048576) {
    $increment = 200;
}
if ($maxSize <= 5000 * 1048576) {
    $increment = 100;
}
if ($maxSize <= 2500 * 1048576) {
    $increment = 50;
}
if ($maxSize <= 1000 * 1048576) {
    $increment = 10;
}
if ($maxSize <= 500 * 1048576) {
    $increment = 5;
}
if ($maxSize <= 100 * 1048576) {
    $increment = 2;
}
if ($maxSize <= 50 * 1048576) {
    $increment = 1;
}
if ($maxSize <= 25 * 1048576) {
    $increment = 0.5;
}
$optionMaxsize = [];
$i = $increment;
while ($i * 1048576 <= $maxSize) {
    $optionMaxsize[$i . ' ' . _MI_WGHOLIDAY_SIZE_MB] = $i * 1048576;
    $i += $increment;
}
// Uploads : maxsize of image
$modversion['config'][] = [
    'name'        => 'maxsize_image',
    'title'       => '\_MI_WGHOLIDAY_MAXSIZE_IMAGE',
    'description' => '\_MI_WGHOLIDAY_MAXSIZE_IMAGE_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => 3145728,
    'options'     => $optionMaxsize,
];
// Uploads : mimetypes of image
$modversion['config'][] = [
    'name'        => 'mimetypes_image',
    'title'       => '\_MI_WGHOLIDAY_MIMETYPES_IMAGE',
    'description' => '\_MI_WGHOLIDAY_MIMETYPES_IMAGE_DESC',
    'formtype'    => 'select_multi',
    'valuetype'   => 'array',
    'default'     => ['image/gif', 'image/jpeg', 'image/png'],
    'options'     => ['bmp' => 'image/bmp','gif' => 'image/gif','pjpeg' => 'image/pjpeg', 'jpeg' => 'image/jpeg','jpg' => 'image/jpg','jpe' => 'image/jpe', 'png' => 'image/png'],
];
$modversion['config'][] = [
    'name'        => 'maxwidth_image',
    'title'       => '\_MI_WGHOLIDAY_MAXWIDTH_IMAGE',
    'description' => '\_MI_WGHOLIDAY_MAXWIDTH_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
$modversion['config'][] = [
    'name'        => 'maxheight_image',
    'title'       => '\_MI_WGHOLIDAY_MAXHEIGHT_IMAGE',
    'description' => '\_MI_WGHOLIDAY_MAXHEIGHT_IMAGE_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 800,
];
// Admin pager
$modversion['config'][] = [
    'name'        => 'adminpager',
    'title'       => '\_MI_WGHOLIDAY_ADMIN_PAGER',
    'description' => '\_MI_WGHOLIDAY_ADMIN_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// User pager
$modversion['config'][] = [
    'name'        => 'userpager',
    'title'       => '\_MI_WGHOLIDAY_USER_PAGER',
    'description' => '\_MI_WGHOLIDAY_USER_PAGER_DESC',
    'formtype'    => 'textbox',
    'valuetype'   => 'int',
    'default'     => 10,
];
// Block automatically
$modversion['config'][] = [
    'name'        => 'auto_block',
    'title'       => '\_MI_WGHOLIDAY_AUTO_BLOCK',
    'description' => '\_MI_WGHOLIDAY_AUTO_BLOCK_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Use Header
$modversion['config'][] = [
    'name'        => 'use_header',
    'title'       => '\_MI_WGHOLIDAY_USE_HEADER',
    'description' => '\_MI_WGHOLIDAY_USE_HEADER_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Use Footer
$modversion['config'][] = [
    'name'        => 'use_footer',
    'title'       => '\_MI_WGHOLIDAY_USE_FOOTER',
    'description' => '\_MI_WGHOLIDAY_USE_FOOTER_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Type of setting block on-/offline
$modversion['config'][] = [
    'name'        => 'type_onoff',
    'title'       => '\_MI_WGHOLIDAY_TYPE_ONOFF',
    'description' => '\_MI_WGHOLIDAY_TYPE_ONOFF_DESC',
    'formtype'    => 'select',
    'valuetype'   => 'int',
    'default'     => Constants::ONOFF_TYPE_DATE,
    'options'     => [_MI_WGHOLIDAY_TYPE_ONOFF_DATE => Constants::ONOFF_TYPE_DATE, _MI_WGHOLIDAY_TYPE_ONOFF_RADIO => Constants::ONOFF_TYPE_RADIO],
];
// Show Breadcrumbs
$modversion['config'][] = [
    'name'        => 'show_breadcrumbs',
    'title'       => '\_MI_WGHOLIDAY_SHOW_BREADCRUMBS',
    'description' => '\_MI_WGHOLIDAY_SHOW_BREADCRUMBS_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Make Sample button visible?
$modversion['config'][] = [
    'name'        => 'displaySampleButton',
    'title'       => '_CO_WGHOLIDAY_SHOW_SAMPLE_BUTTON',
    'description' => '_CO_WGHOLIDAY_SHOW_SAMPLE_BUTTON_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Make tab clone visible?
$modversion['config'][] = [
    'name'        => 'displayTabClone',
    'title'       => '_MI_WGHOLIDAY_SHOW_TAB_CLONE',
    'description' => '',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Make tab feedback visible?
$modversion['config'][] = [
    'name'        => 'displayTabFeedback',
    'title'       => '_MI_WGHOLIDAY_SHOW_TAB_FEEDBACK',
    'description' => '',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
// Show copyright
$modversion['config'][] = [
    'name'        => 'show_copyright',
    'title'       => '_MI_WGHOLIDAY_SHOW_COPYRIGHT',
    'description' => '_MI_WGHOLIDAY_SHOW_COPYRIGHT_DESC',
    'formtype'    => 'yesno',
    'valuetype'   => 'int',
    'default'     => 1,
];
