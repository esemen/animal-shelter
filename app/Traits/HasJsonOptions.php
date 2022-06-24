<?php

namespace App\Traits;

trait HasJsonOptions
{
    public function jsonKey(string $key)
    {
        $key = collect(explode('.', $key));

        $field = $key->shift();

        $attributeValue = $this->$field;

        if ($key->count()) {
            return collect($attributeValue)->get($key->first());
        } else {
            return $attributeValue;
        }
    }

    public function jsonValue(string $key) {
        $optKey = $this->jsonKey($key);

        $optArray = config($this->jsonOptions . '.' . $key);

        return $optArray[$optKey] ?? $optKey;
    }
}
