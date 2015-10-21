<?php

namespace Socifi\N200;

/**
 * Abstract resource
 *
 * @package Socifi\N200
 */
class AbstractResource
{
    const ENDPOINT = '';

    /**
     * @var N200
     */
    protected $n200;

    /**
     * N200 Visitors constructor.
     * @param N200 $n200
     */
    public function __construct($n200)
    {
        $this->n200 = $n200;
    }
}
