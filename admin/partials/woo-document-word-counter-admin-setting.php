<?php

/**
 * @class       Woocommerce_Price_Per_Word_Setting
 * @version    1.0
 * @package    woo-document-word-counter
 * @category    Class
 * @author      Angell EYE <service@angelleye.com>
 */
class Woocommerce_Price_Per_Word_Setting {

    /**
     * Hook in methods
     * @since    1.0.0
     * @access   static
     */
    public static function init() {

        add_action('woocommerce_price_per_word_general_setting', array(__CLASS__, 'woocommerce_price_per_word_general_setting'));
        add_action('woocommerce_price_per_word_general_setting_save_field', array(__CLASS__, 'woocommerce_price_per_word_general_setting_save_field'));

        add_action('woocommerce_price_per_word_tools_setting', array(__CLASS__, 'woocommerce_price_per_word_tools_setting'));
    }

    public static function woocommerce_price_per_word_general_setting_fields() {

        $fields[] = array('title' => __('WooCommerce Price Per Word Settings', 'woo-document-word-counter'), 'type' => 'title', 'desc' => '', 'id' => 'general_options');

        $fields[] = array(
            'title' => __('QTY Accessibility', 'woo-document-word-counter'),
            'desc' => __('Allow buyers to enter a QTY instead of forcing a document upload.', 'woo-document-word-counter'),
            'id' => 'aewcppw_allow_users_to_enter_qty',
            'default' => 'no',
            'type' => 'checkbox',
        );

        $fields[] = array(
            'title' => __('Minimum Price', 'woo-document-word-counter'),
            'desc' => __('Set a global minimum price so that if a document does not have enough words / characters, the minimum will still be charged.  This can also be set at the product level, which would override this global setting.', 'woo-document-word-counter'),
            'id' => '_minimum_product_price',
            'type' => 'text',
        );

        $fields[] = array(
            'title' => __('Product Page Message', 'woo-document-word-counter'),
            'desc' => __('', 'woo-document-word-counter'),
            'id' => 'aewcppw_product_page_message',
            'type' => 'textarea',
            'css' => 'min-width:300px;',
            'default' => 'Please upload your .doc, .docx, .pdf or .txt to get a price.'
        );

        $fields[] = array('type' => 'sectionend', 'id' => 'general_options');

        return $fields;
    }

    public static function woocommerce_price_per_word_general_setting() {
        $wppw_setting_fields = self::woocommerce_price_per_word_general_setting_fields();
        $Html_output = new Woocommerce_Price_Per_Word_Html_output();
        ?>
        <form id="woocommerce_price_per_word_form" enctype="multipart/form-data" action="" method="post">
            <?php $Html_output->init($wppw_setting_fields); ?>
            <p class="submit">
                <input type="submit" name="woocommerce_price_per_word_integration" class="button-primary"
                       value="<?php esc_attr_e('Save changes', 'woo-document-word-counter'); ?>"/>
            </p>
        </form>
        <?php
    }


    public static function woocommerce_price_per_word_general_setting_save_field() {
        $wppw_setting_fields = self::woocommerce_price_per_word_general_setting_fields();
        $Html_output = new Woocommerce_Price_Per_Word_Html_output();
        $Html_output->save_fields($wppw_setting_fields);
    }

