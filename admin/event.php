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
// Get all request values
$op    = Request::getCmd('op', 'list');
$evId  = Request::getInt('id');
$start = Request::getInt('start');
$limit = Request::getInt('limit', $helper->getConfig('adminpager'));
$GLOBALS['xoopsTpl']->assign('start', $start);
$GLOBALS['xoopsTpl']->assign('limit', $limit);

switch ($op) {
    case 'list':
    default:
        $useHeader = (int)$helper->getConfig('use_header');
        $useFooter = (int)$helper->getConfig('use_footer');
        $typeOnOff = (int)$helper->getConfig('type_onoff');
        $GLOBALS['xoopsTpl']->assign('use_header', $useHeader);
        $GLOBALS['xoopsTpl']->assign('use_footer', $useFooter);
        $GLOBALS['xoopsTpl']->assign('type_onoff_date', Constants::ONOFF_TYPE_DATE === $typeOnOff);
        // Define Stylesheet
        $GLOBALS['xoTheme']->addStylesheet($style, null);
        $templateMain = 'wgholiday_admin_event.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('event.php'));
        $adminObject->addItemButton(\_AM_WGHOLIDAY_ADD_EVENT, 'event.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        $eventsCount = $eventsHandler->getCountEvents();
        $eventsAll = $eventsHandler->getAllEvents($start, $limit);
        $GLOBALS['xoopsTpl']->assign('events_count', $eventsCount);
        $GLOBALS['xoopsTpl']->assign('wgholiday_url', \WGHOLIDAY_URL);
        $GLOBALS['xoopsTpl']->assign('wgholiday_upload_url', \WGHOLIDAY_UPLOAD_URL);
        $GLOBALS['xoopsTpl']->assign('wgholiday_icons_url', \WGHOLIDAY_ICONS_URL);
        $GLOBALS['xoopsTpl']->assign('token', $GLOBALS['xoopsSecurity']->getTokenHTML());
        // Table view events
        if ($eventsCount > 0) {
            foreach (\array_keys($eventsAll) as $i) {
                $event = $eventsAll[$i]->getValuesEvents(true);
                $GLOBALS['xoopsTpl']->append('events_list', $event);
                unset($event);
            }
            // Display Navigation
            if ($eventsCount > $limit) {
                require_once \XOOPS_ROOT_PATH . '/class/pagenav.php';
                $pagenav = new \XoopsPageNav($eventsCount, $limit, $start, 'start', 'op=list&limit=' . $limit);
                $GLOBALS['xoopsTpl']->assign('pagenav', $pagenav->renderNav());
            }
        } else {
            $GLOBALS['xoopsTpl']->assign('error', \_AM_WGHOLIDAY_THEREARENT_EVENTS);
        }
        break;
    case 'new':
        $templateMain = 'wgholiday_admin_event.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('event.php'));
        $adminObject->addItemButton(\_AM_WGHOLIDAY_LIST_EVENTS, 'event.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Form Create
        $eventObj = $eventsHandler->create();
        $form = $eventObj->getFormEvents();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'clone':
        $templateMain = 'wgholiday_admin_event.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('event.php'));
        $adminObject->addItemButton(\_AM_WGHOLIDAY_LIST_EVENTS, 'event.php', 'list');
        $adminObject->addItemButton(\_AM_WGHOLIDAY_ADD_EVENT, 'event.php?op=new');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Request source
        $evIdSource = Request::getInt('id_source');
        // Get Form
        $eventObjSource = $eventsHandler->get($evIdSource);
        $eventObj = $eventObjSource->xoopsClone();
        $form = $eventObj->getFormEvents();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'save':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('event.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($evId > 0) {
            $eventObj = $eventsHandler->get($evId);
        } else {
            $eventObj = $eventsHandler->create();
        }
        // Set Vars
        $uploaderErrors = '';
        $eventObj->setVar('name', Request::getString('name'));
        $eventObj->setVar('header', Request::getText('header'));
        $eventObj->setVar('header_display', Request::getInt('header_display'));
        $eventObj->setVar('body', Request::getText('body'));
        $eventObj->setVar('body_display', Request::getInt('body_display'));
        $eventObj->setVar('footer', Request::getText('footer'));
        $eventObj->setVar('footer_display', Request::getInt('footer_display'));
        // Set Var image
        require_once \XOOPS_ROOT_PATH . '/class/uploader.php';
        $filename       = $_FILES['image']['name'];
        $imgMimetype    = $_FILES['image']['type'];
        $imgNameDef     = Request::getString('name');
        $uploader = new \XoopsMediaUploader(\WGHOLIDAY_UPLOAD_IMAGE_PATH . '/',
                                                    $helper->getConfig('mimetypes_image'), 
                                                    $helper->getConfig('maxsize_image'), null, null);
        if ($uploader->fetchMedia($_POST['xoops_upload_file'][0])) {
            $extension = \preg_replace('/^.+\.([^.]+)$/sU', '', $filename);
            $imgName = \str_replace(' ', '', $imgNameDef) . '.' . $extension;
            $uploader->setPrefix($imgName);
            $uploader->fetchMedia($_POST['xoops_upload_file'][0]);
            if ($uploader->upload()) {
                $savedFilename = $uploader->getSavedFileName();
                $maxwidth  = (int)$helper->getConfig('maxwidth_image');
                $maxheight = (int)$helper->getConfig('maxheight_image');
                if ($maxwidth > 0 && $maxheight > 0) {
                    // Resize image
                    $imgHandler                = new Wgholiday\Common\Resizer();
                    $imgHandler->sourceFile    = \WGHOLIDAY_UPLOAD_IMAGE_PATH . '/' . $savedFilename;
                    $imgHandler->endFile       = \WGHOLIDAY_UPLOAD_IMAGE_PATH . '/' . $savedFilename;
                    $imgHandler->imageMimetype = $imgMimetype;
                    $imgHandler->maxWidth      = $maxwidth;
                    $imgHandler->maxHeight     = $maxheight;
                    $result                    = $imgHandler->resizeImage();
                }
                $eventObj->setVar('image', $savedFilename);
            } else {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
        } else {
            if ($filename > '') {
                $uploaderErrors .= '<br>' . $uploader->getErrors();
            }
            $eventObj->setVar('image', Request::getString('image'));
        }
        $eventObj->setVar('image_pos', Request::getInt('image_pos'));
        $eventObj->setVar('image_display', Request::getInt('image_display'));
        $dateShowFrom = Request::getString('date_showfrom');
        if ('' !== $dateShowFrom) {
            $eventsDate_showfromObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $dateShowFrom);
            $eventObj->setVar('date_showfrom', $eventsDate_showfromObj->getTimestamp());
        }
        $dateShowTo = Request::getString('date_showto');
        if ('' !== $dateShowTo) {
            $eventsDate_showtoObj = \DateTime::createFromFormat(\_SHORTDATESTRING, $dateShowTo);
            $eventObj->setVar('date_showto', $eventsDate_showtoObj->getTimestamp());
        }
        $eventObj->setVar('status', Request::getInt('status'));
        $eventsDate_createdObj = \DateTime::createFromFormat(\_SHORTDATESTRING, Request::getString('date_created'));
        $eventObj->setVar('date_created', $eventsDate_createdObj->getTimestamp());
        $eventObj->setVar('submitter', Request::getInt('submitter'));
        // Insert Data
        if ($eventsHandler->insert($eventObj)) {
            if ('' !== $uploaderErrors) {
                \redirect_header('event.php?op=edit&id=' . $evId, 5, $uploaderErrors);
            } else {
                \redirect_header('event.php?op=list&amp;start=' . $start . '&amp;limit=' . $limit, 2, \_AM_WGHOLIDAY_FORM_OK);
            }
        }
        // Get Form
        $GLOBALS['xoopsTpl']->assign('error', $eventObj->getHtmlErrors());
        $form = $eventObj->getFormEvents();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'edit':
        $templateMain = 'wgholiday_admin_event.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('event.php'));
        $adminObject->addItemButton(\_AM_WGHOLIDAY_ADD_EVENT, 'event.php?op=new');
        $adminObject->addItemButton(\_AM_WGHOLIDAY_LIST_EVENTS, 'event.php', 'list');
        $GLOBALS['xoopsTpl']->assign('buttons', $adminObject->displayButton('left'));
        // Get Form
        $eventObj = $eventsHandler->get($evId);
        $eventObj->start = $start;
        $eventObj->limit = $limit;
        $form = $eventObj->getFormEvents();
        $GLOBALS['xoopsTpl']->assign('form', $form->render());
        break;
    case 'delete':
        $templateMain = 'wgholiday_admin_event.tpl';
        $GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('event.php'));
        $eventObj = $eventsHandler->get($evId);
        $evName = $eventObj->getVar('name');
        if (isset($_REQUEST['ok']) && 1 == $_REQUEST['ok']) {
            if (!$GLOBALS['xoopsSecurity']->check()) {
                \redirect_header('event.php', 3, \implode(', ', $GLOBALS['xoopsSecurity']->getErrors()));
            }
            if ($eventsHandler->delete($eventObj)) {
                \redirect_header('event.php', 3, \_AM_WGHOLIDAY_FORM_DELETE_OK);
            } else {
                $GLOBALS['xoopsTpl']->assign('error', $eventObj->getHtmlErrors());
            }
        } else {
            $customConfirm = new Common\Confirm(
                ['ok' => 1, 'id' => $evId, 'start' => $start, 'limit' => $limit, 'op' => 'delete'],
                $_SERVER['REQUEST_URI'],
                \sprintf(\_AM_WGHOLIDAY_FORM_SURE_DELETE, $evName));
            $form = $customConfirm->getFormConfirm();
            $GLOBALS['xoopsTpl']->assign('form', $form->render());
        }
        break;
    case 'change_status':
        // Security Check
        if (!$GLOBALS['xoopsSecurity']->check()) {
            \redirect_header('event.php', 3, \implode(',', $GLOBALS['xoopsSecurity']->getErrors()));
        }
        if ($evId > 0) {
            $eventObj = $eventsHandler->get($evId);
            // check whether object is valid
            if (!\is_object($eventObj)) {
                \redirect_header('event.php?op=list&start=' . $start . '&limit=' . $limit, 5, \_AM_WGHOLIDAY_INVALID_PARAM);
            }
        } else {
            \redirect_header('event.php?op=list&start=' . $start . '&limit=' . $limit, 5, \_AM_WGHOLIDAY_INVALID_PARAM);
        }
        $currentStatus = (int)$eventObj->getVar('status');
        if (Constants::STATUS_OFFLINE === $currentStatus) {
            $eventObj->setVar('status', Constants::STATUS_ONLINE );
        } else {
            $eventObj->setVar('status', Constants::STATUS_OFFLINE );
        }
        // Insert Data
        if ($eventsHandler->insert($eventObj)) {
            \redirect_header('event.php?op=list&start=' . $start . '&limit=' . $limit, 2, \_AM_WGHOLIDAY_FORM_OK);
        } else {
            \redirect_header('event.php?op=list&start=' . $start . '&limit=' . $limit, 2, \_AM_WGHOLIDAY_ERROR_CHANGE_STATUS);
        }
        break;
}
require __DIR__ . '/footer.php';
