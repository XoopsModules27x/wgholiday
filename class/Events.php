<?php

declare(strict_types=1);


namespace XoopsModules\Wgholiday;

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

\defined('XOOPS_ROOT_PATH') || die('Restricted access');

/**
 * Class Object Events
 */
class Events extends \XoopsObject
{
    /**
     * @var int
     */
    public $start = 0;

    /**
     * @var int
     */
    public $limit = 0;

    /**
     * Constructor
     *
     * @param null
     */
    public function __construct()
    {
        $this->initVar('id', \XOBJ_DTYPE_INT);
        $this->initVar('name', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('header', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('header_display', \XOBJ_DTYPE_INT);
        $this->initVar('body', \XOBJ_DTYPE_OTHER);
        $this->initVar('body_display', \XOBJ_DTYPE_INT);
        $this->initVar('footer', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('footer_display', \XOBJ_DTYPE_INT);
        $this->initVar('image', \XOBJ_DTYPE_TXTBOX);
        $this->initVar('image_pos', \XOBJ_DTYPE_INT);
        $this->initVar('image_display', \XOBJ_DTYPE_INT);
        $this->initVar('date_showfrom', \XOBJ_DTYPE_INT);
        $this->initVar('date_showto', \XOBJ_DTYPE_INT);
        $this->initVar('status', \XOBJ_DTYPE_INT);
        $this->initVar('date_created', \XOBJ_DTYPE_INT);
        $this->initVar('submitter', \XOBJ_DTYPE_INT);
    }

    /**
     * @static function &getInstance
     *
     * @param null
     */
    public static function getInstance()
    {
        static $instance = false;
        if (!$instance) {
            $instance = new self();
        }
    }

    /**
     * The new inserted $Id
     * @return inserted id
     */
    public function getNewInsertedIdEvents()
    {
        $newInsertedId = $GLOBALS['xoopsDB']->getInsertId();
        return $newInsertedId;
    }

    /**
     * @public function getForm
     * @param bool $action
     * @return \XoopsThemeForm
     */
    public function getFormEvents($action = false)
    {
        //$isAdmin = \is_object($GLOBALS['xoopsUser']) && $GLOBALS['xoopsUser']->isAdmin($GLOBALS['xoopsModule']->mid());
        $helper  = \XoopsModules\Wgholiday\Helper::getInstance();
        $editor    = $helper->getConfig('editor');
        $useHeader = (bool)$helper->getConfig('use_header');
        $useFooter = (bool)$helper->getConfig('use_footer');
        $typeOnOff = (int)$helper->getConfig('type_onoff');

        if (!$action) {
            $action = $_SERVER['REQUEST_URI'];
        }

        // Title
        $title = $this->isNew() ? \_AM_WGHOLIDAY_EVENT_ADD : \_AM_WGHOLIDAY_EVENT_EDIT;
        // Get Theme Form
        \xoops_load('XoopsFormLoader');
        $form = new \XoopsThemeForm($title, 'form', $action, 'post', true);
        $form->setExtra('enctype="multipart/form-data"');
        // Form Text evName
        $form->addElement(new \XoopsFormText(\_AM_WGHOLIDAY_EVENT_NAME, 'name', 50, 255, $this->getVar('name')), true);

        if ($useHeader) {
            // Form Text evHeader
            $editorConfigs = [];
            $headerTray = new \XoopsFormElementTray(\_AM_WGHOLIDAY_EVENT_HEADER, '<br>');
            $editorConfigs['name'] = 'header';
            $editorConfigs['value'] = $this->getVar('header', 'e');
            $editorConfigs['rows'] = 5;
            $editorConfigs['cols'] = 40;
            $editorConfigs['width'] = '100%';
            $editorConfigs['height'] = '400px';
            $editorConfigs['editor'] = $editor;
            $headerTray->addElement(new \XoopsFormEditor('', 'header', $editorConfigs));
            // Form Radio headerDisplay
            $headerDisplay = $this->isNew() ? Constants::DISPLAY_BOTH : $this->getVar('header_display');
            $headerDisplaySelect = new \XoopsFormRadio(\_AM_WGHOLIDAY_EVENT_DISPLAY, 'header_display', $headerDisplay);
            $headerDisplaySelect->addOption(Constants::DISPLAY_NONE, \_AM_WGHOLIDAY_EVENT_DISPLAY_NONE);
            $headerDisplaySelect->addOption(Constants::DISPLAY_BOTH, \_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH);
            $headerDisplaySelect->addOption(Constants::DISPLAY_ONLYBLOCK, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK);
            $headerDisplaySelect->addOption(Constants::DISPLAY_ONLYMODAL, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL);
            $headerTray->addElement($headerDisplaySelect);
            $form->addElement($headerTray);
        } else {
            $form->addElement(new \XoopsFormHidden('header', ''));
            $form->addElement(new \XoopsFormHidden('header_display', Constants::DISPLAY_BOTH));
        }


        // Form Editor DhtmlTextArea evBody
        $editorConfigs['name'] = 'body';
        $editorConfigs['value'] = $this->getVar('body', 'e');
        $editorConfigs['rows'] = 5;
        $editorConfigs['cols'] = 40;
        $editorConfigs['width'] = '100%';
        $editorConfigs['height'] = '400px';
        $editorConfigs['editor'] = $editor;
        $form->addElement(new \XoopsFormEditor(\_AM_WGHOLIDAY_EVENT_BODY, 'body', $editorConfigs), true);

        // Form Image evImage
        // Form Image evImage: Select Uploaded Image
        $getEvImage = $this->getVar('image');
        $evImage = $getEvImage ?: 'blank.gif';
        $imageDirectory = '/uploads/wgholiday/images';
        $imageTray = new \XoopsFormElementTray(\_AM_WGHOLIDAY_EVENT_IMAGE, '<br>');
        $imageSelect = new \XoopsFormSelect(\sprintf(\_AM_WGHOLIDAY_EVENT_IMAGE_UPLOADS, ".{$imageDirectory}/"), 'image', $evImage, 5);
        $imageArray = \XoopsLists::getImgListAsArray( \XOOPS_ROOT_PATH . $imageDirectory );
        foreach ($imageArray as $image1) {
            $imageSelect->addOption(($image1), $image1);
        }
        $imageSelect->setExtra("onchange='showImgSelected(\"imglabel_image\", \"image\", \"" . $imageDirectory . '", "", "' . \XOOPS_URL . "\")'");
        $imageTray->addElement($imageSelect, false);
        $imageTray->addElement(new \XoopsFormLabel('', "<br><img src='" . \XOOPS_URL . '/' . $imageDirectory . '/' . $evImage . "' id='imglabel_image' alt='' style='max-width:100px' >"));
        // Form Image evImage: Upload new image
        $maxsize = $helper->getConfig('maxsize_image');
        $imageTray->addElement(new \XoopsFormFile('<br>' . \_AM_WGHOLIDAY_FORM_UPLOAD_NEW, 'image', $maxsize));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGHOLIDAY_FORM_UPLOAD_SIZE, ($maxsize / 1048576) . ' '  . \_AM_WGHOLIDAY_FORM_UPLOAD_SIZE_MB));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGHOLIDAY_FORM_UPLOAD_IMG_WIDTH, $helper->getConfig('maxwidth_image') . ' px'));
        $imageTray->addElement(new \XoopsFormLabel(\_AM_WGHOLIDAY_FORM_UPLOAD_IMG_HEIGHT, $helper->getConfig('maxheight_image') . ' px'));
        // Form Radio imagePos
        $imagePos = $this->isNew() ? Constants::IMAGE_POS_TOP : $this->getVar('image_pos');
        $imagePosSelect = new \XoopsFormRadio('<br>' . \_AM_WGHOLIDAY_EVENT_IMAGEPOS, 'image_pos', $imagePos);
        $imagePosSelect->addOption(Constants::IMAGE_POS_TOP, \_AM_WGHOLIDAY_EVENT_IMAGEPOS_TOP);
        $imagePosSelect->addOption(Constants::IMAGE_POS_LEFT, \_AM_WGHOLIDAY_EVENT_IMAGEPOS_LEFT);
        $imagePosSelect->addOption(Constants::IMAGE_POS_RIGHT, \_AM_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT);
        $imagePosSelect->addOption(Constants::IMAGE_POS_BOTTOM, \_AM_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM);
        $imageTray->addElement($imagePosSelect);
        // Image display options
        $imageDisplay = $this->isNew() ? Constants::DISPLAY_BOTH : $this->getVar('image_display');
        $imageDisplaySelect = new \XoopsFormRadio(\_AM_WGHOLIDAY_EVENT_DISPLAY, 'image_display',$imageDisplay);
        $imageDisplaySelect->addOption(Constants::DISPLAY_NONE, \_AM_WGHOLIDAY_EVENT_DISPLAY_NONE);
        $imageDisplaySelect->addOption(Constants::DISPLAY_BOTH, \_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH);
        $imageDisplaySelect->addOption(Constants::DISPLAY_ONLYBLOCK, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK);
        $imageDisplaySelect->addOption(Constants::DISPLAY_ONLYMODAL, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL);
        $imageTray->addElement($imageDisplaySelect);

