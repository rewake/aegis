<?php

namespace Rewake\Aegis;


use Psr\Log\LoggerInterface;
use Rewake\Aegis\Exceptions\AegisShieldException;
use Rewake\Traits\PopulatePropertiesTrait;

class Aegis
{
    use PopulatePropertiesTrait;

    /**
     * @var AegisConfig
     */
    protected $config;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var \stdClass
     */
    protected $shields;

    public function __construct($config, LoggerInterface $logger = null)
    {
        // TODO: load/store config
        $this->config = new AegisConfig($config);

        // Store logger DI if provided
        if (!is_null($logger)) {

            $this->logger = $logger;
        }
    }

    public function enforce(AbstractShield $shield)
    {
        try {

            // Enforce given shield
            $this->getShield($shield)->block();

            // Return self
            return $this;

        } catch (AegisShieldException $e) {

            // See if we should throw exception on failure
            if ($this->config->throws_exceptions) {

                // Throw exception
                throw $e;

            // See if we have an exception handler closure
            // TODO: should use a class eventually, but we're not using currently, and it should work fine "for now"
            } else if ($this->config->exception_handler instanceof \Closure) {

                // Pass exception to exception handler
                $this->config->exception_handler($e);
            }
        }
    }

    public function enforceAll()
    {
        // Loop stored shields
        foreach ($this->shields as $shield) {

            // Enforce current shield
            $this->enforce($shield);
        }

        // Return self
        return $this;
    }

    /**
     * @param AbstractShield $shield
     * @return AbstractShield
     */
    protected function getShield(AbstractShield $shield)
    {
        // Make shield if not exists
        if (!isset($this->shields->{$shield})) {

            $this->shields->{$shield} = ShieldFactory::make($shield, $this->config[$shield]);
        }

        // Return shield
        return $this->shields->{$shield};
    }
}