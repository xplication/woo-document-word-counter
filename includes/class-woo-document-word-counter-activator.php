<?php

/**
 * @since      1.0.0
 * @package    Woocommerce_Price_Per_Word
 * @subpackage Woocommerce_Price_Per_Word/includes
 * @author     Iftodi Petru<petru.iftodi@xplication.ro>
 */
class Woocommerce_Price_Per_Word_Activator {

    /**
     * @since    1.0.0
     */
    public static function activate() {
        update_option('woocommerce_cart_redirect_after_add', 'yes');
    }

}