    public static function woocommerce_price_per_word_tools_setting() {
        // WooCommerce product categories
        $taxonomy = 'product_cat';
        $orderby = 'name';
        $show_count = 0;      // 1 for yes, 0 for no
        $pad_counts = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title = '';
        $empty = 0;

        $args = array(
            'taxonomy' => $taxonomy,
            'orderby' => $orderby,
            'show_count' => $show_count,
            'pad_counts' => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li' => $title,
            'hide_empty' => $empty
        );
        $product_cats = get_categories($args);

        // Tools - Bulk enable/disable offers
        $processed = (isset($_GET['processed'])) ? $_GET['processed'] : FALSE;
        if ($processed) {
            if ($processed == 'zero') {
                echo '<div class="updated">';
                echo '<p>' . sprintf(__('Action completed; %s records processed.', 'woo-document-word-counter'), '0');
                echo '</div>';
            } else {
                echo '<div class="updated">';
                echo '<p>' . sprintf(__('Action completed; %s records processed. ', 'woo-document-word-counter'), $processed);
                echo '</div>';
            }
        }
        ?>

        <div class="ppw_wrap_tools">
            <form id="ppw_tool_enable_price_per_words_characters" autocomplete="off"
                  action="<?php echo admin_url('admin.php?page=woo-document-word-counter-option&tab=tools'); ?>"
                  method="post">
                <div class="ppw-enable-price-per-words-characters">
                    <h3><?php echo __('Bulk Edit Tool for Enable or Disable the Price per Words/Characters', 'woo-document-word-counter'); ?></h3>
                    <div><?php echo __('Select from the options below to enable or disable Price per Words/Characters.', 'woo-document-word-counter'); ?></div>

                    <div class="ppw-tool-bulk-action-section ppw-bulk-tool-action-type">
                        <label
                            for="ppw-bulk-tool-action-type"><?php echo __('Action', 'woo-document-word-counter'); ?></label>
                        <div>
                            <select name="ppw_bulk_tool_action_type" id="ppw-bulk-tool-action-type" required="required">
                                <option
                                    value=""><?php echo __('- Select option', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="enable_price_per_words"><?php echo __('Enable Price per Word', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="enable_price_per_characters"><?php echo __('Enable Price per Character', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="disable_price_per_words_chacacters"><?php echo __('Disable Price per Word / Character', 'woo-document-word-counter'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="ppw-tool-bulk-action-section ppw-bulk-tool-action-target-type">
                        <label
                            for="ppw-bulk-tool-action-target-type"><?php echo __('Target', 'woo-document-word-counter'); ?></label>
                        <div>
                            <select name="ppw_bulk_tool_action_target-type" id="ppw-bulk-tool-action-target-type"
                                    required="required">
                                <option
                                    value=""><?php echo __('- Select option', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="all"><?php echo __('All products', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="featured"><?php echo __('Featured products', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="where"><?php echo __('Where...', 'woo-document-word-counter'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="ppw-tool-bulk-action-section ppw-bulk-tool-action-target-where-type angelleye-hidden">
                        <label
                            for="ppw-bulk-tool-action-target-where-type"><?php echo __('Where', 'woo-document-word-counter'); ?></label>
                        <div>
                            <select name="ppw_bulk_tool_action_target_where_type"
                                    id="ppw-bulk-tool-action-target-where-type">
                                <option
                                    value=""><?php echo __('- Select option', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="category"><?php echo __('Category...', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="product_type"><?php echo __('Product type...', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="price_greater"><?php echo __('Price greater than...', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="price_less"><?php echo __('Price less than...', 'woo-document-word-counter'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="ppw-tool-bulk-action-section ppw-bulk-tool-target-where-category angelleye-hidden">
                        <label
                            for="ppw-bulk-tool-target-where-category"><?php echo __('Category', 'woo-document-word-counter'); ?></label>
                        <div>
                            <select name="ppw_bulk_tool_target_where_category" id="ppw-bulk-tool-target-where-category">
                                <option
                                    value=""><?php echo __('- Select option', 'woo-document-word-counter'); ?></option>
                                <?php
                                if ($product_cats) {
                                    foreach ($product_cats as $cat) {
                                        echo '<option value="' . $cat->slug . '">' . $cat->cat_name . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div
                        class="ppw-tool-bulk-action-section ppw-bulk-tool-target-where-product-type angelleye-hidden">
                        <label for="ppw-bulk-tool-target-where-product-type">Product type</label>
                        <div>
                            <select name="ppw_bulk_tool_target_where_product_type"
                                    id="ppw-bulk-tool-target-where-product-type">
                                <option
                                    value=""><?php echo __('- Select option', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="simple"><?php echo __('Simple', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="variable"><?php echo __('Variable', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="grouped"><?php echo __('Grouped', 'woo-document-word-counter'); ?></option>
                                <option
                                    value="external"><?php echo __('External', 'woo-document-word-counter'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div
                        class="ppw-tool-bulk-action-section ppw-bulk-tool-action-target-where-price-value angelleye-hidden">
                        <label for="ppw-bulk-tool-action-target-where-price-value"></label>
                        <div>
                            <input type="text" name="ppw_bulk_tool_action_target_where_price_value"
                                   id="ppw-bulk-tool-action-target-where-price-value">
                        </div>
                    </div>

                    <div class="ppw-tool-bulk-action-section">
                        <label for="bulk_enable_disable_price_per_word_character_tool_submit"></label>
                        <div>
                            <button class="button button-primary" id="ppw-tool-bulk-submit"
                                    name="ppw-tool-bulk_submit"><?php echo __('Process', 'woo-document-word-counter'); ?></button>
                        </div>
                    </div>
                    <div class="angelleye-offers-clearfix"></div>

                </div>
            </form>
        </div>
        <?php
    }

}

Woocommerce_Price_Per_Word_Setting::init();
