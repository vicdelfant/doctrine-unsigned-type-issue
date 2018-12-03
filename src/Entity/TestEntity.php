<?php

namespace TestCase\Entity;

use Doctrine\ORM\Mapping as ORM;
use TestCase\Value\CustomId;

/**
 * @ORM\Entity()
 */
class TestEntity
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="custom_id")
     *
     * @var CustomId
     */
    private $id;
}
