<?php
/**
 * Server-side rendering of the `foxland/contact` block.
 *
 * @package FoxlandPlugin
 */

namespace FoxlandPlugin\Blocks;

/**
 * Renders the `foxland/contact` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the form HTML.
 */
function render_contact( $attributes ) {

	// Classes.
	$class = 'contact';

	if ( isset( $attributes['align'] ) && $attributes['align'] ) {
		$class .= ' align' . $attributes['align'];
	}

	if ( isset( $attributes['className'] ) && $attributes['className'] ) {
		$class .= ' ' . $attributes['className'];
	}

	ob_start();
	?>
		<div class="<?php echo esc_attr( $class ); ?>">
			<form name="contact" method="POST" action="/thank-you" netlify-honeypot="bot-field" data-netlify="true">
				<p hidden>
					<label for="bot-field"><?php esc_html_e( 'Don’t fill this out if you are human', 'foxland-plugin' ); ?></label>
					<input id="bot-field" name="bot-field">
				</p>
				<p>
					<label for="name"><?php esc_html_e( 'Your Name', 'foxland-plugin' ); ?></label>
					<input type="text" id="name" name="name">
				</p>
				<p>
					<label for="email"><?php esc_html_e( 'Your Email (required)', 'foxland-plugin' ); ?></label>
					<input type="email" id="email" name="email" required>
				</p>
				<p>
					<label for="message"><?php esc_html_e( 'Message (required)', 'foxland-plugin' ); ?></label>
					<textarea id="message" name="message" required></textarea>
				</p>
				<p>
					<button type="submit">Send</button>
				</p>
			</form>
		</div>

	<?php
	$content_markup = ob_get_clean();

	return $content_markup;
}

/**
 * Registers the `foxland/contact` block on server.
 */
function register_contact() {
	register_block_type(
		'foxland/contact',
		[
			'attributes'      => [
				'className' => [
					'type' => 'string',
				],
				'align'     => [
					'type' => 'string',
				],
			],
			'render_callback' => __NAMESPACE__ . '\render_contact',
		]
	);
}
add_action( 'init', __NAMESPACE__ . '\register_contact' );
