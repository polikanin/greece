<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.webiprog.de
 * @since    1.5.0
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since    1.5.0
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/includes
 * @author     Alex Webiprog <oleg@webiprog.de>
 */
class Catch_Google_Bot
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    1.5.0
     * @access   protected
     * @var      Catch_Google_Bot_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.5.0
     * @access   protected
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.5.0
     * @access   protected
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * @var mixed
     */
    public $settings;
    /**
     * @var mixed
     */
    public $path;

    /**
     * @var array
     */
    private $disabled = array(

        'w3-total-cache/w3-total-cache.php', // W3 Total Cache
        'wordpress-https/wordpress-https.php', // WordPress HTTPS
        'wp-super-cache/wp-super-cache.php', // WP Super Cache
        'backupbuddy/backupbuddy.php', // BackupBuddy
        'autoptimize/autoptimize.php', // Autoptimize
        'wp-fastest-cache/wpFastestCache.php'
        // 'shortpixel-image-optimiser/wp-shortpixel.php', // ShortPixel
    );

    /**
     * Plugin cache group
     * @url https://github.com/kagg-design/disable-plugins/blob/1643a398bf5376b9c6497abc4fcc0b2843dfe4cd/includes/class-main.php
     * @var string
     */
    const CACHE_GROUP = 'cgb_first_disable_plugins';

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    1.5.0
     */
    public function __construct()
    {
        if ( defined( 'CATCH_GOOGLE_BOT_VERSION' ) ) {
            $this->version = CATCH_GOOGLE_BOT_VERSION;
        } else {
            $this->version = '1.5.0';
        }
        $this->plugin_name = 'catch-google-bot';

        $this->path = plugin_dir_path( __DIR__ );

        $is_bot = self::is_bot();
        if ( !is_admin() && $is_bot ) {

            // $plugins = array(
            //     'w3-total-cache/w3-total-cache.php'
            // );
            // require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            // deactivate_plugins($plugins);

            add_filter( 'option_active_plugins', array( $this, 'do_disabling' ), PHP_INT_MIN );
        }

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Hooks in to the option_active_plugins filter and does the disabling
     * @param array $plugins WP-provided list of plugin filenames
     * @return array The filtered array of plugin filenames
     */
    public function do_disabling( $plugins )
    {

        if ( !is_array( $plugins ) || empty( $plugins ) ) {
            return $plugins;
        }

        if ( count( $this->disabled ) ) {

            $key             = md5( wp_json_encode( $plugins ) );
            $allowed_plugins = wp_cache_get( $key, self::CACHE_GROUP );

            if ( false !== $allowed_plugins ) {
                return $allowed_plugins;
            }
            // !! TEST array_diff
            $exclude = array(
                // 'pushover-notifications/pushover-notifications.php',
                'w3-total-cache/w3-total-cache.php'
            );
            $plugins = array_diff( $plugins, $exclude );

            // foreach ((array) $this->disabled as $plugin) {
            //     $key = array_search($plugin, $plugins);
            //     if (false !== $key) {

            //         // file_put_contents ( ABSPATH."do_disabling.txt" , var_export( [$plugins[$key]] , true), FILE_APPEND | LOCK_EX );
            //         //exit;
            //         unset($plugins[$key]);
            //     }
            // }

            wp_cache_set( $key, $plugins, self::CACHE_GROUP );
        }
        return $plugins;
    }

    /**
     * Was the current request made by a known bot?
     *
     * @return boolean
     */
    public static function is_bot()
    {
        /**
         * @var mixed
         */
        static $is_bot = null;

        if ( is_null( $is_bot ) ) {
            // test mode
            $mode = Catch_Google_Bot::cgb_get_option( 'mode' );
            if ( $mode == 'test' ) {
                // если админ включаем тест режим
                $is_super_admin = self::is_admin();
                if ( $is_super_admin == true ) {
                    return true;
                }
            }

            $user_agent = filter_input( INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING );
            // 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36'
            $is_bot = self::is_bot_user_agent( $user_agent );
        }

        return $is_bot;
    }

    private static function is_admin()
    {
        if ( !function_exists( 'wp_get_current_user' ) ) {
            include ABSPATH."wp-includes/pluggable.php";
        }
        if ( is_super_admin() ) {
            return true;
        }
        return false;
    }

    /**
     * @param $opt
     */
    private static function comma_to_array( $opt = 'bot' )
    {

        $option_bot = Catch_Google_Bot::cgb_get_option( $opt );
        $bot_agents = array_map( 'trim', explode( ',', $option_bot ) );
        if ( empty( $bot_agents ) ) {
            return array();
        }
        return array_filter( $bot_agents );
    }

    /**
     * @param $ua
     */
    private static function is_bot_user_agent( $ua = null )
    {

        if ( empty( $ua ) ) {
            return false;
        }
        $bot_agents = self::comma_to_array( 'bot' );

        foreach ( $bot_agents as $bot_agent ) {
            if ( false !== stripos( $ua, $bot_agent ) ) {
                return true;
                break;
            }
        }

        return false;
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Catch_Google_Bot_Loader. Orchestrates the hooks of the plugin.
     * - Catch_Google_Bot_i18n. Defines internationalization functionality.
     * - Catch_Google_Bot_Admin. Defines all hooks for the admin area.
     * - Catch_Google_Bot_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.5.0
     * @access   private
     */
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once $this->path.'includes/class-catch-google-bot-loader.php';

        require_once $this->path.'includes/class-catch-google-bot-settings-api.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once $this->path.'includes/class-catch-google-bot-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once $this->path.'admin/class-catch-google-bot-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once $this->path.'public/class-catch-google-bot-public.php';

        $this->loader = new Catch_Google_Bot_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Catch_Google_Bot_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.5.0
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Catch_Google_Bot_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since    1.5.0
     * @access   private
     */
    private function define_admin_hooks()
    {

        $plugin_admin = new Catch_Google_Bot_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since    1.5.0
     * @access   private
     */
    private function define_public_hooks()
    {

        $plugin_public = new Catch_Google_Bot_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    1.5.0
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since    1.5.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since    1.5.0
     * @return    Catch_Google_Bot_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since    1.5.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

    /**
     * Get the value of a settings field
     *
     * @param string $option settings field name
     * @param string $section the section name this field belongs to
     * @param string $default default text if it's not found
     * @return mixed
     * @exp catch_google_bot::cgb_get_option($option, $section='catch_google_bot_basics', $default = '') catch_google_bot_basics catch_google_botproviders
     */
    public static function cgb_get_option( $option, $section = 'catch_google_bot_basics', $default = '' )
    {
        //$options = get_option($section);
        $options = self::getParams( $section );
        if ( isset( $options[$option] ) ) {
            return $options[$option];
        }
        return $default;
    }

    /**
     * @var array
     */
    protected static $_params = array();
    /**
     * get Params function
     *
     * @exp catch_google_bot::getParams($section='catch_google_botproviders') catch_google_bot_basics catch_google_botproviders
     * @param [type] $section
     * @return void
     */
    public static function getParams( $section )
    {
        if ( !isset( self::$_params[$section] ) ) {
            self::$_params[$section] = get_option( $section );
        }
        return self::$_params[$section];
    }

    /**
     * Check and return an array key
     *
     * @change  2.5.0
     * @since   2.5.0
     *
     * @exp catch_google_bot::get_key($array, $key) catch_google_bot_basics catch_google_botproviders
     * @param  array  $array Array with values.
     * @param  string $key   Name of the key.
     * @return mixed  Value of the requested key.
     */
    public static function get_key(
        $array,
        $key
    ) {
        if ( empty( $array ) || empty( $key ) || !isset( $array[$key] ) ) {
            return null;
        }

        return $array[$key];
    }
}
