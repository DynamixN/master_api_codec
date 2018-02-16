<?php

namespace Fixtures;
/**
 * трейт реализация
 */
trait FixturesTrait
{
    public function get($name): array
    {
        if (!isset($this->fixtures[$name])) {
            throw new \RuntimeException("$name not found in fixtures");
        }
        return $this->fixtures[$name];
    }
}