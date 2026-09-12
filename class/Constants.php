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

/**
 * Interface  Constants
 */
interface Constants
{
    // Constants for tables
    public const TABLE_EVENTS = 0;

    // Constants for status on-/offline
    public const STATUS_OFFLINE = 0;
    public const STATUS_ONLINE  = 1;

    // Constants for displaying
    public const DISPLAY_NONE      = 0;
    public const DISPLAY_BOTH      = 1;
    public const DISPLAY_ONLYBLOCK = 2;
    public const DISPLAY_ONLYMODAL = 3;

    // Constants for image position
    public const IMAGE_POS_TOP    = 0;
    public const IMAGE_POS_LEFT   = 1;
    public const IMAGE_POS_RIGHT  = 2;
    public const IMAGE_POS_BOTTOM = 3;

    // Constants for type setting on-/offline
    public const ONOFF_TYPE_DATE  = 1;
    public const ONOFF_TYPE_RADIO = 2;

}
