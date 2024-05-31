<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.webiprog.de
 * @since    1.5.0
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/public
 * @author     Alex Webiprog <oleg@webiprog.de>
 */
class Catch_Google_Bot_Public
{
    /**
     * The ID of this plugin.
     *
     * @since    1.5.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.5.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;
    /**
     * @var mixed
     */
    public $path;

    /**
     * Possible integrations with different plugins.
     *
     * @var array Integrations classes.
     */
    private $possible_compatibilities = array(
        'shortcode_ultimate',
        'foogallery',
        'envira',
        'beaver_builder',
        'jet_elements',
        'revslider',
        'metaslider',
        'essential_grid',
        'yith_quick_view',
        'cache_enabler',
        'elementor_builder',
        'divi_builder',
        'thrive',
        'master_slider',
        'pinterest',
        'sg_optimizer',
        'wp_fastest_cache',
        'swift_performance',
        'w3_total_cache',
        'translate_press',
        'give_wp'
    );

    private $deactivated = [
        'elementor-pro/elementor-pro.php',
        'elementor/elementor.php',
        'elementor-extras/elementor-extras.php',
        'wp-migrate-db-pro-media-files/wp-migrate-db-pro-media-files.php',
        'wp-migrate-db-pro/wp-migrate-db-pro.php',
        'duplicate-post/duplicate-post.php',
        'simple-page-ordering/simple-page-ordering.php',
        'admin-collapse-subpages/admin_collapse_subpages.php',
        'classic-editor/classic-editor.php',
        'post-types-order/post-types-order.php',
        'search-regex/search-regex.php',
        'wp-fastest-cache/wpFastestCache.php',
        'query-monitor/query-monitor.php',
        'eduiland/eduiland.php'
    ];

    /**
     * @var array
     */
    private $disabled = array(

        'w3-total-cache/w3-total-cache.php',            // W3 Total Cache
        'wordpress-https/wordpress-https.php',          // WordPress HTTPS
        'wp-super-cache/wp-super-cache.php',            // WP Super Cache
        'backupbuddy/backupbuddy.php',                  // BackupBuddy
        'autoptimize/autoptimize.php',                  // Autoptimize
        'wp-fastest-cache/wpFastestCache.php',
        // 'shortpixel-image-optimiser/wp-shortpixel.php', // ShortPixel
    );

    /**
     * Plugin cache group
     * @url https://github.com/kagg-design/disable-plugins/blob/1643a398bf5376b9c6497abc4fcc0b2843dfe4cd/includes/class-main.php
     * @var string
     */
    const CACHE_GROUP = 'cgb_disable_plugins';


