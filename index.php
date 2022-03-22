<?php
/**
 * Plugin Name: VulPress Starter Plugin
 * Plugin URI:  https://example.com/
 * Description: A starting point for developing WordPress plugins using Vue 3 and Tailwind
 * Version:     0.1.0
 * Author:      Your Name
 * Author URI:  https://example.com/
 * Text Domain: example-plugin
 * License:     GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /languages
 */

defined('ABSPATH') || die; // Blocks direct access

/* Set to true while developing locally with vite */
//define('VULPRESS_DEV', true);

require __DIR__ . '/bootstrap/autoloader.php';
require __DIR__ . '/bootstrap/functions.php';

use VulPress\Plugin;
use VulPress\Controllers\AdminSettingsController;

$plugin = new Plugin([
    'version' => '0.1.0',
]);

$plugin->load([
    AdminSettingsController::class,
]);
