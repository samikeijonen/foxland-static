/**
 * WordPress dependencies
 */
const { InnerBlocks } = wp.editor;
const { Component } = wp.element;

/**
 * Module Constants
 */
const INNER_BLOCKS_TEMPLATE = [
	[ 'core/cover', {
		placeholder: __( 'Write title…' ),
	} ],
];

const INNER_BLOCKS_ALLOWED_BLOCKS = [ 'core/cover' ];

class FoxBlocksCoverGroup extends Component {
	constructor() {
		super( ...arguments );
	}

	render() {
		const {
			//attributes,
		} = this.props;

		return (
			<div className="fox-blocks-cover-group">
				<InnerBlocks
					allowedBlocks={ INNER_BLOCKS_ALLOWED_BLOCKS }
					template={ INNER_BLOCKS_TEMPLATE }
					templateLock={ false }
				/>
			</div>
		);
	}
}

export default FoxBlocksCoverGroup;