        $form->addElement($imageTray);

        // Form Text evFooter
        if ($useFooter) {
            $footerTray = new \XoopsFormElementTray(\_AM_WGHOLIDAY_EVENT_FOOTER, '<br>');
            $editorConfigs['name'] = 'footer';
            $editorConfigs['value'] = $this->getVar('footer', 'e');
            $editorConfigs['rows'] = 5;
            $editorConfigs['cols'] = 40;
            $editorConfigs['width'] = '100%';
            $editorConfigs['height'] = '400px';
            $editorConfigs['editor'] = $editor;
            $footerTray->addElement(new \XoopsFormEditor('', 'footer', $editorConfigs));
            // Form Radio footerDisplay
            $footerDisplay = $this->isNew() ? Constants::DISPLAY_BOTH : $this->getVar('footer_display');
            $footerDisplaySelect = new \XoopsFormRadio(\_AM_WGHOLIDAY_EVENT_DISPLAY, 'footer_display', $footerDisplay);
            $footerDisplaySelect->addOption(Constants::DISPLAY_NONE, \_AM_WGHOLIDAY_EVENT_DISPLAY_NONE);
            $footerDisplaySelect->addOption(Constants::DISPLAY_BOTH, \_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH);
            $footerDisplaySelect->addOption(Constants::DISPLAY_ONLYBLOCK, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK);
            $footerDisplaySelect->addOption(Constants::DISPLAY_ONLYMODAL, \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL);
            $footerTray->addElement($footerDisplaySelect);
            $form->addElement($footerTray);
        } else {
            $form->addElement(new \XoopsFormHidden('footer', ''));
            $form->addElement(new \XoopsFormHidden('footer_display', Constants::DISPLAY_BOTH));
        }

