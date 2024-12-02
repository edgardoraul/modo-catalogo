<?php
// Crear página de configuración
function wc_catalog_mode_settings_page() {
    add_options_page(
        'Modo Catálogo',
        'Modo Catálogo',
        'manage_options',
        'wc-catalog-mode',
        'wc_catalog_mode_settings_page_html'
    );
}
add_action('admin_menu', 'wc_catalog_mode_settings_page');

// Mostrar HTML de configuración
function wc_catalog_mode_settings_page_html() {
    if (!current_user_can('manage_options')) {
        return;
    }

    if (isset($_POST['wc_catalog_mode_submit'])) {
        $enabled = isset($_POST['wc_catalog_mode_enabled']) ? 1 : 0;
        update_option('wc_catalog_mode_enabled', $enabled);
    }

    $checked = get_option('wc_catalog_mode_enabled') ? 'checked' : '';
    ?>
    <div class="wrap">
        <h1>Modo Catálogo</h1>
        <form method="post" action="">
            <?php wp_nonce_field('wc_catalog_mode_settings'); ?>
            <label for="wc_catalog_mode_enabled">
                <input type="checkbox" id="wc_catalog_mode_enabled" name="wc_catalog_mode_enabled" value="1" <?php echo $checked; ?>>
                Activar Modo Catálogo
            </label>
            <br><br>
            <input type="submit" name="wc_catalog_mode_submit" class="button-primary" value="Guardar cambios">
        </form>
    </div>    
   <?php
}