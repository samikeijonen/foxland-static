<?php
/**
 * Core setup, site hooks and filters.
 *
 * @package FoxlandStatic\Core
 */

namespace FoxlandStatic\Core;

/**
 * Set up theme defaults and register supported WordPress features.
 *
 * @return void
 */
function setup() {
	$n = function( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'after_setup_theme', $n( 'theme_setup' ) );
	add_action( 'wp_enqueue_scripts', $n( 'scripts_styles' ) );
	add_action( 'enqueue_block_editor_assets', $n( 'editor_scripts_styles' ) );
	add_action( 'enqueue_block_assets', $n( 'block_scripts_styles' ) );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function theme_setup() {
	add_theme_support( 'post-thumbnails' );

	/**
		 * Add support for editor color palette.
		 *
		 * Outputted class name are .has-{slug}-background-color and .has-{slug}-color.
		 *
		 * For example .has-main-background-color and .has-main-color.
		 */
		add_theme_support(
			'editor-color-palette',
			[
				[
					'name'  => esc_html__( 'Main', 'foxland' ),
					'slug'  => 'main',
					'color' => 'hsl(182, 40%, 45%)',
				],
				[
					'name'  => esc_html__( 'Dark', 'foxland' ),
					'slug'  => 'dark',
					'color' => 'hsl(182, 82%, 7%)',
				],
				[
					'name'  => esc_html__( 'White', 'foxland' ),
					'slug'  => 'white',
					'color' => 'hsl(0, 0%, 100%)',
				],
				[
					'name'  => esc_html__( 'Light', 'foxland' ),
					'slug'  => 'light',
					'color' => 'hsl(0, 0%, 93%)',
				],
				[
					'name'  => esc_html__( 'Grey', 'foxland' ),
					'slug'  => 'grey',
					'color' => 'hsla(0, 0%, 0%, 0.6)',
				],
			]
		);

		/**
		 * Add support for editor font sizes.
		 *
		 * Outputted class name is .has-{slug}-font-size.
		 *
		 * For example .has-small-font-size.
		 */
		add_theme_support(
			'editor-font-sizes',
			[
				[
					'name' => esc_html__( 'Small', 'foxland' ),
					'size' => 14,
					'slug' => 'small',
				],
				[
					'name' => esc_html__( 'Medium', 'foxland' ),
					'size' => 20,
					'slug' => 'medium',
				],
				[
					'name' => esc_html__( 'Large', 'foxland' ),
					'size' => 24,
					'slug' => 'large',
				],
				[
					'name' => esc_html__( 'Larger', 'foxland' ),
					'size' => 40,
					'slug' => 'larger',
				],
			]
		);

		// Add support for align wide blocks.
		add_theme_support( 'align-wide' );

		// Set the `post-thumbnail` size.
		set_post_thumbnail_size( 972, 600, true );
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @return void
 */
function scripts_styles() {
	// Dequeue Core block styles.
	wp_dequeue_style( 'wp-block-library' );
}

/**
 * Enqueue scripts and styles for editor.
 *
 * @return void
 */
function editor_scripts_styles() {
	if ( wp_get_environment_type() === 'local' ) {
		$editor_url = 'http://localhost:8080/assets/editor.css';
	} else {
		$editor_url = 'https://foxland.fi/assets/editor.css';
	}

	// Editor styles.
	wp_enqueue_style( 'editor-style', esc_url( $editor_url ), null, null );

}

/**
 * Enqueue scripts and styles for front-end and editor.
 *
 * @return void
 */
function block_scripts_styles() {
	// Overwrite Core block styles with empty styles.
	wp_deregister_style( 'wp-block-library' );
	wp_register_style( 'wp-block-library', '' );

	// Overwrite Core theme styles with empty styles.
	wp_deregister_style( 'wp-block-library-theme' );
	wp_register_style( 'wp-block-library-theme', '' );

}
