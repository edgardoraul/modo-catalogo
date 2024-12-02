<?php
/**
 * Plugin Name: WooCommerce Modo Catálogo
 * Description: Activa o desactiva el modo catálogo para WooCommerce.
 * Version: 1.0
 * Author: ...:: WebModerna | Estudio Contable y Agencia Web ::...
 * Author URI:  https://webmoderna.com.ar/
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Registrar la opción de activar/desactivar modo catálogo
require_once plugin_dir_path(__FILE__) . 'admin-settings.php';

// Aplicar el modo catálogo si está activado
function wc_catalog_mode() {
    if (!get_option('wc_catalog_mode_enabled')) {
        return;
    }

    // Ocultar botón "Añadir al carrito"
    add_filter('woocommerce_is_purchasable', '__return_false');
    add_filter('woocommerce_loop_add_to_cart_link', '__return_empty_string');
    add_filter('woocommerce_single_add_to_cart_text', '__return_empty_string');

    // Eliminar enlaces al carrito
    add_filter('woocommerce_get_price_html', '__return_empty_string');
}
add_action('init', 'wc_catalog_mode');