<?php

namespace App\Lib\Status;

class Statuses
{
    public const STATUS_CREATED = "Created";
    public const STATUS_UPDATED = "Updated";
    public const STATUS_ERROR = "Error";
    public const STATUS_IN_PROGRESS = "In progress";
    public const STATUS_DONE = "Done";
    public const STATUS_SENT = "Sent";

    public const STATUS_CREATED_ID = 0;
    public const STATUS_UPDATED_ID = 1;
    public const STATUS_ERROR_ID = 2;
    public const STATUS_IN_PROGRESS_ID = 3;
    public const STATUS_DONE_ID = 4;
    public const STATUS_SENT_ID = 5;

    public const STATUSES = [
      self::STATUS_CREATED_ID => self::STATUS_CREATED,
      self::STATUS_UPDATED_ID => self::STATUS_UPDATED,
      self::STATUS_ERROR_ID => self::STATUS_ERROR,
      self::STATUS_IN_PROGRESS_ID => self::STATUS_IN_PROGRESS,
      self::STATUS_DONE_ID => self::STATUS_DONE,
      self::STATUS_SENT_ID => self::STATUS_SENT,
    ];

}
