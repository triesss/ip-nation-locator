<?php

namespace Triesss\IpNationLocator;

use ReflectionClass;

class Alpha2CountryCodeMapper implements Alpha2Code
{
    public static function getConstantByCode($code): ?string
    {
        $reflector = new ReflectionClass(__CLASS__);
        $constants = $reflector->getConstants();

        foreach ($constants as $name => $value) {
            if ($value === $code) {
                return $name;
            }
        }

        return null;
    }
}
