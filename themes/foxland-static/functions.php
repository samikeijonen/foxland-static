<?php
/**
 * WP Theme constants and setup functions
 *
 * @package FoxlandStatic
 */

// Useful global constants.
define( 'FOXLAND_STATIC_TEMPLATE_URL', get_template_directory_uri() );
define( 'FOXLAND_STATIC_PATH', get_template_directory() . '/' );
define( 'FOXLAND_STATIC_INC', FOXLAND_STATIC_PATH . 'includes/' );

require_once FOXLAND_STATIC_INC . 'core.php';
require_once FOXLAND_STATIC_INC . 'filters.php';
require_once FOXLAND_STATIC_INC . 'options.php';

// Run the setup functions.
FoxlandStatic\Core\setup();
