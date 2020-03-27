<?php

namespace Modules\Ipaperwork\Entities;

/**
 * Class Status
 * @package Modules\Ievent\Entities
 */
class StatusUserPaperwork
{
    const PENDING = 0;
    const APPROVED = 1;
    const DENIED = 2;
   
    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::PENDING => trans('ipaperwork::userpaperworks.status.pending'),
            self::APPROVED => trans('ipaperwork::userpaperworks.status.approved'),
            self::DENIED => trans('ipaperwork::userpaperworks.status.denied'),
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->statuses;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->statuses[$statusId])) {
            return $this->statuses[$statusId];
        }

        return $this->statuses[self::PENDING];
    }
}
