<?php

namespace Fixtures;

class UserFixtures
{
    /**
     * заимствуется метод get() из трейта
     */
    use FixturesTrait;

    private $fixtures;

    public function __construct()
    {
        $this->fixtures = [
            "user" => [
                "username" => "one",
                "password" => "111111",
            ],
            "admin" => [
                "username" => "admin",
                "password" => "admin",
            ],
            "two" => [
                "username" => "two",
                "password" => "111111",
            ],
        ];
    }
}