<?php

namespace Tests\Cp\Provider;

use Cp\DomainObject\Configuration;
use Cp\DomainObject\Plan;
use Cp\Manager\PlanManager;
use Cp\Provider\PlanProvider;

/**
 * Class PlanProviderTest
 */
class PlanProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test if return a Plan by configuration
     */
    public function testGetPlanByConfiguration()
    {
        $planMock = $this->getMockBuilder(Plan::class)->disableOriginalConstructor()->getMock();

        $planManagerMock = $this->getMockBuilder(PlanManager::class)->disableOriginalConstructor()->getMock();
        $planManagerMock
            ->expects($this->once())
            ->method('findByType')
            ->willReturn($planMock)
        ;

        $configurationMock = $this->getMockBuilder(Configuration::class)->disableOriginalConstructor()->getMock();

        $planProvider = new PlanProvider($planManagerMock);

        $actual = $planProvider->getPlanByConfiguration($configurationMock);

        $this->assertInstanceOf(Plan::class, $actual);
    }
}