    /**
     * Initialize the class and set its properties.
     *
     * @since    1.5.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        $this->path        = plugin_dir_path(__FILE__);
        // 'E:\\openserver7\\OpenServer\\domains\\localhost\\arteglex.com\\wp-content\\plugins\\catch-google-bot\\public/'
        // $this->path = plugin_dir_path(__DIR__);
        // 'E:\\openserver7\\OpenServer\\domains\\localhost\\arteglex.com\\wp-content\\plugins\\catch-google-bot/'

        $mode = Catch_Google_Bot::cgb_get_option('mode');
        if ($mode == 'no') {
            // Disable Plugin
            return true;
        } else {
            // check is a front ?
            $is_front = self::cgb_start_buffer();
            if ($is_front === true) {

                $is_bot = self::is_bot();
                if ($is_bot) {
                    // Добавить код в Header
                    add_action("wp_head", array($this, 'add_to_head_css'));
                    // Добавить код в Footer
                    add_action("wp_footer", array($this, 'add_to_footer_css'));

                    // получить буфер сайта и переписать в нем css/js
                    add_action('after_setup_theme', array($this, 'buffer_start'));
                    // очистить буфер
                    add_action('shutdown', array($this, 'buffer_end'));

                    // remove emojis
                    add_action("init", array($this, 'disable_emojis'));

                    //TODO ANATOLY COMMENT THIS
//                    add_filter('style_loader_src', array($this, 'wp_remove_version', 9999));
//                    add_filter('script_loader_src', array($this, 'wp_remove_version', 9999));

                    // add async defer to javascript files
                    // Add FA parameters to the script tag.
                    add_filter('script_loader_tag', array($this, 'add_async_defer_js'), 10, 2);

                    // Cache_w3_total_cache stores the content of the page before Catch_Google_Bot starts replacing url's
                    // add_filter('w3tc_minify_processed', array($this, 'html_filter'));

                    // Performance optimized by W3 Total Cache. Learn more: https://www.boldgrid.com/w3-total-cache/

                    //     Object Caching 179/865 objects using disk
                    //     Page Caching using disk: enhanced
                    //     Database Caching 44/197 queries in 0.105 seconds using disk

                    //     Served from: endower.webiprog.de @ 2021-05-20 16:09:47 by W3 Total Cache


                    // Add the filters disables plugins that you specify
                    // add_filter('option_active_plugins', array($this, 'do_disabling'), PHP_INT_MIN);
                    // add_filter('site_option_active_sitewide_plugins', array($this, 'do_network_disabling'), PHP_INT_MIN);

                    // add_filter('option_hack_file', [$this, 'remove_plugin_filters'], PHP_INT_MIN);
                    // add_action('plugins_loaded', [$this, 'remove_plugin_filters'], PHP_INT_MIN);
                }
            }
        }
    }

    /**
     * Remove plugin filters
     */
    public function remove_plugin_filters()
    {
        remove_filter('option_active_plugins', [$this, 'do_disabling'], PHP_INT_MIN);
    }

    /**
     * Hooks in to the option_active_plugins filter and does the disabling
     * @param array $plugins WP-provided list of plugin filenames
     * @return array The filtered array of plugin filenames
     */
    public function do_disabling($plugins)
    {

        if (!is_array($plugins) || empty($plugins)) {
            return $plugins;
        }

        if (count($this->disabled)) {

            $key             = md5(wp_json_encode($plugins));
            $allowed_plugins = wp_cache_get($key, self::CACHE_GROUP);

            if (false !== $allowed_plugins) {
                return $allowed_plugins;
            }
            // !! TEST array_diff
            // $exclude = array(
            //     'pushover-notifications/pushover-notifications.php',
            //     'w3-total-cache/w3-total-cache.php',
            // );
            // $plugins = array_diff($plugins, $exclude);

            foreach ((array) $this->disabled as $plugin) {
                $key = array_search($plugin, $plugins);
                if (false !== $key) {

                    // file_put_contents ( ABSPATH."do_disabling.txt" , var_export( [$plugins[$key]] , true), FILE_APPEND | LOCK_EX );
                    //exit;
                    unset($plugins[$key]);
                }
            }

            wp_cache_set($key, $plugins, self::CACHE_GROUP);
        }
        return $plugins;
    }

    /**
     * Hooks in to the site_option_active_sitewide_plugins filter and does the disabling
     *
     * @param array $plugins
     *
     * @return array
     */
    public function do_network_disabling($plugins)
    {

        if (!is_array($plugins) || empty($plugins)) {
            return $plugins;
        }

        if (count($this->disabled)) {
            foreach ((array) $this->disabled as $plugin) {

                if (isset($plugins[$plugin])) {
                    unset($plugins[$plugin]);
                }
            }
        }

        return $plugins;
    }

