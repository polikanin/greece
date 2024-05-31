<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.webiprog.de
 * @since    1.5.0
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Catch_Google_Bot
 * @subpackage Catch_Google_Bot/admin
 * @author     Alex Webiprog <oleg@webiprog.de>
 */
class Catch_Google_Bot_Admin
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
     * Initialize the class and set its properties.
     *
     * @since    1.5.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        $this->settings_api = new CatchGoogleBot_WeDevs_Settings_API();

        add_action('admin_init', array($this, 'admin_init'));
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    public function admin_init()
    {

        //set the settings
        $this->settings_api->set_sections($this->get_settings_sections());
        $this->settings_api->set_fields($this->get_settings_fields());

        //initialize settings
        $this->settings_api->admin_init();
    }

    public function admin_menu()
    {
        //$capability = catch-google-bot_admin_role();  //'delete_posts' // manage_options
        $capability = 'delete_posts'; //'delete_posts'

        // TODO ADD STYLE FOR ICON
        //$icon       = plugin_dir_url(__DIR__) . 'images/speed.svg';
        $icon       = plugin_dir_url(__DIR__) . 'images/speed.png';

        add_menu_page(__('WPsub', 'catch-google-bot'), __('WPsub', 'catch-google-bot'), $capability, 'catch-google-bot-admin-opt', array($this, 'plugin_page'), $icon, 55);
        do_action('catch-google-bot_admin_menu');
        add_submenu_page('catch-google-bot-admin-opt', __('Settings', 'catch-google-bot'), __('Settings', 'catch-google-bot'), $capability, 'catch-google-bot-settings', array($this, 'plugin_page'));
    }

    /**
     * Get the value of a settings field
     *
     * @param string $option settings field name
     * @param string $section the section name this field belongs to
     * @param string $default default text if it's not found
     * @return mixed
     * @exp Catch_Google_Bot_Admin::cgb_get_option($option, $section='catch_google_bot_basics', $default = '') catch_google_bot_basics catch_google_bot_providers
     */
    public static function cgb_get_option($option, $section = 'catch_google_bot_basics', $default = '')
    {
        return Catch_Google_Bot::cgb_get_option($option, $section, $default);
    }

    /**
     * get Params function
     *
     * @exp Catch_Google_Bot_Admin::getParams($option, $section='catch_google_bot_basics') catch_google_bot_basics catch_google_bot_providers
     * @param [type] $section
     * @return void
     */
    public static function getParams($section = 'catch_google_bot_basics')
    {

        return Catch_Google_Bot::getParams($section);
    }

    /**
     * @return mixed
     */
    public function get_settings_sections()
    {
        $sections = array(
            array(
                'id'    => 'catch_google_bot_basics',
                'title' => __('General Settings', 'catch-google-bot')
            ),
            array(
                'id'    => 'catch_google_bot_basics_addcode',
                // Add code to Footer
                'title' => __('Add code', 'catch-google-bot')
            )

        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields()
    {

        $settings_fields = array(

            // "DE","AT","CH"
            // Germany, Austria, Switzerland
            'catch_google_bot_basics'         => array(

                array(
                    'name'    => 'mode',
                    'label'   => __('Plugin mode', 'catch-google-bot'),
                    'desc'    => __('Select Mode', 'catch-google-bot'),
                    'type'    => 'select',
                    'default' => 'no',
                    'options' => array(
                        'no'   => 'Disable Plugin',
                        'yes'  => 'Enable plugin',
                        'test' => 'Test (Simulates bots)'
                    )
                ),
                array(
                    'name' => 'htmlBot',
                    'desc' => __('<strong>Tag Settings</strong>', 'catch-google-bot'),
                    'type' => 'html'
                ),
                array(
                    'name'              => 'bot',
                    'label'             => __('Bot name', 'catch-google-bot'),
                    'desc'              => __('Comma separated list of Bot name.These names will be used to search for HTTP_USER_AGENT', 'catch-google-bot'),
                    'placeholder'       => __('Comma separated list of Bot name', 'catch-google-bot'),
                    'type'              => 'text',
                    'size'              => 'middle-text regular',
                    'default'           => 'Chrome-Lighthouse,Speed Insights,Google Page Speed Insights,Googlebot',
                    // 'sanitize_callback' => 'sanitize_text_field',
                    'sanitize_callback' => 'Catch_Google_Bot_Admin::sanitize_comma'
                ),
                array(
                    'name'              => 'tags',
                    'label'             => __('Tags name', 'catch-google-bot'),
                    'desc'              => __('Comma separated list of Tags name.', 'catch-google-bot'),
                    'placeholder'       => __('Comma separated list of Tags name', 'catch-google-bot'),
                    'type'              => 'text',
                    'size'              => 'middle-text regular',
                    'default'           => '',
                    // 'sanitize_callback' => 'sanitize_text_field',
                    'sanitize_callback' => 'Catch_Google_Bot_Admin::sanitize_comma'
                ),

                array(
                    'name' => 'htmlcss',
                    'desc' => __('<strong>Critical CSS Settings</strong>', 'catch-google-bot'),
                    'type' => 'html'
                ),

                array(
                    'name'              => 'critical_css',
                    'label'             => __('Critical CSS', 'catch-google-bot'),
                    'desc'              => __('Add critical CSS', 'catch-google-bot'),
                    'placeholder'       => __('Add critical CSS', 'catch-google-bot'),
                    'type'              => 'textarea',
                    'sanitize_callback' => 'Catch_Google_Bot_Admin::sanitize_comma'
                ),

                array(
                    'name' => 'htmljs',
                    'desc' => __('<strong>Additional JS Settings</strong>', 'catch-google-bot'),
                    'type' => 'html'
                ),
                array(
                    'name'              => 'js',
                    'label'             => __('Additional JS', 'catch-google-bot'),
                    'placeholder'       => __('Additional JS', 'catch-google-bot'),
                    'type'              => 'textarea',
                    'sanitize_callback' => 'Catch_Google_Bot_Admin::sanitize_comma'
                ),
//                //add async defer to javascript files
//                array(
//                    'name'  => 'async_defer',
//                    'label' => __('Add async defer to js', 'catch-google-bot'),
//                    'desc'  => __('add async defer to javascript files', 'catch-google-bot'),
//                    'type'  => 'checkbox'
//                ),

                array(
                    'name' => 'htmlpreloader',
                    'desc' => __('<strong>Preloader Settings</strong>', 'catch-google-bot'),
                    'type' => 'html'
                ),
                array(
                    'name'  => 'is_preloader',
                    'label' => __('Add preloader', 'catch-google-bot'),
                    'desc'  => __('Add preloader', 'catch-google-bot'),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'              => 'pl_color',
                    'label'             => __('Preloader color', 'catch-google-bot'),
                    'desc'              => __('Chooise preloader color', 'catch-google-bot'),
                    'placeholder'       => __('Chooise preloader color', 'catch-google-bot'),
                    'type'              => 'color',
                    'size'              => 'middle-text regular',
                    'default'           => '',
                    // 'sanitize_callback' => 'sanitize_text_field',
                    'sanitize_callback' => 'Catch_Google_Bot_Admin::sanitize_comma'
                ),
                array(
                    'name'              => 'pl_img',
                    'label'             => __('Preloader image', 'catch-google-bot'),
                    'desc'              => __('Chooise preloader image', 'catch-google-bot'),
                    'placeholder'       => __('Chooise preloader image', 'catch-google-bot'),
                    'type'              => 'file',
                    'size'              => 'middle-text regular',
                    'default'           => '',
                    // 'sanitize_callback' => 'sanitize_text_field',
                ),

            ),

            'catch_google_bot_basics_addcode' => array(

                // Добавить код в Header
                array(
                    'name'  => 'header',
                    'label' => __('Add code to Header', 'catch-google-bot'),
                    // 'desc'        => __('Comma separated list of js links', 'catch-google-bot'),
                    // 'placeholder' => __('Comma separated list of js links', 'catch-google-bot'),
                    'type'  => 'textarea'
                ),
                // Добавить код в Footer
                array(
                    'name'  => 'footer',
                    'label' => __('Add code to Footer', 'catch-google-bot'),
                    // 'desc'        => __('Comma separated list of js links', 'catch-google-bot'),
                    // 'placeholder' => __('Comma separated list of js links', 'catch-google-bot'),
                    'type'  => 'textarea'
                ),
            )

        );

        return apply_filters('catch-google-bot_settings_fields', $settings_fields);
    }

    /**
     * @param $input
     * @return mixed
     */
    public static function sanitize_comma($input)
    {

        if ($input) {
            $output = array_map('trim', explode(',', $input));
            $output = array_filter($output);
            $output = implode(',', $output);
        } else {

            $output = '';
        }

        return $output;
    }

    /**
     * @param $url
     * @return mixed
     */
    public static function is_local_url($url)
    {


        if (strpos($url, 'wp-content') !== false) {

            $home_url = strtolower(home_url('/'));

            if (strpos($url, $home_url) !== 0) {
                // $scheme = substr($url, 0, strpos($url, ':'));
                // $return = !$scheme || ($scheme && !preg_match('/^[a-z0-9.]{2,16}$/iu', $scheme));
                return $home_url . $url;
            }
        }
        return $url;
    }

    // remove version from scripts and styles
    /**
     * @param $src
     * @return mixed
     */
    public static function remove_version_scripts_styles($src)
    {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
    }

    /**
     * @param $input
     * @return mixed
     */
    public static function sanitize_comma_url($input)
    {

        if ($input) {
            $output = array_map('trim', explode(',', $input));
            $output = array_filter($output);
            foreach ($output as $key => $src) {
                $output[$key] = self::remove_version_scripts_styles($src);
                $output[$key] = self::is_local_url($output[$key]);
            }
            $output = implode(',', $output);
        } else {

            $output = '';
        }

        return $output;
    }

    /**
     *
     *    Sanitize checkbox input
     *
     */
    public function sanitize_checkbox($input)
    {

        if ($input) {

            $output = '1';
        } else {

            $output = false;
        }

        return $output;
    }

    /**
     *
     *    Sanitize integers
     *
     */
    public function sanitize_int($input)
    {

        if ($input) {

            $output = absint($input);
        } else {

            $output = false;
        }

        return $output;
    }

    public function plugin_page()
    {
        echo '<div style="clear:both" class="clear"></div><div class="kaz-wrap rflino">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    public function get_pages()
    {
        $pages         = get_pages();
        $pages_options = array();
        if ($pages) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.5.0
     */
    public function enqueue_styles()
    {

        // return;

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/catch-google-bot-admin.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.5.0
     */
    public function enqueue_scripts()
    {
        return;

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/catch-google-bot-admin.js', array('jquery'), $this->version, false);
    }

    /**
     * @return mixed
     */
    public function TEST_get_settings_fields()
    {
        $settings_fields = array(
            'calculation_basics'   => array(
                array(
                    'name'              => 'text_val',
                    'label'             => __('Text Input', 'catch-google-bot'),
                    'desc'              => __('Text input description', 'catch-google-bot'),
                    'placeholder'       => __('Text Input placeholder', 'catch-google-bot'),
                    'type'              => 'text',
                    'default'           => 'Title',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'number_input',
                    'label'             => __('Number Input', 'catch-google-bot'),
                    'desc'              => __('Number field with validation callback `floatval`', 'catch-google-bot'),
                    'placeholder'       => __('1.99', 'catch-google-bot'),
                    'min'               => 0,
                    'max'               => 100,
                    'step'              => '0.01',
                    'type'              => 'number',
                    'default'           => 'Title',
                    'sanitize_callback' => 'floatval'
                ),
                array(
                    'name'        => 'textarea',
                    'label'       => __('Textarea Input', 'catch-google-bot'),
                    'desc'        => __('Textarea description', 'catch-google-bot'),
                    'placeholder' => __('Textarea placeholder', 'catch-google-bot'),
                    'type'        => 'textarea'
                ),
                array(
                    'name' => 'html',
                    'desc' => __('HTML area description. You can use any <strong>bold</strong> or other HTML elements.', 'catch-google-bot'),
                    'type' => 'html'
                ),
                array(
                    'name'  => 'checkbox',
                    'label' => __('Checkbox', 'catch-google-bot'),
                    'desc'  => __('Checkbox Label', 'catch-google-bot'),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'    => 'radio',
                    'label'   => __('Radio Button', 'catch-google-bot'),
                    'desc'    => __('A radio button', 'catch-google-bot'),
                    'type'    => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'selectbox',
                    'label'   => __('A Dropdown', 'catch-google-bot'),
                    'desc'    => __('Dropdown description', 'catch-google-bot'),
                    'type'    => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'password',
                    'label'   => __('Password', 'catch-google-bot'),
                    'desc'    => __('Password description', 'catch-google-bot'),
                    'type'    => 'password',
                    'default' => ''
                ),
                array(
                    'name'    => 'file',
                    'label'   => __('File', 'catch-google-bot'),
                    'desc'    => __('File description', 'catch-google-bot'),
                    'type'    => 'file',
                    'default' => '',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                )
            ),
            'calculation_advanced' => array(
                array(
                    'name'    => 'color',
                    'label'   => __('Color', 'catch-google-bot'),
                    'desc'    => __('Color description', 'catch-google-bot'),
                    'type'    => 'color',
                    'default' => ''
                ),
                array(
                    'name'    => 'password',
                    'label'   => __('Password', 'catch-google-bot'),
                    'desc'    => __('Password description', 'catch-google-bot'),
                    'type'    => 'password',
                    'default' => ''
                ),
                array(
                    'name'    => 'wysiwyg',
                    'label'   => __('Advanced Editor', 'catch-google-bot'),
                    'desc'    => __('WP_Editor description', 'catch-google-bot'),
                    'type'    => 'wysiwyg',
                    'default' => ''
                ),
                array(
                    'name'    => 'multicheck',
                    'label'   => __('Multile checkbox', 'catch-google-bot'),
                    'desc'    => __('Multi checkbox description', 'catch-google-bot'),
                    'type'    => 'multicheck',
                    'default' => array('one' => 'one', 'four' => 'four'),
                    'options' => array(
                        'one'   => 'One',
                        'two'   => 'Two',
                        'three' => 'Three',
                        'four'  => 'Four'
                    )
                )
            )
        );

        return $settings_fields;
    }
}
