<?php

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
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        wgholiday
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 */
\defined('\XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Class Object Handler Permissions
 */
class PermissionsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
    }

    /**
     * get perms for current user to view event
     *
     * @param  int $evId
     * @return bool
     */
    public function permEventView(int $evId): bool
    {
        global $xoopsUser, $xoopsModule;

        $currentuid = 0;
        $grouppermHandler = \xoops_getHandler('groupperm');
        $moduleHandler    = \xoops_getHandler('module');
        $module           = $moduleHandler->getByDirname('wgholiday');
        $mid = $module ? $module->getVar('mid') : 0;
        $memberHandler    = \xoops_getHandler('member');
        if (isset($xoopsUser) && \is_object($xoopsUser)) {
            if ($xoopsUser->isAdmin($mid)) {
                return true;
            }
            $currentuid = $xoopsUser->uid();
        }
        if (0 === $currentuid) {
            $my_group_ids = [\XOOPS_GROUP_ANONYMOUS];
        } else {
            $my_group_ids = $memberHandler->getGroupsByUser($currentuid);
        }

        return $grouppermHandler->checkRight('wgholiday_eventview', $evId, $my_group_ids, $mid);
    }
}
