<?php
/**
 *  Filters.
 *
 * @package FoxlandStatic\Filters
 */

namespace FoxlandStatic\Filters;

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	return ' &hellip;';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more' );

/**
 * Add quote icon to blockquote.
 *
 * @param  string $block_content The block content about to be appended.
 * @param  array  $block         The full block, including name and attributes.
 * @return string $block_content Modified block content.
 */
function render_block( $block_content, $block ) {
	if ( 'core/quote' === $block['blockName'] ) {
		$block_content = str_replace(
			'</blockquote>',
			'<svg class="icon icon--quotes-left" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
		<path d="M7.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.357-0.056 0.724-0.086 1.097-0.086zM25.031 14c3.866 0 7 3.134 7 7s-3.134 7-7 7-7-3.134-7-7l-0.031-1c0-7.732 6.268-14 14-14v4c-2.671 0-5.182 1.040-7.071 2.929-0.364 0.364-0.695 0.751-0.995 1.157 0.358-0.056 0.724-0.086 1.097-0.086z"></path>
		</svg>' . '</blockquote>',
			$block_content
		);
	}

	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\render_block', 10, 2 );

/**
 * Fire a Netlify build when post is transitioned to 'publish'.
 *
 * @param string   $new_status New post status.
 * @param string   $old_status Old post status.
 * @param \WP_Post $post      Post object.
 */
function deploy_live( $new_status, $old_status, $post ) {
	$setting     = get_option( 'foxland_options' );
	$netlify_url = $setting['foxland_netlify_url'];

	if ( 'publish' === $new_status && 'publish' !== $old_status && ! empty( $netlify_url ) ) {
		wp_remote_post(
			esc_url( $netlify_url ),
			[
				'body' => [],
			]
		);
	}
}
add_action( 'transition_post_status', __NAMESPACE__ . '\deploy_live', 10, 3 );
