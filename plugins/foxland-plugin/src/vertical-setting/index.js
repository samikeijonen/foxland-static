/**
 * External dependencies
 */
 import classnames from 'classnames';

 const { __ } = wp.i18n;

 const { createHigherOrderComponent } = wp.compose;
 const { Fragment } = wp.element;
 const { InspectorControls } = wp.blockEditor;
 const {
	 PanelBody,
	 RadioControl,
 } = wp.components;

 /**
 * Add margin top attribute.
 *
 * @param {Object} settings Settings for the block.
 * @param {string} name     Blocks name.
 *
 * @return {Object} settings Modified settings.
 */
 function addMarginAttributes( settings, name ) {
	 if ( ! name.startsWith( 'core' ) ) {
		 return settings;
	 }

	 if ( settings.attributes ) {
		 settings.attributes.topMargin = {
			 type: 'string',
			 default: 'mt-md',
		 };
	 }

	 return settings;
 }

 wp.hooks.addFilter(
	 'blocks.registerBlockType',
	 'foxland/margin-settings-attributes',
	 addMarginAttributes
 );

 /**
 * Add margin top controls.
 *
 * @param {function} BlockEdit Block edit component.
 *
 * @return {function} BlockEdit Modified block edit component.
 */
 function addMarginControls( BlockEdit ) {
	 const withInspectorControls = createHigherOrderComponent( () => {
		 return ( props ) => {
			 const noVerticalSpacingArray = noVerticalSpacingBlocks();

			 // Bail if not in accepted blocks.
			 if ( noVerticalSpacingArray.includes( props.name ) ) {
				 return <BlockEdit { ...props } />;
			 }

			 const {topMargin} = props.attributes;

			 const TOP_MARGIN_OPTIONS = [
				 { value: 'mt-0', label: __( 'Zero', 'foxland-plugin' ) },
				 { value: 'mt-sm', label: __( 'Small', 'foxland-plugin' ) },
				 { value: 'mt-md', label: __( 'Medium (default)', 'foxland-plugin' ) },
				 { value: 'mt-lg', label: __( 'Large', 'foxland-plugin' ) },
				 { value: 'mt-xl', label: __( 'Extra Large', 'foxland-plugin' ) },
			 ];

			 /**
			 * Set top margin.
			 *
			 * @return {string} Margin class
			 */
			 //const toggleMargin = () => props.setAttributes( { topMargin: ! topMargin } );

			 return (
				 <Fragment>
					 <BlockEdit { ...props } />
					 <InspectorControls>
						 <PanelBody title={ __( 'Vertical spacing', 'foxland-plugin' ) } initialOpen={ false }>
							 <RadioControl
								 label={ __( 'Set block top margin', 'foxland-plugin' ) }
								 options={ TOP_MARGIN_OPTIONS }
								 selected={ topMargin }
								 onChange={ ( value ) => props.setAttributes( { topMargin: value } ) }
							 />
						 </PanelBody>
					 </InspectorControls>
				 </Fragment>
			 );
		 };
	 } );

	 return withInspectorControls( BlockEdit );
 }

 wp.domReady( () => {
	 wp.hooks.addFilter(
		 'editor.BlockEdit',
		 'foxland/margin-settings',
		 addMarginControls
	 );
 } );

 /**
 * Add margin top class in save element.
 *
 * @param {Object} el         Block element.
 * @param {Object} block      Blocks object.
 * @param {Object} attributes Blocks attributes.
 *
 * @return {Object} el Modified block element.
 */
 function saveMarginTopSettings( el, block, attributes ) {
	 const noVerticalSpacingArray = noVerticalSpacingBlocks();

	 if ( block.name.startsWith( 'core' ) && ! noVerticalSpacingArray.includes( block.name ) ) {
		 // Remove all mt-* classes from classname to ensure only the correct one is applied.
		 const classes = null !== el.props && undefined !== el.props.className ? el.props.className.replace( /mt-[^0-9]{1}/gi, '' ).trim() : el.props.className;

		 el.props.className = classnames( classes, {
			 [ attributes.topMargin ]: 'mt-md' !== attributes.topMargin,
		 } );
	 }

	 return el;
 }

 wp.domReady( () => {
	 wp.hooks.addFilter(
		 'blocks.getSaveElement',
		 'foxland/save-margin-settings',
		 saveMarginTopSettings
	 );
 } );

 /**
 * Blocks that don't need vertical setting.
 *
 * @return {Array} No vertical spacing blocks.
 */
 function noVerticalSpacingBlocks() {
	 return [
		 'core/latest-comments',
		 'core/latest-posts'
	 ];
 }
