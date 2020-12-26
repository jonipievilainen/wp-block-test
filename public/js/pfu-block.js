( function( blocks, editor, element ) {
	var el = element.createElement;
    var RadioControl = wp.components.RadioControl;
    var SelectControl = wp.components.SelectControl;

	blocks.registerBlockType( 'mcb/call-to-action', {
		title: 'MCB: Call to Action', // The title of block in editor.
		icon: 'admin-comments', // The icon of block in editor.
		category: 'common', // The category of block in editor.
		attributes: {
            content: {
                type: 'string',
                default: 'Default text'
            },
            button: {
                type: 'string',
                default: 'Join Today'
            },
            option: {
                value: 'a'
            }
        },
		edit: function( props ) {

            var attributes = props.attributes;

            /**
             * Event for change
             */
            var onChangeRadio = function (option) {
                console.log(option);
                return props.setAttributes({
                    option: option
                });
            };

            // TODO: Need some REST call for dynamic ACF select

            return (
                el( 'div', { className: props.className },
                    el(
                        editor.RichText,
                        {
                            tagName: 'div',
                            className: 'mcb-call-to-action-content',
                            value: props.attributes.content,
                            onChange: function( content ) {
                                props.setAttributes( { content: content } );
                            }
                        }
                    ),
                    el(
                        RadioControl,
                        {
                            label: "User type",
                            help: "The type of the current user",
                            selected: attributes.option,
                            options: [{
                                label: 'Author',
                                value: 'a'
                            }, {
                                label: 'Editor',
                                value: 'e'
                            }],
                            onChange: onChangeRadio
                        }
                    ),
                    // el(
                    //     SelectControl,
                    //     {
                    //         label: "ACF text",
                    //         help: "Select ACF field for usage",
                    //         selected: attributes.option,
                    //         options: [{
                    //             label: 'Author',
                    //             value: 'a'
                    //         }, {
                    //             label: 'Editor',
                    //             value: 'e'
                    //         }],
                    //         onChange: onChangeRadio
                    //     }
                    // ),
                    el(
                        editor.RichText,
                        {
                            tagName: 'span',
                            className: 'mcb-call-to-action-button',
                            value: props.attributes.button,
                            onChange: function( content ) {
                                props.setAttributes( { button: content } );
                            }
                        }
                    ),
                )
            );
        },
		save: function( props ) {
            return (
                el( 'div', { className: props.className },
                    el( editor.RichText.Content, {
                        tagName: 'p',
                        className: 'mcb-call-to-action-content',
                        value: props.attributes.content,
                    } ),
                    el( editor.RichText.Content, {
                        tagName: 'p',
                        className: 'mcb-call-to-action-content',
                        value: props.attributes.option,
                    } ),
                    el( 'button', { className: 'mcb-call-to-action-button' },
                        props.attributes.button
                    )
                )
            );
        },
	} );
} )( window.wp.blocks, window.wp.editor, window.wp.element );