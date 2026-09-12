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

use Xmf\Request;
use XoopsModules\Wgholiday;
use XoopsModules\Wgholiday\Constants;
use XoopsModules\Wgholiday\Common;

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgholiday_event.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';

$op    = Request::getCmd('op', 'list');
$evId  = Request::getInt('id');
$start = Request::getInt('start');
$limit = Request::getInt('limit');

if('change_status' === $op) {
    // Security Check
    if (!$GLOBALS['xoopsSecurity']->check()) {
        \redirect_header('index.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
    }
    $permEdit = \is_object($GLOBALS['xoopsUser']) && $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
    if (!$permEdit) {
        \redirect_header('index.php', 3, \_NOPERM);
    }
    if ($evId > 0) {
        $eventObj = $eventsHandler->get($evId);
        // check whether object is valid
        if (!\is_object($eventObj)) {
            \redirect_header('index.php?op=list&start=' . $start . '&limit=' . $limit, 5, \_MD_WGHOLIDAY_INVALID_PARAM);
        }
    } else {
        \redirect_header('index.php?op=list&start=' . $start . '&limit=' . $limit, 5, \_MD_WGHOLIDAY_INVALID_PARAM);
    }
    $currentStatus = (int)$eventObj->getVar('status');
    if (Constants::STATUS_OFFLINE === $currentStatus) {
        $eventObj->setVar('status', Constants::STATUS_ONLINE);
    } else {
        $eventObj->setVar('status', Constants::STATUS_OFFLINE);
    }
    // Insert Data
    if ($eventsHandler->insert($eventObj)) {
        \redirect_header('index.php?op=list&start=' . $start . '&limit=' . $limit, 2, \_MD_WGHOLIDAY_FORM_OK);
    } else {
        \redirect_header('index.php?op=list&start=' . $start . '&limit=' . $limit, 2, \_MD_WGHOLIDAY_ERROR_CHANGE_STATUS);
    }

}

require __DIR__ . '/footer.php';
