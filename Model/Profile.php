<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\DataflowsReact\Model;

abstract class Profile extends \Alekseon\Dataflows\Model\Profile
{
    /**
     * @var
     */
    private $loop;

    /**
     *
     */
    public function execute()
    {
        $this->loop = \React\EventLoop\Factory::create();

        $data = [
            1,2,3,4,5
        ];

        $jsonData = json_encode($data);

        $this->addReactProcess('echo ' . $jsonData);

        $this->loop->run();


        $this->addInfoLog('INFO LOG');
        $this->setResult('Done');
    }

    public function addReactProcess($jsonData)
    {
        $process = new \React\ChildProcess\Process($jsonData);
        $process->start($this->loop);
        $process->stdout->on('data', function ($jsonData) {
            $data = json_decode($jsonData);
            foreach($data as $lineData) {
                $this->processData($lineData);
            }
        });
    }
}