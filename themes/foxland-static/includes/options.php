<?php
/**
 *  Options.
 *
 * @package FoxlandStatic\Options
 */

//namespace FoxlandStatic\Options;

/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * Custom option and settings.
 */
function foxland_settings_init() {
	// Register a new setting for "foxland" page.
	$args = [
    	'sanitize_callback' => 'esc_url_raw',
	];

    register_setting( 'foxland', 'foxland_options' );

    // Register a new section in the "foxland" page.
    add_settings_section(
        'foxland_section_developers',
        esc_html__( 'Settings for Foxland site.', 'foxland' ), 'foxland_section_developers_callback',
        'foxland'
    );

    // Register a new field in the "foxland_section_developers" section, inside the "foxland" page.
    add_settings_field(
        'foxland_netlify_url', // As of WP 4.6 this value is used only internally.
        // Use $args' label_for to populate the id inside the callback.
        esc_html__( 'Netlify API URL', 'foxland' ),
        'foxland_field_netlify_cb',
        'foxland',
        'foxland_section_developers',
        [
            'label_for'           => 'foxland_netlify_url',
            'class'               => 'foxland_row',
		]
    );
}
/**
 * Register our foxland_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'foxland_settings_init' );


/**
 * Custom option and settings:
 *  - callback functions
 */


/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function foxland_section_developers_callback( $args ) {
    ?>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Enter Netlify API URL.', 'foxland' ); ?></p>
    <?php
}

/**
 * Input field.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function foxland_field_netlify_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'foxland_options' );
    ?>
    <input
		type="text"
        id="<?php echo esc_attr( $args['label_for'] ); ?>"
        name="foxland_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		value="<?php echo isset( $options[ $args['label_for'] ] ) ? esc_url( $options[ $args['label_for'] ] ) : ''; ?>"
	>

    <?php
}

/**
 * Add the top level menu page.
 */
function foxland_options_page() {
    add_submenu_page(
		'options-general.php',
        esc_html__( 'Foxland Options', 'foxland' ),
        esc_html__( 'Foxland Options', 'foxland' ),
        'manage_options',
        'foxland',
        'foxland_options_page_html'
    );
}
/**
 * Register our foxland_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'foxland_options_page' );


/**
 * Top level menu callback function
 */
function foxland_options_page_html() {
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    // add error/update messages

    // show error/update messages
    settings_errors( 'foxland_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            // output security fields for the registered setting "foxland"
            settings_fields( 'foxland' );
            // output setting sections and their fields
            // (sections are registered for "foxland", each field is registered to a specific section)
            do_settings_sections( 'foxland' );
            // output save settings button
            submit_button( 'Save Settings', 'foxland' );
            ?>
        </form>
    </div>
    <?php
}