<?php

namespace VulPress\Controllers;


use VulPress\Plugin;

class AdminSettingsController
{

    private Plugin $plugin;

    private string $option_name = 'vulpress';

    private string $ajax_get_action = 'get_vulpress_settings';

    private string $ajax_store_action = 'store_vulpress_settings';

    public function __construct()
    {
        $this->plugin = Plugin::getInstance();

        add_action('admin_menu', [$this, 'addSettingsPage']);
        add_action("wp_ajax_{$this->ajax_get_action}", [$this, 'getPluginSettings']);
        add_action("wp_ajax_{$this->ajax_store_action}", [$this, 'storePluginSettings']);
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
        include $this->plugin->getPluginPath() . 'resources/views/admin/settings.php';
    }

    /**
     * Add plugin's settings page to admin control panel
     */
    public function enqueueSettingsPageAssets()
    {
        if (defined('VULPRESS_DEV') && VULPRESS_DEV) {
            wp_enqueue_script("{$this->plugin->getPluginSlug()}-script", 'http://localhost:3000/resources/js/main.js');
            add_filter('script_loader_tag', function ($tag, $handle, $src) {
                return "{$this->plugin->getPluginSlug()}-script" !== $handle ? $tag :
                    '<script  type="module" src="' . esc_url($src) . '"></script>';
            }, 10, 3);
        } else {
            wp_enqueue_style("{$this->plugin->getPluginSlug()}-styles", $this->plugin->getPluginUrl() . 'assets/compiled/style.css', [], $this->plugin->getVersion());
            wp_enqueue_script("{$this->plugin->getPluginSlug()}-script",  $this->plugin->getPluginUrl() . 'assets/compiled/my-lib.umd.js', [], $this->plugin->getVersion(), true);
        }

        wp_localize_script("{$this->plugin->getPluginSlug()}-script", 'vulpress_config', $this->getPluginConfig());
    }

    /**
     * Data to pass to vue instance
     */
    public function getPluginConfig(): array
    {
        return [
            'plugin_dir_url' => $this->plugin->getPluginUrl(),
            'ajax_url' => admin_url('admin-ajax.php'),
            'ajax_get_action' => $this->ajax_get_action,
            'ajax_store_action' => $this->ajax_store_action,
        ];
    }

    /**
     * Get settings for vue instance
     */
    public function getPluginSettings()
    {
        echo json_encode(get_option($this->option_name));

        wp_die();
    }

    /**
     * Store settings from vue submission
     */
    public function storePluginSettings()
    {
        $successful = update_option(
            $this->option_name,
            filter_input(INPUT_POST, 'settings', FILTER_SANITIZE_STRING, FILTER_FORCE_ARRAY),
            true
        );

        echo json_encode([
            'updated' => $successful,
        ]);

        wp_die();
    }

}
