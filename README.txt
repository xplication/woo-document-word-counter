=== WooCommerce Price Per Word ===
Contributors: angelleye
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=62B2PGEMVQEQY
Tags: woocommerce, price per word
Requires at least: 3.0.1
Tested up to: 4.5.3
Stable tag: 1.2.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Dynamic pricing for WooCommerce products based on the number of words or characters in an uploaded document.

== Description ==

= Introduction =

This plugin makes it easy to sell products or services based on a price-per-word or price-per-character.

 * Customers upload a document on the product page.
 * The word-count / character-count of the document is used to calculate the price based on the price-per-word / price-per-character entered for the product.
 * Customers continue with checkout like usual, and the document is included with the order item details.

= Get Involved =
Developers can contribute to the source code on the [WooCommerce Price Per Word Git repository on GitHub](https://github.com/angelleye/woo-document-word-counter).

= Automatic Installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don't need to leave your web browser. To do an automatic install of WooCommerce Price Per Word, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type WooCommerce Price Per Word and click Search Plugins. Once you've found our plugin you can view details about it such as the the rating and description. Most importantly, of course, you can install it by simply clicking Install Now?.

= Manual Installation =

1. Unzip the files and upload the folder into your plugins folder (/wp-content/plugins/) overwriting older versions if they exist.
2. Activate the plugin in your WordPress admin area.

== Frequently Asked Questions ==

= What document types are supported? =

 * .doc
 * .docx
 * .pdf
 * .txt

== Screenshots ==

1. Product edit screen in admin panel where you can enable Price Per Word.
2. Product page with 'price per word' displayed and the ability to upload a document.
3. Product page after document has been uploaded.  Displays QTY / number of words and the total price based on the price per word.
4. Document name displayed with link to document on cart page, order complete page, and admin order items details.

== Changelog ==

= 1.2.0 - 08.08.2016 =
* Tweak - IMPORTANT UPDATE- Moved the price per word/character option to the product level. ([#37](https://github.com/angelleye/woo-document-word-counter/issues/37))
* Feature - Adds a word/character count cap so a submission is rejected if it has too high a count. ([#26](https://github.com/angelleye/woo-document-word-counter/issues/26))
* Feature - Adds the option to setup price breaks, so the higher the count of words/characters the cheaper the price will be. ([#27](https://github.com/angelleye/woo-document-word-counter/issues/27))
* Feature - Adds shortcode functionality. ([#28](https://github.com/angelleye/woo-document-word-counter/issues/28))
* Feature - Adds compatibility for 3 decimal pricing. ([#30](https://github.com/angelleye/woo-document-word-counter/issues/30))
* Feature - Adds a filter hook so you can customize the "Price per Word" label. ([#32](https://github.com/angelleye/woo-document-word-counter/issues/32))
* Feature - Adds a bulk edit tool for easily adjusting Price Per Word/Character options on multiple products at once. ([#38](https://github.com/angelleye/woo-document-word-counter/issues/38))


= 1.1.2 - 06.26.2016 =
* Fix - WooCommerce 2.6 Compatibility. ([#33](https://github.com/angelleye/woo-document-word-counter/issues/33))

= 1.1.1 - 01.04.2016 =
* Fix - Resolves issue with minimum price setting. ([#25](https://github.com/angelleye/woo-document-word-counter/issues/25))

= 1.1.0 - 12.17.2015 =
* Tweak - Allows for pricing with more than 2 decimals. ([#17](https://github.com/angelleye/woo-document-word-counter/issues/17))
* Tweak - Allows for "price per character" as well as original "price per word". ([#18](https://github.com/angelleye/woo-document-word-counter/issues/18))
* Feature - Adds the option to set a minimum charge per item, so if a document only has a few words it would still charge the minimum. ([#21](https://github.com/angelleye/woo-document-word-counter/issues/21))
* Feature - Adds an option you can enable so that buyers can simply enter a QTY and won't be forced to upload a document. ([#19](https://github.com/angelleye/woo-document-word-counter/issues/19))
* Fix - General code improvements and bug fixes.

= 1.0.0 - 10.20.2015 =
* Initial stable release.