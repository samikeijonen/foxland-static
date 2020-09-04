/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { ServerSideRender } = wp.components;

/**
 * Internal dependencies
 */
import icon from './icon';
import metadata from './block.json';

const { name, category, attributes } = metadata;

registerBlockType( name, {
	title: __( 'Foxland Latest Posts', 'foxland-plugin' ),
	description: __( 'Latest posts.', 'foxland-plugin' ),
	icon,
	keywords: [ __( 'latest', 'foxland-plugin' ), __( 'posts', 'foxland-plugin' ) ],
	supports: {
		align: [ 'wide', 'full' ],
	},
	attributes,
	category,
	edit: function ( { attributes, className, setAttributes } ) {
		return (
			<div className={ className }>
				<ServerSideRender
					block="foxland/latest-posts"
					attributes={ attributes }
				/>
			</div>
		);
	},
	save: function() {
		return null;
	},
} );
