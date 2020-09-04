<?php
/**
 * Server-side rendering of the `foxland/latest-posts` block.
 *
 * @package FoxlandPlugin
 */

namespace FoxlandPlugin\Blocks;

use function Foxland\get_svg;
use function Hybrid\View\display;

/**
 * Renders the `foxland/latest-posts` block on server.
 *
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with remote posts added.
 */
function render_latest_posts( $attributes ) {
	$args = [
		'post_type'              => 'post',
		'posts_per_page'         => 5,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	];

	$latest_posts = new \WP_Query( $args );

	// Classes.
	$class = 'latest-posts';

	if ( isset( $attributes['align'] ) && $attributes['align'] ) {
		$class .= ' align' . $attributes['align'];
	}

	if ( isset( $attributes['className'] ) && $attributes['className'] ) {
		$class .= ' ' . $attributes['className'];
	}

	ob_start();
	if ( $latest_posts->have_posts() ) :
		?>
		<div class="<?php echo esc_attr( $class ); ?>">
		<?php
		$k = 0;
		while ( $latest_posts->have_posts() ) :
			$latest_posts->the_post();

			$iterator = $latest_posts->current_post;
			?>
			<article class="entry entry--layout">
				<?php
				if ( 0 === $iterator && has_post_thumbnail() ) :
					?>
					<figure class="entry__thumbnail">
						<a class="entry__thumbnail-link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
							<?php echo wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), 'post-thumbnail' ); ?>
						</a>
					</figure>
				<?php endif; ?>

				<header class="entry__header">
					<h2 class="entry__title<?php echo 0 !== $iterator ? ' h3' : ''; ?>"><a class="decoration-none h-decoration-underline color-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<div class="entry__byline fw-500">
						<?php
							echo sprintf(
								'<time class="entry__published" datetime="%s">%s</time>',
								esc_attr( get_the_date( DATE_W3C ) ),
								get_the_date()
							);
						?>
					</div>
				</header>

				<?php if ( 0 === $iterator ) : ?>
					<div class="entry__summary mt-2">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; ?>
			</article>
			<?php
			$k++;
		endwhile;
		?>
		</div>
		<?php
	endif;
	wp_reset_postdata();
	?>

	<?php
	$content_markup = ob_get_clean();

	return $content_markup;
}

/**
 * Registers the `foxland/latest-posts` block on server.
 */
function register_block_remote_posts() {
	register_block_type(
		'foxland/latest-posts',
		[
			'attributes'      => [
				'className' => [
					'type' => 'string',
				],
				'align'     => [
					'type' => 'string',
				],
			],
			'render_callback' => __NAMESPACE__ . '\render_latest_posts',
		]
	);
}
add_action( 'init', __NAMESPACE__ . '\register_block_remote_posts' );
