<?php

namespace BasicApp\Block\Events;

class BlockEvent extends \BasicApp\Core\Event
{

    public $uid;

    public $content;

    public $params = [];

}