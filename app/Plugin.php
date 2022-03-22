<?php

namespace VulPress;


class Plugin
{
    protected static Plugin $instance;

    private string $plugin_slug;

    private string $version;

    private string $plugin_name;

    private string $plugin_url;

    private string $plugin_path;

    public function __construct(array $params = [])
    {
        $this->plugin_slug = $this->extractParameter($params, 'plugin_slug', basename(dirname(__DIR__)));
        $this->version = $this->extractParameter($params, 'version',  '0.0.1');
        $this->plugin_name = plugin_basename(realpath(__DIR__ . '/../index.php'));
        $this->plugin_url = plugin_dir_url(__DIR__);
        $this->plugin_path = plugin_dir_path(__DIR__);

        static::setInstance($this);
    }

    public function load(array $classes) {
        foreach ($classes as $class) {
            if (class_exists($class)) {
                new $class();
            }
        }
    }

    public function extractParameter(array $params, string $property, $default = null)
    {
        return !empty($params[$property]) ? $params[$property] : $default;
    }

    public static function getInstance(): Plugin
    {
        if (!isset(static::$instance) || is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    public static function setInstance(Plugin $plugin): Plugin
    {
        return static::$instance = $plugin;
    }

    public function getPluginSlug(): string
    {
        return $this->plugin_slug;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getPluginName(): string
    {
        return $this->plugin_name;
    }

    public function getPluginUrl(): string
    {
        return $this->plugin_url;
    }

    public function getPluginPath(): string
    {
        return $this->plugin_path;
    }
}
