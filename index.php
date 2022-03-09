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

new class {

    private array $config = [];

    public function __construct()
    {
        if (file_exists($config_path = plugin_dir_path(__FILE__) . 'config.php')) $this->config = include $config_path;
        //add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'addSettingsPage']);
    }

    /**
     * Register custom fields for plugin settings
     */
    public function registerSettings()
    {
        register_setting('vulpress_settings', 'vulpress-settings');
    }

    /**
     * Add plugin's settings page to admin control panel
     */
    public function addSettingsPage()
    {
        $page = add_menu_page(
            __('VulPress - Settings', 'example-plugin'), //Title of the page
            __('VulPress', 'example-plugin'), //Text to show on the menu link
            'manage_options', //Capability requirement to see the link
            'vulpress-settings', //The 'slug' - file to display when clicking the link
            [$this, 'displaySettingsPage'],
            '',
        );

        add_action("load-{$page}", [$this, 'enqueueSettingsPageAssets']);
    }

    /**
     * Display settings page.
     */
    public function displaySettingsPage()
    {
        include plugin_dir_path(__FILE__) . 'templates/admin/settings.php';
    }

    /**
     * Add plugin's settings page to admin control panel
     */
    public function enqueueSettingsPageAssets()
    {
        if (!empty($this->config['isDev'])) {
            wp_enqueue_script('vulpress-script', 'http://localhost:3000/src/main.js');
            add_filter('script_loader_tag', function ($tag, $handle, $src) {
                return 'vulpress-script' !== $handle ? $tag :
                    '<script  type="module" src="' . esc_url($src) . '"></script>';
            }, 10, 3);
        }

        wp_localize_script('vulpress-script', 'vulpress_config', $this->getPluginConfig());
    }

    /**
     * Add plugin's settings page to admin control panel
     */
    public function getPluginConfig(): array
    {
        return [
            'plugin_dir_url' => plugin_dir_url(__FILE__),
        ];
    }
};