    /**
     * add_async_defer_js
     * add async defer to javascript files
     * @param $tag
     * @param $handle
     * @return mixed
     */
    public function add_async_defer_js($tag, $handle)
    {
        // return $tag;

        $async_defer = Catch_Google_Bot::cgb_get_option('async_defer');

        // 'off' 'on'
        if (empty($async_defer) || $async_defer == 'off') {
            return $tag;
        }

        if (isset($GLOBALS['pagenow']) && $GLOBALS['pagenow'] == 'wp-login.php') {
            return $tag;
        }
        // jquery.min.js jquery-migrate.min.js
        if (strpos($tag, "jquery.js") || strpos($tag, "jquery-migrate.min.js")) {
            return $tag;
        }

        $param = '';
        if (strpos($handle, 'async') !== false) {
            $param = 'async ';
        }

        if (strpos($handle, 'defer') !== false) {
            $param .= 'defer ';
        }

        if ($param) {
            return str_replace('<script ', '<script ' . $param, $tag);
        } else {
            return $tag;
        }

        // return str_replace(' src', ' async defer src', $tag);
    }

    /**
     * Disable the emoji's
     */

    public function disable_emojis()
    {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
        // add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
    }

    // remove automatically added wordpress version from script
    /**
     * @param $src
     * @return mixed
     */
    public function wp_remove_version($src)
    {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        // reload on every request on localhost
        if (!is_production()) {
            $src = add_query_arg('ver', mt_rand(1000, 9999), $src);
        }
        return $src;
    }

    public function add_to_head_css()
    {

        $header = Catch_Google_Bot::cgb_get_option('header', 'catch_google_bot_basics_addcode');
        if (!empty($header)) {
            echo trim($header);
        };
    }

    public function add_to_footer_css()
    {

        $footer = Catch_Google_Bot::cgb_get_option('footer', 'catch_google_bot_basics_addcode');
        if (!empty($footer)) {
            echo trim($footer);
        };
    }

    /**  cgb_start_buffer
     * Launch only for the site front
     * @param $buffer
     * @return mixed
     */
    public static function cgb_start_buffer()
    {
        $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
        if (!is_admin() && strpos($request_uri, 'wp-login.php') === false && strpos($request_uri, 'wp-signup.php') === false) {
            return true;
        }
        return false;
    }

    /**
     * get the buffer of the whole site and rewrite it as it should (js /css )
     * @param $buffer
     * @return mixed
     */
    public function html_filter($buffer)
    {

        $key             = md5(MINUTE_IN_SECONDS);
        // $buffer_cache = wp_cache_get($key, self::CACHE_GROUP);

        // if (false !== $buffer_cache) {
        //     return $buffer_cache;
        // }

        // return $buffer;
        require_once $this->path . 'class-catch-google-bot-filtering.php';

        // global $wp;
        // $url =  home_url($wp->request);

        $css = self::comma_to_array('css');
        $js  = self::comma_to_array('js');

        $obj = new Css_Js_CGB_Filtering($buffer, $css, $js);

        $html = $obj->html();

        wp_cache_set($key, $html, self::CACHE_GROUP);

        return $html;
    }

    /** @return void  */
    public function buffer_start()
    {
        ob_start(array($this, "html_filter"));
    }

    /** @return void  */
    public function buffer_end()
    {
        if (ob_get_contents()) {
            ob_end_flush();
        }
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

        if (is_null($is_bot)) {
            // test mode
            $mode = Catch_Google_Bot::cgb_get_option('mode');
            if ($mode == 'test') {
                // если админ включаем тест режим
                $is_super_admin = self::is_admin();
                if ($is_super_admin == true) {
                    return true;
                }
            }

            $user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING);
            // 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36'
            $is_bot = self::is_bot_user_agent($user_agent);
        }

