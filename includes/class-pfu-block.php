<?php

class Pfu_Block {

    protected $loader;

    public function __construct( $l ) {
        $this->loader = $l;
        $this->define_public_hooks();
    }

    private function define_public_hooks() {
        $this->loader->add_action( 'init', $this, 'gutenberg_examples_01_register_block' );
    }

    public function gutenberg_examples_01_register_block() {
        // Check if Gutenberg is active.
        if ( ! function_exists( 'register_block_type' ) ) {
            return;
        }

        // Add block script.
        wp_register_script(
            'call-to-action',
            PLUGINS_URL . 'public/js/pfu-block.js',
            [ 'wp-blocks', 'wp-element', 'wp-editor' ],
            filemtime( PLUGIN_DIR_PATH . 'public/js/pfu-block.js' )
        );

        // Add block style.
        wp_register_style(
            'call-to-action',
            PLUGINS_URL . 'public/css/pfu-block.css',
            [],
            filemtime( PLUGIN_DIR_PATH . 'public/css/pfu-block.css' )
        );

        // Register block script and style.
        register_block_type( 'mcb/call-to-action', [
            'style' => 'call-to-action', // Loads both on editor and frontend.
            'editor_script' => 'call-to-action', // Loads only on editor.
        ] );
    }

}