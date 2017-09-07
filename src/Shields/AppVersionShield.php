<?php

namespace Rewake\Aegis\Shields;


use Rewake\Aegis\AbstractShield;
use Rewake\Aegis\Exceptions\AegisShieldException;

class AppVersionShield extends AbstractShield
{
    public function block()
    {
        // TODO: Implement block() method.
        throw new AegisShieldException("Blah");
    }
}