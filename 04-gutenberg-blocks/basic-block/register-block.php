<?php
/**
 * Registering the Gutenberg block via PHP.
 */

function modern_lab_register_basic_block() {
    // register_block_type looks for the block.json file in the current directory
    register_block_type( __DIR__ );
}

//  hook this into 'init', which is when WordPress is setting up its core.
add_action( 'init', 'modern_lab_register_basic_block' );