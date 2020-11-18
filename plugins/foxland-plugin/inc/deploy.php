<?php
/**
 *  Deploy to Netlify.
 *
 * @package FoxlandPlugin\Options
 */

namespace FoxlandPlugin\Options;

/**
 * Get Netlify URL.
 */
function netlify_url() {
	$setting     = get_option( 'foxland_options' );
	$netlify_url = $setting['foxland_netlify_url'];

	return $netlify_url;
}

/**
 * Fire webhook.
 */
function fire_webhook() {
	$netlify_url = netlify_url();

	if ( empty( $netlify_url ) ) {
		return;
	}

	$webhook = wp_remote_post(
		esc_url( $netlify_url ),
		[
			'body' => [],
		]
	);

	return $webhook;
}

/**
 * Fire a Netlify build when post is transitioned to 'publish'.
 *
 * @param string   $new_status New post status.
 * @param string   $old_status Old post status.
 * @param \WP_Post $post      Post object.
 */
function deploy_when_published( $new_status, $old_status, $post ) {
	if ( 'publish' === $new_status && 'publish' !== $old_status ) {
		fire_webhook();
	}
}
add_action( 'transition_post_status', __NAMESPACE__ . '\deploy_when_published', 10, 3 );

/**
 * Fire a Netlify build when post is moved to trash.
 *
 * @param int $post_id Post ID.
 */
function deploy_when_trashed( $post_id ) {
	fire_webhook();
}
add_action( 'trashed_post', __NAMESPACE__ . '\deploy_when_trashed' );
