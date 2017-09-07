<?php

namespace Rewake\Aegis;


class ShieldFactory
{
    public static function make(AbstractShield $shield, $config)
    {
        $shield_class = __NAMESPACE__ . "\\Shields\\{$shield}";
        return new $shield_class($config);
    }
}