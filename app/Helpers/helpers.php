<?php

use Illuminate\Support\Carbon;

if (! function_exists('formatDate')) {
    function formatDate($date, string $format = 'd/m/Y', string $empty = '-'): string
    {
        if (! $date) return $empty;

        return $date->format('d/m/Y');
    }
}
