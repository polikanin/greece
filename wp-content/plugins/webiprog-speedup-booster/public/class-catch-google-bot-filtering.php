<?php

/**
 * @file: class-catch-google-bot-filtering.php
 * @package:    e:\openserver7\OpenServer\domains\localhost\arteglex.com\wp-content\plugins\catch-google-bot\public
 * @created:    Wed May 19 2021
 * @author:     oppo, webiprog.de
 * @version:    1.5.0
 * @modified:   Wednesday May 19th 2021 1:06:09 pm
 * @copyright   (c) 2008-2021 Webiprog GmbH, UA. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * Desc: This takes in html document as input
 * and list of css, js and resource to preload
 *
 * Version 1.5.0
 */

class Css_Js_CGB_Filtering
{
    /**
     * @var mixed
     */
    public $html_document;
    /**
     * @var mixed
     */
    public $css;
    /**
     * @var mixed
     */
    public $js;
    /**
     * @var mixed
     */
    public $dom;
    /**
     * @var mixed
     */
    public $final_dom;

    /**
     * @param $html_document
     * @param $css
     * @param $js
     */
    public function __construct($html_document, $css, $js)
    {
        $this->html_document = $html_document;
        $this->css           = $css;
        $this->js            = $js;
        $this->dom_parser();
    }

    // remove version from scripts and styles
    /**
     * @param $src
     * @return mixed
     */
    public function remove_version_scripts_styles($src)
    {
        if (strpos($src, 'ver=')) {
            $src = remove_query_arg('ver', $src);
        }
        return $src;
        // $pattern = "/".str_replace( "/", "\/", preg_quote( $script ) ).".*?\<\/(\s)*script\>/s";
        // forward slash is not a special character and hence preg_quote does not add escape character to it

    }

    /**
     * @param $url
     */
    public function url_for_regular_exp($url)
    {
        return str_replace('.', '\.', str_replace('/', '\/', $url));
    }

    /**
     * @return mixed
     */
    public function html()
    {
        return $this->final_dom;
    }

    /**
     * @return null
     */
    public function css_parser()
    {
        if (is_admin()) {
            return;
        }
        // используя флаг FILE_APPEND для дописывания содержимого в конец файла
        // array (
        //     0 => 'http://localhost/arteglex.com/wp-content/plugins/revslider/public/assets/fonts/material/material-icons.css?ver=6.3.9',
        //   )

        //exit;
        foreach ($this->css as $css) {

            $href = $this->remove_version_scripts_styles($css);
            $href = $this->url_for_regular_exp($href);

            $this->html_document = preg_replace("/(<link.*rel=[\"|\']stylesheet[\"|\'].*href=[\"|\']" . $href . ".*[\"|\'].*>)/i", "", $this->html_document);
            // $this->html_document = preg_replace("/(<link.*rel=[\"|\']preload[\"|\'].*href=[\"|\']" . $href . ".*[\"|\'].*>)/i", "", $this->html_document);
        }
    }

    /**
     * @return null
     */
    public function js_parser()
    {
        if (is_admin()) {
            return;
        }

        foreach ($this->js as $js) {
            $href = $this->remove_version_scripts_styles($js);
            $href = $this->url_for_regular_exp($href);

            $this->html_document = preg_replace("/(<script.*src=[\"|\']" . $href . ".*[\"|\'].*>)/i", "", $this->html_document);
        }
    }

