<?php

/**
 * Functions for your plugin. Use sparingly as they may conflict with existing functions
 */

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $v) {
            echo '<pre>';
            var_dump($v);
            echo '</pre>';
        }

        exit(1);
    }
}
