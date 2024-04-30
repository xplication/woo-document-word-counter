<?php

/**
 * @wordpress-plugin
 * Plugin Name:       WooDocument Word Counter
 * Plugin URI:        https://www.angelleye.com/
 * Description:       Allow users to upload a document to calculate a price based on the 'price-per-word' set for the product/service.
 * Version:           1.0.0
 * Author:            Xplication by Iftodi Petru
 * Author URI:        https://xplication.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woo-document-word-counter
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
if (!defined('PPW_PLUGIN_URL')) {
    define('PPW_PLUGIN_URL', plugin_dir_url(__FILE__));
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-document-word-counter-activator.php
 */
function activate_woocommerce_price_per_word() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-woo-document-word-counter-activator.php';
    Woocommerce_Price_Per_Word_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-document-word-counter-deactivator.php
 */
function deactivate_woocommerce_price_per_word() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-woo-document-word-counter-deactivator.php';
    Woocommerce_Price_Per_Word_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_woocommerce_price_per_word');
register_deactivation_hook(__FILE__, 'deactivate_woocommerce_price_per_word');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-woo-document-word-counter.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

add_action('plugins_loaded', 'wppw_plugins_init', 0);

function run_woocommerce_price_per_word() {

    $plugin = new Woocommerce_Price_Per_Word();
    $plugin->run();
}

function wppw_plugins_init() {
    run_woocommerce_price_per_word();
}
