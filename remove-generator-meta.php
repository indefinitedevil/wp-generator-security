<?php
/*
  Plugin Name: Remove Generator Meta
  Plugin URI: https://www.drunkoncaffeine.com/
  Description: Removes the generator meta tags.
  Author: indefinitedevil
  Version: 1.0
  Author URI: https://www.drunkoncaffeine.com/
 */

class Generator_Security {
    public static function setup() {
        remove_action('wp_head', 'wp_generator');
        add_filter('get_the_generator_html', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_xhtml', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_atom', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_rss2', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_rdf', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_comment', array(self::class, 'remove_generator'), 99);
        add_filter('get_the_generator_export', array(self::class, 'remove_generator'), 99);

        add_action('wp_enqueue_scripts', array(self::class, 'enqueue_scripts'));
        //add_action('admin_enqueue_scripts', array(self::class, 'enqueue_scripts'));
    }

    public static function remove_generator() {
        return '';
    }
}

add_action('plugins_loaded', array(Generator_Security::class, 'setup'));
