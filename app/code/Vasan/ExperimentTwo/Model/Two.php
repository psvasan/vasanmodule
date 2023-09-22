<?php
/**
 * Two
 *
 * @copyright Copyright © 2023 Kemana. All rights reserved.
 * @author    psureshvasan@kemana.com
 */

namespace Vasan\ExperimentTwo\Model;


class Two
{

    private $name;

    private $description;

    private $status;

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($descritpion)
    {
        $this->description = $descritpion;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
