/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { serverSideRender: ServerSideRender } = wp;

/**
 * Internal dependencies
 */
import icon from './icon';
import metadata from './block.json';

const { name, category, attributes } = metadata;

registerBlockType( name, {
	title: __( 'Contact form', 'foxland-plugin' ),
	description: __( 'Contact form outputted.', 'foxland-plugin' ),
	icon,
	keywords: [ __( 'contact', 'foxland-plugin' ), __( 'form', 'foxland-plugin' ) ],
	supports: {
		align: [ 'wide' ],
	},
	attributes,
	category,
	edit: function ( { attributes, className } ) {
		return (
			<div className={ className }>
				<ServerSideRender
					block="foxland/contact"
					attributes={ attributes }
				/>
			</div>
		);
	},
	save: function() {
		return null;
	},
} );
