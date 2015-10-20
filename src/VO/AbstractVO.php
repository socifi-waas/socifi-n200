<?php

namespace Socifi\N200\VO;

abstract class AbstractVO
{

    /**
     * N200AbstractVO constructor.
     */
    public function __construct($toHydrate = null)
    {
        if (!$toHydrate) {
            return;
        }

        foreach ($toHydrate as $key => $value) {
            if ($key === '@attributes') {
                continue;
            }

            $methodName = 'set' . ucfirst($this->toCamelCase($key));

            if (method_exists($this, $methodName)) {
                call_user_func([$this, $methodName], $value);
            }

        }
    }

    private function toCamelCase($key)
    {
        $key = explode('-', $key);

        if (!is_array($key)) {
            return $key;
        }

        $keyCount = count($key);

        for ($i = 1; $i < $keyCount; $i ++) {
            $key[$i] = ucfirst($key[$i]);
        }

        return implode('', $key);
    }
}
