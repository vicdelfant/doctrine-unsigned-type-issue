<?php

namespace TestCase\Value;

class CustomId
{
    /**
     * @var int
     */
    private $value;

    /**
     * Constructor.
     *
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }
}
