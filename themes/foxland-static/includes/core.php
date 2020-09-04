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
