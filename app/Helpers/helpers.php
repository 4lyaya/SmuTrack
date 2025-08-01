<?php

if (!function_exists('initials')) {
    function initials(string $name): string
    {
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }

        return substr($initials, 0, 2); // Return max 2 initials
    }
}