        if (Constants::ONOFF_TYPE_DATE === $typeOnOff) {
            // Form Text Date Select evDate_showfrom
            $evDate_showfrom = $this->isNew() ? \time() : $this->getVar('date_showfrom');
            $form->addElement(new \XoopsFormTextDateSelect(\_AM_WGHOLIDAY_EVENT_DATE_SHOWFROM, 'date_showfrom', '', $evDate_showfrom));
            // Form Text Date Select evDate_showto
            $evDate_showto = $this->isNew() ? \strtotime('+1 day') : $this->getVar('date_showto');
            $form->addElement(new \XoopsFormTextDateSelect(\_AM_WGHOLIDAY_EVENT_DATE_SHOWTO, 'date_showto', '', $evDate_showto));
            // Form Radio on-/offline evStatus
            $form->addElement(new \XoopsFormHidden('status', Constants::STATUS_OFFLINE));
        } else {
            // Form Text Date Select evDate_showfrom/evDate_showto
            $form->addElement(new \XoopsFormHidden('date_showfrom', ''));
            $form->addElement(new \XoopsFormHidden('date_showto', ''));
            // Form Radio on-/offline evStatus
            $evStatus = $this->isNew() ? Constants::STATUS_OFFLINE : $this->getVar('status');
            $evStatusSelect = new \XoopsFormRadio(\_AM_WGHOLIDAY_EVENT_STATUS, 'status', $evStatus);
            $evStatusSelect->addOption(Constants::STATUS_OFFLINE, \_AM_WGHOLIDAY_EVENT_STATUS_OFFLINE);
            $evStatusSelect->addOption(Constants::STATUS_ONLINE, \_AM_WGHOLIDAY_EVENT_STATUS_ONLINE);
            $form->addElement($evStatusSelect);
        }