        return $is_bot;
    }

    private static function is_admin()
    {
        if (!function_exists('wp_get_current_user')) {
            include ABSPATH . "wp-includes/pluggable.php";
        }
        if (is_super_admin()) {
            return true;
        }
        return false;
    }

    /**
     * @param $opt
     */
    private static function comma_to_array($opt = 'bot')
    {

        $option_bot = Catch_Google_Bot::cgb_get_option($opt);
        $bot_agents = array_map('trim', explode(',', $option_bot));
        if (empty($bot_agents)) {
            return array();
        }
        return array_filter($bot_agents);
    }

    /**
     * @param $ua
     */
    private static function is_bot_user_agent($ua = null)
    {

        if (empty($ua)) {
            return false;
        }

        // TODO NEED TO HARDCODE bot list
        $bot_agents = self::comma_to_array('bot');

        foreach ($bot_agents as $bot_agent) {
            if (false !== stripos($ua, $bot_agent)) {
                return true;
                break;
            }
        }

        return false;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.5.0
     */
    public function enqueue_styles()
    {

        //wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/catch-google-bot-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.5.0
     */
    public function enqueue_scripts()
    {

        // wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/catch-google-bot-public.js', array('jquery'), $this->version, false);
    }

    // public function is_active(): bool
    // {

    //     $user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING);
    //     if (
    //         !empty($user_agent) &&
    //         (false !== strpos($user_agent, 'Googlebot') ||
    //             false !== strpos($user_agent, 'Speed Insights') ||
    //             false !== strpos($user_agent, 'Chrome-Lighthouse'))
    //     ) {
    //         return false;
    //     }

    //     return true;
    // }

    /* @FIX by oppo (webiprog.de), @Date: 2021-05-19 16:36:04
     * @Desc:  test
     * E:\E\work\+++++++++----2020---++++++++++++\WordPress Cache Improving\functions-BANK_TEMPLATE.php
     */
    // disable jquery and other scripts added by plugins
    // if you really need them bundle them locally(!) in your package.json
    // add_action('wp_enqueue_scripts', function()
    // {
    //     wp_deregister_script('jquery');
    //     wp_deregister_style( 'wp-block-library' ); // gutenberg
    // });
    // add_action('wp_footer', function()
    // {
    //     wp_deregister_script('wp-embed');
    // });

}

/*
 * For reference only
 * Plugins loaded: 10th of April, 2017 - DEV
 *
 * Array
(
    [0] => better-search-replace/better-search-replace.php
    [1] => black-studio-tinymce-widget/black-studio-tinymce-widget.php
    [2] => codecanyon-6123531-woocommerce-orders-page-customiser/woocommerce-order-page-customiser.php
    [3] => contact-form-7/wp-contact-form-7.php
    [4] => flow-flow/flow-flow.php
    [5] => imagify/imagify.php
    [6] => jck_woo_deliveryslots/jck_woo_deliveryslots.php
    [7] => olark-for-wp/olark-for-wp.php
    [8] => plugin-organizer/plugin-organizer.php
    [9] => png-to-jpg/png-to-jpg.php
    [10] => pt-content-views-pro/content-views.php
    [11] => revslider/revslider.php
    [12] => rp-woo-donation/index.php
    [13] => siteorigin-panels/siteorigin-panels.php
    [14] => so-widgets-bundle/so-widgets-bundle.php
    [15] => updraftplus/updraftplus.php
    [16] => w3-total-cache/w3-total-cache.php
    [17] => widgets-for-siteorigin/widgets-for-siteorigin.php
    [18] => woocommerce-auto-category-thumbnails/woocommerce-auto-cat-thumbnails.php
    [19] => woocommerce-customizer/woocommerce-customizer.php
    [20] => woocommerce-gateway-stripe/woocommerce-gateway-stripe.php
    [21] => woocommerce-menu-bar-cart/wp-menu-cart.php
    [22] => woocommerce-menu-extension/woocommerce-menu-extension.php
    [23] => woocommerce-minima-and-maxima/woocommerce-minima-and-maxima.php
    [24] => woocommerce-pimpmywoo/pimpmywoo.php
    [25] => woocommerce-pincode-check-pro-unl-num/woocommerce-pincode-check.php
    [26] => woocommerce-status-actions/woocommerce-status-actions.php
    [27] => woocommerce/woocommerce.php
    [28] => woothemes-updater/woothemes-updater.php
    [29] => wp-asset-clean-up/wpacu.php
    [30] => wp-gallery-custom-links/wp-gallery-custom-links.php
    [31] => wp-sync-db/wp-sync-db.php
)
*/
