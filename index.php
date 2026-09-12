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

require __DIR__ . '/header.php';
$GLOBALS['xoopsOption']['template_main'] = 'wgholiday_index.tpl';
require_once \XOOPS_ROOT_PATH . '/header.php';
// Define Stylesheet
$GLOBALS['xoTheme']->addStylesheet($style, null);
// Keywords
$keywords = [];
// Breadcrumbs
$xoBreadcrumbs[] = ['title' => \_MD_WGHOLIDAY_INDEX];

$useHeader = (int)$helper->getConfig('use_header');
$useFooter = (int)$helper->getConfig('use_footer');
$typeOnOff = (int)$helper->getConfig('type_onoff');
$GLOBALS['xoopsTpl']->assign('use_header', $useHeader);
$GLOBALS['xoopsTpl']->assign('use_footer', $useFooter);
$GLOBALS['xoopsTpl']->assign('type_onoff_date', Constants::ONOFF_TYPE_DATE === $typeOnOff);
$GLOBALS['xoopsTpl']->assign('wgholiday_icons_url', \WGHOLIDAY_ICONS_URL);

// Tables
$eventsCount = $eventsHandler->getCountEvents();
$GLOBALS['xoopsTpl']->assign('eventsCount', $eventsCount);
if ($eventsCount > 0) {

    $start = Request::getInt('start');
    $limit = Request::getInt('limit', $helper->getConfig('userpager'));
    $eventsAll = $eventsHandler->getAllEvents($start, $limit);
    // Get All Events
    $events_list = [];
    foreach (\array_keys($eventsAll) as $i) {
        $events_list[] = $eventsAll[$i]->getValuesEvents(true);
        $keywords[] = $eventsAll[$i]->getVar('ev_name');
    }
    $GLOBALS['xoopsTpl']->assign('events_list', $events_list);
    unset($events);
    // Display Navigation
    if ($eventsCount > $limit) {
        require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
        $pagenav = new \XoopsPageNav($eventsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
        $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
    }
    $GLOBALS['xoopsTpl']->assign('token_wgholiday', $GLOBALS['xoopsSecurity']->getTokenHTML());
}

// Meta keywords
wgholidayMetaKeywords($helper->getConfig('keywords') . ', ' . \implode(',', $keywords));
unset($keywords);
require __DIR__ . '/footer.php';
