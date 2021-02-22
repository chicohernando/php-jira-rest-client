<?php

namespace JiraRestApi\RapidCharts;

use JiraRestApi\Configuration\ConfigurationInterface;
use JiraRestApi\GreenHopperTrait;
use Psr\Log\LoggerInterface;

class VelocityService extends \JiraRestApi\JiraClient
{
    use GreenHopperTrait;

    private $uri = '/rapid/charts/velocity';

    public function __construct(ConfigurationInterface $configuration = null, LoggerInterface $logger = null, $path = './')
    {
        parent::__construct($configuration, $logger, $path);
        $this->setupAPIUri();
    }

    public function getVelocitiesForBoard($boardId, $paramArray = [])
    {
        $paramArray['rapidViewId'] = $boardId;
        $json = $this->exec($this->uri.'/'.$this->toHttpQueryParameter($paramArray), null);
        $velocity = json_decode($json);

        return $velocity;
    }
}