    public function domOptimize($output)
    {
        //$criticalStyle = file_get_contents(ABSPATH.'wp-content/plugins/catch-google-bot/public/css/critical.css');
        $criticalStyle = Catch_Google_Bot::cgb_get_option( 'critical_css' );

        $is_preloader = Catch_Google_Bot::cgb_get_option( 'is_preloader' );

        $additional_js = Catch_Google_Bot::cgb_get_option( 'js' );


        $tags = Catch_Google_Bot::cgb_get_option( 'tags' );
        $tags = explode(',', $tags);

        $dom = new DOMDocument();
        @$dom->loadHTML($output);
        $body = $dom->getElementsByTagName('body')->item(0);
        $head = $dom->getElementsByTagName('head')->item(0);

        foreach ($tags as $tag){
            if($tag == 'link'){
                foreach (iterator_to_array($dom->getElementsByTagName('link')) as $node) {
                    if ($node->hasAttribute('href')) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }
            else{
                foreach (iterator_to_array($dom->getElementsByTagName($tag)) as $node) {
                    $node->parentNode->removeChild($node);
                }
            }
        }

        foreach (iterator_to_array($dom->getElementsByTagName('img')) as $node) {
            $node->setAttribute( 'loading', 'lazy' );
        }

        $criticalCss = $dom->createElement('style', $criticalStyle);
        $criticalCss->setAttribute('id', 'criticalCss');
        $head->insertBefore($criticalCss);

        $additionalJS = $dom->createElement('script', $additional_js);
        $head->insertBefore($additionalJS);

        if($is_preloader === 'on'){
            $pl_color = Catch_Google_Bot::cgb_get_option( 'pl_color' );
            $pl_img = Catch_Google_Bot::cgb_get_option( 'pl_img' );
            $preloader_style = "
            #preloader {
                    height: 100vh;
                    width: 100%;
                    z-index: 99999999;
                    position: fixed;
                    left: 0;
                    background-color: $pl_color;
                    top: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                #preloader:before {
                    content: '';
                    display: block!important;
                    height: 180px;
                    width: 180px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: contain;
                    background-image: url('$pl_img');
                    animation: animatePreloader .5s infinite alternate-reverse cubic-bezier(0,0,1,1);
                    position: relative;
                    z-index: 1;
                }
                @keyframes animatePreloader {
                    0% {
                        transform: translateY(5px);
                    }
                }
        ";

            $preloaderCss = $dom->createElement('style', $preloader_style);
            $preloaderCss->setAttribute('id', 'preloaderCss');
            $head->insertBefore($preloaderCss);

            $preloaderHtml = $dom->createElement('div');
            $preloaderHtml->setAttribute('id', 'preloader');
            $body->insertBefore($preloaderHtml);

            $preloaderScript = $dom->createElement('script', 'setTimeout(function(){document.getElementById("preloader").remove()}, 200)');
            $body->insertBefore($preloaderScript);
        }


        $newHtml = $dom->saveHtml();
        //return $pl_color;
        return $newHtml;
    }

    /**
     * // из  буфера сайта и переписать в нем css/js - сюда можно дописать свое
     * @return void
     */
    private function dom_parser()
    {
//        $this->css_parser();
//        $this->js_parser();

        $this->final_dom = $this->domOptimize($this->html_document);
    }

    /**
     * @param $url
     * @return mixed
     */
    private function remove_query_string($url)
    {
        $return_url = explode('?', $url);
        return $return_url[0];
    }

    /**
     * @url https://stackoverflow.com/questions/53929918/php-regex-how-to-replace-rel-stylesheet-to-rel-preload
     * @return void
     * @throws Exception
     */
    private function test()
    {

        // $html = '<link href="style.css" rel="stylesheet">';

        // libxml_use_internal_errors(true);
        // $dom = new DomDocument();
        // $dom->loadHTML($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        // $xpath = new DOMXPath($dom);

        // foreach ($xpath->query('//link[@rel="stylesheet"]') as $link) {
        //     // Insert a copy of link inside the <noscript>
        //     $noscript = $dom->createElement('noscript');
        //     $noscript->appendChild($link->cloneNode(true));
        //     $link->parentNode->insertBefore($noscript, $link->nextSibling);

        //     // Modify the link attributes
        //     $link->setAttribute('rel', 'preload');
        //     $link->setAttribute('as', 'style');
        //     $link->setAttribute('onload', "this.onload=null;this.rel='stylesheet'");
        // }

        // echo $dom->saveHTML();
    }
}
