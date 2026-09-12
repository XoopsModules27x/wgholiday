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

use XoopsModules\Wgholiday;
use XoopsModules\Wgholiday\Helper;
use XoopsModules\Wgholiday\Constants;

require_once \XOOPS_ROOT_PATH . '/modules/wgholiday/include/common.php';

/**
 * Function show block
 * @param  $options
 * @return array
 */
function b_wgholiday_event_spotlight_show($options)
{
    $block         = [];
    $typeBlock     = $options[0];
    $helper        = Helper::getInstance();
    $eventsHandler = $helper->getHandler('Events');
    $typeOnOff     = (int)$helper->getConfig('type_onoff');
    \array_shift($options);

    $evId = (int)$options[0];
    if ($evId > 0) {
        $eventObj = $eventsHandler->get($evId);
        if (!$eventObj) {
            return $block;
        }
        if (
            (Constants::ONOFF_TYPE_DATE === $typeOnOff && $eventObj->getVar('date_showfrom') < time() && $eventObj->getVar('date_showto') > time())
            or
            (Constants::ONOFF_TYPE_RADIO === $typeOnOff && Constants::STATUS_ONLINE === (int)$eventObj->getVar('status'))
        ) {
            $block = $eventObj->getValuesEvents();

            // load css
            $GLOBALS['xoTheme']->addStylesheet(\WGHOLIDAY_URL . '/assets/css/modal.css', null);
            $GLOBALS['xoopsTpl']->assign('wgholiday_upload_image_url',\WGHOLIDAY_UPLOAD_IMAGE_URL);
            $GLOBALS['xoopsTpl']->assign('image_pos_top',Constants::IMAGE_POS_TOP);
            $GLOBALS['xoopsTpl']->assign('image_pos_left',Constants::IMAGE_POS_LEFT);
            $GLOBALS['xoopsTpl']->assign('image_pos_right',Constants::IMAGE_POS_RIGHT);
            $GLOBALS['xoopsTpl']->assign('image_pos_bottom',Constants::IMAGE_POS_BOTTOM);
        }
    }

    return $block;
}

/**
 * Function edit block
 * @param  $options
 * @return string
 */
function b_wgholiday_event_spotlight_edit($options)
{
    $helper = Helper::getInstance();
    $eventsHandler = $helper->getHandler('Events');
    $GLOBALS['xoopsTpl']->assign('wgholiday_upload_url', \WGHOLIDAY_UPLOAD_URL);
    $form = \_MB_WGHOLIDAY_EVENT_TO_DISPLAY . ' : ';
    $form .= "<input type='hidden' name='options[0]' value='".$options[0]."' >";
    \array_shift($options);

    $crEvents = new \CriteriaCompo();
    $crEvents->add(new \Criteria('id', 0, '!='));
    $crEvents->setSort('id');
    $crEvents->setOrder('ASC');
    $eventsAll = $eventsHandler->getAll($crEvents);
    unset($crEvents);
    $form .= "<br><select name='options[]' size='5'>";
    $form .= "<option value='0' " . (!\in_array(0, $options) && !\in_array('0', $options) ? '' : "selected='selected'") . '> - </option>';
    foreach (\array_keys($eventsAll) as $i) {
        $evId = $eventsAll[$i]->getVar('id');
        $form .= "<option value='" . $evId . "' " . (!\in_array($evId, $options) ? '' : "selected='selected'") . '>' . $eventsAll[$i]->getVar('name') . '</option>';
    }
    $form .= '</select>';

    return $form;

}
