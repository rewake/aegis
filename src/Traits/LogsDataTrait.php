<?php

// TODO: move traits to another project?
namespace Rewake\Traits;


use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

trait LogsDataTrait
{
    use LoggerTrait;

    public $logger;

    public function __call($method, $args)
    {
        if (isset($this->logger) && $this->logger instanceof LoggerInterface) {

            $this->log($method, $args);
        }
    }
}