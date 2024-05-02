<?php

/**
 * @package    Woocommerce_Price_Per_Word
 * @subpackage Woocommerce_Price_Per_Word/admin
 * @author     Iftodi Petru<petru.iftodi@xplication.ro>
 */
class WooDocument_Word_Counter_Admin_Display {

    /**
     * Hook in methods
     * @since    1.0.0
     * @access   static
     */
    public static function init() {
        add_action('admin_menu', array(__CLASS__, 'wppw_add_settings_menu'));

        /**
         * Action - Add custom Price Breaks tab in WooCommerce product tabs
         * @since 1.2.0
         */
        add_action('woocommerce_product_write_panel_tabs', array(__CLASS__, 'custom_tab_price_per_word_character_settings'));

        /*
		 * Action - Add custom tab options in WooCommerce product tabs
		 * @since	1.2.0
		 */
        add_action('woocommerce_product_write_panels', array(__CLASS__, 'custom_tab_options_price_per_word_character_settings'));
    }

    /**
     * @since    1.0.0
     * @access   public
     */
    public static function wppw_add_settings_menu() {
        add_options_page('WooCommerce Price Per Word Options', 'WooCommerce Price Per Word', 'manage_options', 'woo-document-word-counter-option', array(__CLASS__, 'woocommerce_price_per_word_option'));
    }

    /**
     * @since    1.0.0
     * @access   public
     */
    public static function woocommerce_price_per_word_option() {
        $setting_tabs = apply_filters('WooDocument_Word_Counter_Admin_Setting_tab', array('general' => 'General', 'tools' => 'Tools'));
        $current_tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'general';
        ?>
        <h2 class="nav-tab-wrapper">
            <?php
            foreach ($setting_tabs as $name => $label)
                echo '<a href="' . admin_url('admin.php?page=woo-document-word-counter-option&tab=' . $name) . '" class="nav-tab ' . ($current_tab == $name ? 'nav-tab-active' : '') . '">' . $label . '</a>';
            ?>
        </h2>
        <?php
        foreach ($setting_tabs as $setting_tabkey => $setting_tabvalue) {
            switch ($setting_tabkey) {
                case $current_tab:
                    do_action('woocommerce_price_per_word_' . $setting_tabkey . '_setting_save_field');
                    do_action('woocommerce_price_per_word_' . $setting_tabkey . '_setting');
                    break;
            }
        }
    }

    public static function custom_tab_price_per_word_character_settings() {
        global $post;
        $_product = wc_get_product($post->ID);
        $is_enable_price_word_character = get_post_meta($_product->id, '_price_per_word_character_enable', TRUE);
        $class_hidden = empty($is_enable_price_word_character) ? 'custom_tab_woocommerce_price_word_character_tab_hidden' : ($is_enable_price_word_character == 'no' ? 'custom_tab_woocommerce_price_word_character_tab_hidden' : '');
        $_price_per_word_character = get_post_meta($_product->id, '_price_per_word_character', TRUE);
        $_price_per_word_character = ($_price_per_word_character) ? $_price_per_word_character : 'word';
        print(
            '<li id="custom_tab_woocommerce_price_word_character_tab" class="custom_tab_woocommerce_price_word_character_tab ' . $class_hidden . '"><a href="#custom_tab_data_woocommerce_price_word_character_tab">' . __('Price Per ' . ucwords($_price_per_word_character) . ' Settings', 'woo-document-word-counter') . '</a></li>'
        );
    }

    public static function custom_tab_options_price_per_word_character_settings() {
        do_action('custom_tab_options_price_per_word_character_settings_display');
    }

}

WooDocument_Word_Counter_Admin_Display::init();
