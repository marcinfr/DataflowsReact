<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\DataflowsReact\Model\Profile;

class Example extends \Alekseon\DataflowsReact\Model\Profile implements \Alekseon\Dataflows\Model\ProfileInterface
{




    public function processData($data)
    {
        var_dump($data);
    }
}
