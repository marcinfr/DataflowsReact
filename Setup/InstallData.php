<?php
/**
 *  * Copyright © Alekseon sp. z o.o.
 */
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\DataflowsReact\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Alekseon\Dataflows\Model\Schedule;

class InstallData implements InstallDataInterface
{
    private $dataflowSetupFactory;

    public function __construct(
        \Alekseon\Dataflows\Setup\DataflowSetupFactory $dataflowSetupFactory)
    {
        $this->dataflowSetupFactory = $dataflowSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataflowsSetup = $this->dataflowSetupFactory->create(['setup' => $setup]);
        $dataflowsSetup->createSchedule(
            'example_react_schedule',
            [
                'name' => 'Example React Schedule',
                'status' => Schedule::STATUS_DISABLED,
                'profile_class' => 'Alekseon\DataflowsReact\Model\Profile\Example',
                'schedule' => '0 0 * * *',
                'comment' => 'React PHP first example.',
                'semaphores' => [],
                'parameters' => [],
            ],
            true
        );
    }
}
