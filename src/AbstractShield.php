<?php

namespace Rewake\Aegis;


abstract class AbstractShield implements ShieldInterface
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function failureMessage()
    {
        // TODO: failure message & other config... should be in ShieldConfig?
        return $this->config['failure_message'] ?: "Aegis Shield Failure Encountered: " . __CLASS__;
    }
}