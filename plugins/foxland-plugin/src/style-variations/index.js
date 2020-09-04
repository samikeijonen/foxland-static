// WordPress dependencies.
const { __ } = wp.i18n;

/**
 * Add new block style variants.
 *
 * For example classes `is-style-underlined` and `is-style-outline-rounded` to button block.
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#block-style-variations
 */
wp.domReady( () => {
	/**
	 * Unregister default and squared button styles.
	 * This way we can register them again with squared as default.
	 */
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	// This is squared.
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'default',
		label: __( 'Default', 'foxland' ),
		isDefault: true,
	} );

	// This was originally default by Core.
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'rounded',
		label: __( 'Rounded', 'foxland' ),
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'underlined',
		label: __( 'Underlined', 'foxland' ),
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'outline-rounded',
		label: __( 'Outline rounded', 'foxland' ),
	} );

	/* Paragraph styles. */
	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'ingress',
		label: __( 'Ingress', 'foxland' ),
	} );

	wp.blocks.registerBlockStyle( 'core/paragraph', {
		name: 'highlight',
		label: __( 'Highlight', 'foxland' ),
	} );

	/* Group styles. */
	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'diamond',
		label: __( 'Diamond', 'foxland' ),
	} );

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'inline',
		label: __( 'Inline', 'foxland' ),
	} );

	/* Heading styles. */
	wp.blocks.registerBlockStyle( 'core/heading', {
		name: 'small-font-size',
		label: __( 'Small font size', 'foxland' ),
	} );

	/* Column styles. */
	wp.blocks.registerBlockStyle( 'core/columns', {
		name: 'columns-card',
		label: __( 'Cards', 'foxland' ),
	} );

	/* Image styles. */
	wp.blocks.registerBlockStyle( 'core/image', {
		name: 'image-with-bg',
		label: __( 'With background', 'foxland' ),
	} );
} );
