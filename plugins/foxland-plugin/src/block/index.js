/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { Component } = wp.element;
const { InnerBlocks } = wp.blockEditor;

/**
 * Internal dependencies
 */
//import edit from './edit';
import icon from './icon';
import metadata from './block.json';

const { name, category, attributes } = metadata;

/**
 * Module Constants
 */
const INNER_BLOCKS_TEMPLATE = [
	[ 'core/cover' ],
	[ 'core/cover' ],
];

const INNER_BLOCKS_ALLOWED_BLOCKS = [ 'core/cover' ];

class FoxBlocksCoverGroup extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		const {
			attributes,
		} = this.props;

		return (
			<div className="fox-blocks-cover-group">
				<div className="fox-blocks-cover-group__wrapper">
					<InnerBlocks
						allowedBlocks={ INNER_BLOCKS_ALLOWED_BLOCKS }
						template={ INNER_BLOCKS_TEMPLATE }
						templateLock={ false }
					/>
				</div>
			</div>
		);
	}
}

registerBlockType( name, {
	title: __( 'Cover Group', 'fox-blocks-cover-group' ),
	description: __( 'Add group of images or videos with a text overlay.', 'fox-blocks-cover-group' ),
	icon,
	keywords: [ __( 'cover', 'fox-blocks-cover-group' ), __( 'group', 'fox-blocks-cover-group' ) ],
	supports: {
		align: [ 'wide', 'full' ],
	},
	attributes,
	category,
	edit: FoxBlocksCoverGroup,
	save( attributes ) {
		return (
			<div className="fox-blocks-cover-group">
				<div className="fox-blocks-cover-group__wrapper">
					<InnerBlocks.Content />
				</div>
			</div>
		);
	},
} );
