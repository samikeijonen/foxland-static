<?php
/**
 * File for registering custom post types.
 *
 * @package    CustomContentPortfolio
 * @subpackage Includes
 * @author     Justin Tadlock <justintadlock@gmail.com>
 * @copyright  Copyright (c) 2013-2017, Justin Tadlock
 * @link       https://themehybrid.com/plugins/custom-content-portfolio
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace FoxlandPlugin\PostTypes;

/**
 * Registers post types needed by the foxland.fi.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function register_post_types() {
	$theme_labels = [
		'name'                  => esc_html_x( 'Themes', 'Post Type General Name', 'foxland-plugin' ),
		'singular_name'         => esc_html_x( 'Theme', 'Post Type Singular Name', 'foxland-plugin' ),
		'menu_name'             => esc_html__( 'Themes', 'foxland-plugin' ),
		'name_admin_bar'        => esc_html__( 'Theme', 'foxland-plugin' ),
		'archives'              => esc_html__( 'Theme Archives', 'foxland-plugin' ),
		'attributes'            => esc_html__( 'Theme Attributes', 'foxland-plugin' ),
		'parent_item_colon'     => esc_html__( 'Theme Item:', 'foxland-plugin' ),
		'all_items'             => esc_html__( 'All Themes', 'foxland-plugin' ),
		'add_new_item'          => esc_html__( 'Add New Theme', 'foxland-plugin' ),
		'add_new'               => esc_html__( 'Add New Theme', 'foxland-plugin' ),
		'new_item'              => esc_html__( 'New Theme', 'foxland-plugin' ),
		'edit_item'             => esc_html__( 'Edit Theme', 'foxland-plugin' ),
		'update_item'           => esc_html__( 'Update Theme', 'foxland-plugin' ),
		'view_item'             => esc_html__( 'View Theme', 'foxland-plugin' ),
		'view_items'            => esc_html__( 'View Themes', 'foxland-plugin' ),
		'search_items'          => esc_html__( 'Search Theme', 'foxland-plugin' ),
		'not_found'             => esc_html__( 'Not found', 'foxland-plugin' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'foxland-plugin' ),
		'featured_image'        => esc_html__( 'Featured Image', 'foxland-plugin' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'foxland-plugin' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'foxland-plugin' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'foxland-plugin' ),
		'insert_into_item'      => esc_html__( 'Insert into theme', 'foxland-plugin' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this theme', 'foxland-plugin' ),
		'items_list'            => esc_html__( 'Themes list', 'foxland-plugin' ),
		'items_list_navigation' => esc_html__( 'Themes list navigation', 'foxland-plugin' ),
		'filter_items_list'     => esc_html__( 'Filter themes list', 'foxland-plugin' ),
	];

	$doc_labels = [
		'name'                  => esc_html_x( 'Docs', 'Post Type General Name', 'foxland-plugin' ),
		'singular_name'         => esc_html_x( 'Doc', 'Post Type Singular Name', 'foxland-plugin' ),
		'menu_name'             => esc_html__( 'Docs', 'foxland-plugin' ),
		'name_admin_bar'        => esc_html__( 'Doc', 'foxland-plugin' ),
		'archives'              => esc_html__( 'Doc Archives', 'foxland-plugin' ),
		'attributes'            => esc_html__( 'Doc Attributes', 'foxland-plugin' ),
		'parent_item_colon'     => esc_html__( 'Doc Item:', 'foxland-plugin' ),
		'all_items'             => esc_html__( 'All Docs', 'foxland-plugin' ),
		'add_new_item'          => esc_html__( 'Add New Doc', 'foxland-plugin' ),
		'add_new'               => esc_html__( 'Add New Doc', 'foxland-plugin' ),
		'new_item'              => esc_html__( 'New Doc', 'foxland-plugin' ),
		'edit_item'             => esc_html__( 'Edit Doc', 'foxland-plugin' ),
		'update_item'           => esc_html__( 'Update Doc', 'foxland-plugin' ),
		'view_item'             => esc_html__( 'View Doc', 'foxland-plugin' ),
		'view_items'            => esc_html__( 'View Docs', 'foxland-plugin' ),
		'search_items'          => esc_html__( 'Search Doc', 'foxland-plugin' ),
		'not_found'             => esc_html__( 'Not found', 'foxland-plugin' ),
		'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'foxland-plugin' ),
		'featured_image'        => esc_html__( 'Featured Image', 'foxland-plugin' ),
		'set_featured_image'    => esc_html__( 'Set featured image', 'foxland-plugin' ),
		'remove_featured_image' => esc_html__( 'Remove featured image', 'foxland-plugin' ),
		'use_featured_image'    => esc_html__( 'Use as featured image', 'foxland-plugin' ),
		'insert_into_item'      => esc_html__( 'Insert into doc', 'foxland-plugin' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this doc', 'foxland-plugin' ),
		'items_list'            => esc_html__( 'Docs list', 'foxland-plugin' ),
		'items_list_navigation' => esc_html__( 'Docs list navigation', 'foxland-plugin' ),
		'filter_items_list'     => esc_html__( 'Filter docs list', 'foxland-plugin' ),
	];

	$supports = [
		'editor',
		'excerpt',
		'author',
		'thumbnail',
		'title',
	];

	$theme_args = [
		'label'               => esc_html__( 'Theme', 'foxland-plugin' ),
		'description'         => esc_html__( 'Accessible Themes by Foxland', 'foxland-plugin' ),
		'labels'              => $theme_labels,
		'supports'            => $supports,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'can_export'          => true,
		'has_archive'         => 'themes',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',

		// The rewrite handles the URL structure.
		'rewrite'             => [
			'with_front' => false,
		],
	];

	$doc_args = [
		'label'               => esc_html__( 'Doc', 'foxland-plugin' ),
		'description'         => esc_html__( 'Documentation by Foxland', 'foxland-plugin' ),
		'labels'              => $doc_labels,
		'supports'            => $supports,
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'show_in_rest'        => true,
		'can_export'          => true,
		'has_archive'         => 'docs',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',

		// The rewrite handles the URL structure.
		'rewrite'             => [
			'with_front' => false,
		],
	];

	register_post_type( 'theme', $theme_args );
	register_post_type( 'doc', $doc_args );
}
add_action( 'init', __NAMESPACE__ . '\register_post_types', 0 );