        // Form Text Date Select evDate_created
        $evDate_created = $this->isNew() ? \time() : $this->getVar('date_created');
        $form->addElement(new \XoopsFormTextDateSelect(\_AM_WGHOLIDAY_EVENT_DATE_CREATED, 'date_created', '', $evDate_created));
        // Form Select User evSubmitter
        $uidCurrent = \is_object($GLOBALS['xoopsUser']) ? $GLOBALS['xoopsUser']->uid() : 0;
        $evSubmitter = $this->isNew() ? $uidCurrent : $this->getVar('submitter');
        $form->addElement(new \XoopsFormSelectUser(\_AM_WGHOLIDAY_EVENT_SUBMITTER, 'submitter', false, $evSubmitter));
        // To Save
        $form->addElement(new \XoopsFormHidden('op', 'save'));
        $form->addElement(new \XoopsFormHidden('start', $this->start));
        $form->addElement(new \XoopsFormHidden('limit', $this->limit));
        $form->addElement(new \XoopsFormButtonTray('', \_SUBMIT, 'submit', '', false));
        return $form;
    }

    /**
     * Get Values
     * @param bool $isAdmin
     * @return array
     */
    public function getValuesEvents($isAdmin = false)
    {
        $helper  = \XoopsModules\Wgholiday\Helper::getInstance();
        $utility = new \XoopsModules\Wgholiday\Utility();
        $ret = $this->getValues();
        $editorMaxchar = $helper->getConfig('editor_maxchar');
        $useHeader     = (bool)$helper->getConfig('use_header');
        $useFooter     = (bool)$helper->getConfig('use_footer');
        $typeOnOff     = (int)$helper->getConfig('type_onoff');

        // get header text
        $ret['header_text'] = '';
        if ($useHeader) {
            $ret['header_text'] = $this->getVar('header', 'n');
            $headerDisplay = (int)$this->getVar('header_display');
            $textModal = '';
            $textBlock = '';
            if (Constants::DISPLAY_BOTH === $headerDisplay || Constants::DISPLAY_ONLYMODAL === $headerDisplay) {
                $textModal = $ret['header_text'];
            }
            if (Constants::DISPLAY_BOTH === $headerDisplay || Constants::DISPLAY_ONLYBLOCK === $headerDisplay) {
                $textBlock = $ret['header_text'];
            }
            $ret['header_modal'] = $textModal;
            $ret['header_block'] = $textBlock;
        }

        // get body
        $ret['body_text'] = $this->getVar('body', 'n');

        $imageDisplay = (int)$this->getVar('image_display');
        $textModal = '';
        $textBlock = '';
        if (Constants::DISPLAY_BOTH === $imageDisplay || Constants::DISPLAY_ONLYMODAL === $imageDisplay) {
            $textModal = $ret['image'];
        }
        if (Constants::DISPLAY_BOTH === $imageDisplay || Constants::DISPLAY_ONLYBLOCK === $imageDisplay) {
            $textBlock = $ret['image'];
        }
        $ret['image_modal'] = $textModal;
        $ret['image_block'] = $textBlock;

        $imagePos = (int)$this->getVar('image_pos');
        $textPos = '';
        // get footer text
        $ret['footer_text'] = '';
        if ($useFooter) {
            $ret['footer_text'] = $this->getVar('footer', 'n');
            $footerDisplay = (int)$this->getVar('footer_display');
            $textModal = '';
            $textBlock = '';
            if (Constants::DISPLAY_BOTH === $footerDisplay || Constants::DISPLAY_ONLYMODAL === $footerDisplay) {
                $textModal = $ret['footer_text'];
            }
            if (Constants::DISPLAY_BOTH === $footerDisplay || Constants::DISPLAY_ONLYBLOCK === $footerDisplay) {
                $textBlock = $ret['footer_text'];
            }
            $ret['footer_modal'] = $textModal;
            $ret['footer_block'] = $textBlock;
        }

        // values only for admin area
        if ($isAdmin) {
            $ret['header_short']        = $utility::truncateHtml($ret['header_text'], $editorMaxchar);
            $ret['header_display_text'] = $this->getDisplayText($headerDisplay);
            $ret['body_short']          = $utility::truncateHtml($ret['body_text'], $editorMaxchar);
            $ret['image_pos_text']      = $this->getImagePosText((int)$ret['image_pos']);
            $ret['image_display_text']  = $this->getDisplayText($imageDisplay);
            $ret['footer_short']        = $utility::truncateHtml($ret['footer_text'], $editorMaxchar);
            $ret['footer_display_text'] = $this->getDisplayText($footerDisplay);
            if (Constants::ONOFF_TYPE_DATE === $typeOnOff) {
                $ret['date_showfrom_text']  = \formatTimestamp($this->getVar('date_showfrom'), 's');
                $ret['date_showto_text']    = \formatTimestamp($this->getVar('date_showto'), 's');
                if ($this->getVar('date_showto') < time()) {
                    $ret['date_fromto_img'] = '0.png';
                    $ret['date_fromto_status'] = \_AM_WGHOLIDAY_EVENT_DATE_CLOSED;
                } else {
                    if ($this->getVar('date_showfrom') > time()) {
                        $ret['date_fromto_img'] = 'waiting.png';
                        $ret['date_fromto_status'] = \_AM_WGHOLIDAY_EVENT_DATE_WAIT;
                    } else {
                        $ret['date_fromto_img'] = '1.png';
                        $ret['date_fromto_status'] = \_AM_WGHOLIDAY_EVENT_DATE_RUNNING;
                    }
                }
            } else {
                $ret['status_text']         = $this->getStatusText((int)$this->getVar('status'));
            }
            $ret['date_created_text']   = \formatTimestamp($this->getVar('date_created'), 's');
            $ret['submitter_text']      = \XoopsUser::getUnameFromId($this->getVar('submitter'));
        }

        return $ret;
    }

    /**
     * Returns string with display type
     * @param int $imagePos
     * @return string
     */
    public function getImagePosText($imagePos)
    {
        $lang = [];
        if (defined('_AM_WGHOLIDAY_EVENT_IMAGEPOS_TOP')) {
            $lang[Constants::IMAGE_POS_TOP] = \_AM_WGHOLIDAY_EVENT_IMAGEPOS_TOP;
            $lang[Constants::IMAGE_POS_LEFT] = \_AM_WGHOLIDAY_EVENT_IMAGEPOS_LEFT;
            $lang[Constants::IMAGE_POS_RIGHT] = \_AM_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT;
            $lang[Constants::IMAGE_POS_BOTTOM] = \_AM_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM;
        } else {
            $lang[Constants::IMAGE_POS_TOP] = \_MD_WGHOLIDAY_EVENT_IMAGEPOS_TOP;
            $lang[Constants::IMAGE_POS_LEFT] = \_MD_WGHOLIDAY_EVENT_IMAGEPOS_LEFT;
            $lang[Constants::IMAGE_POS_RIGHT] = \_MD_WGHOLIDAY_EVENT_IMAGEPOS_RIGHT;
            $lang[Constants::IMAGE_POS_BOTTOM] = \_MD_WGHOLIDAY_EVENT_IMAGEPOS_BOTTOM;
        }
        return $lang[$imagePos];
    }

    /**
     * Returns string with display type
     * @param int $valueDisplay
     * @return string
     */
    public function getDisplayText($valueDisplay)
    {
        $lang = [];
        if (defined('_AM_WGHOLIDAY_EVENT_DISPLAY_NONE')) {
            $lang[Constants::DISPLAY_NONE] = \_AM_WGHOLIDAY_EVENT_DISPLAY_NONE;
            $lang[Constants::DISPLAY_BOTH] = \_AM_WGHOLIDAY_EVENT_DISPLAY_BOTH;
            $lang[Constants::DISPLAY_ONLYBLOCK] = \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK;
            $lang[Constants::DISPLAY_ONLYMODAL] = \_AM_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL;
        } else {
            $lang[Constants::DISPLAY_NONE] = \_MD_WGHOLIDAY_EVENT_DISPLAY_NONE;
            $lang[Constants::DISPLAY_BOTH] = \_MD_WGHOLIDAY_EVENT_DISPLAY_BOTH;
            $lang[Constants::DISPLAY_ONLYBLOCK] = \_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYBLOCK;
            $lang[Constants::DISPLAY_ONLYMODAL] = \_MD_WGHOLIDAY_EVENT_DISPLAY_ONLYMODAL;
        }
        return $lang[$valueDisplay];
    }

    /**
     * Returns string with status text
     * @param int $status
     * @return string
     */
    public function getStatusText($status)
    {
        $lang = [];
        if (defined('_AM_WGHOLIDAY_EVENT_STATUS_ONLINE')) {
            $lang[Constants::STATUS_ONLINE] = \_AM_WGHOLIDAY_EVENT_STATUS_ONLINE;
            $lang[Constants::STATUS_OFFLINE] = \_AM_WGHOLIDAY_EVENT_STATUS_OFFLINE;
        } else {
            $lang[Constants::STATUS_ONLINE] = \_MD_WGHOLIDAY_EVENT_STATUS_ONLINE;
            $lang[Constants::STATUS_OFFLINE] = \_MD_WGHOLIDAY_EVENT_STATUS_OFFLINE;
        }
        return $lang[$status];
    }
}
