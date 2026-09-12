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


/**
 * Class Object Handler Events
 */
class EventsHandler extends \XoopsPersistableObjectHandler
{
    /**
     * Constructor
     *
     * @param \XoopsDatabase $db
     */
    public function __construct(\XoopsDatabase $db)
    {
        parent::__construct($db, 'wgholiday_events', Events::class, 'id', 'name');
    }

    /**
     * @param bool $isNew
     *
     * @return object
     */
    public function create($isNew = true)
    {
        return parent::create($isNew);
    }

    /**
     * retrieve a field
     *
     * @param int $id field id
     * @param null fields
     * @return \XoopsObject|null reference to the {@link Get} object
     */
    public function get($id = null, $fields = null)
    {
        return parent::get($id, $fields);
    }

    /**
     * get inserted id
     *
     * @param null
     * @return int reference to the {@link Get} object
     */
    public function getInsertId()
    {
        return $this->db->getInsertId();
    }

    /**
     * Get Count Events in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    public function getCountEvents($start = 0, $limit = 0, $sort = 'id ASC, name', $order = 'ASC')
    {
        $crCountEvents = new \CriteriaCompo();
        $crCountEvents = $this->getEventsCriteria($crCountEvents, $start, $limit, $sort, $order);
        return $this->getCount($crCountEvents);
    }

    /**
     * Get All Events in the database
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function getAllEvents($start = 0, $limit = 0, $sort = 'id ASC, name', $order = 'ASC')
    {
        $crAllEvents = new \CriteriaCompo();
        $crAllEvents = $this->getEventsCriteria($crAllEvents, $start, $limit, $sort, $order);
        return $this->getAll($crAllEvents);
    }

    /**
     * Get Criteria Events
     * @param        $crEvents
     * @param int    $start
     * @param int    $limit
     * @param string $sort
     * @param string $order
     * @return int
     */
    private function getEventsCriteria($crEvents, $start, $limit, $sort, $order)
    {
        $crEvents->setStart($start);
        $crEvents->setLimit($limit);
        $crEvents->setSort($sort);
        $crEvents->setOrder($order);
        return $crEvents;
    }
}
