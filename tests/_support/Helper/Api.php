<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module
{
    const ONE_MONTH = 2678400;
    const ONE_DAY = 86400;

    public function getCustomParam(): string
    {
        return $this->_getConfig("domain");
    }
    public static function getActualDate(int $period = 0)
    {
        return time() + $period;
    }
}

