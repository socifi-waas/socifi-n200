<?php

namespace Socifi\N200\VO;

abstract class AbstractVO
{
    /**
     * Abstract VO
     *
     * Enables automatic hydration from optional array passed as parameter.
     *
     * @param array|null $toHydrate Optional data to automatically hydrate to VO.
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

    /**
     * Convert string-value to camelCase
     *
     * @param string $string Dash separated string
     * @return array|string camelCased string
     */
    private function toCamelCase($string)
    {
        $elements = explode('-', $string);

        if (!is_array($elements)) {
            return $string;
        }

        $elementCount = count($elements);

        for ($i = 1; $i < $elementCount; $i ++) {
            $elements[$i] = ucfirst($elements[$i]);
        }

        return implode('', $elements);
    }
}
