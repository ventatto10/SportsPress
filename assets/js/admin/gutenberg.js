( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var AlignmentToolbar = editor.AlignmentToolbar;
	var BlockControls = editor.BlockControls;

	blocks.registerBlockType( 'sportspress/event-event-list', {
    title: i18n.__( 'Event List', 'sportspress' ),
    icon: 'calendar-alt',
    category: 'sportspress',
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: 'h4',
			},
		},
		edit: function( props ) {
			var attributes = props.attributes;

			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: media.url,
					mediaID: media.id,
				} );
			};

			return (
				el( 'div', { className: props.className },
					el( RichText, {
						tagName: 'h4',
						inline: true,
						placeholder: i18n.__( 'Title', 'sportspress' ),
						value: attributes.title,
						onChange: function( value ) {
							props.setAttributes( { title: value } );
						},
					} ),
				)
			);
    },
		save: function( props ) {
			var attributes = props.attributes;

			return (
				`[event_list title=${attributes.title}]`
			);
    },
	} );
} ) (
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);