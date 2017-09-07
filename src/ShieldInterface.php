<?php

namespace Rewake\Aegis;


use Rewake\Aegis\Exceptions\AegisShieldException;

interface ShieldInterface
{
    /**
     * @return void
     * @throws AegisShieldException
     */
    public function block();

    /**
     * @return string
     */
    public function failureMessage();
}