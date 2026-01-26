import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

registerBlockType( 'modern-lab/basic-block', {
    edit: function() {
        return (
            <p className="wp-block-modern-lab-basic-block">
                { __( 'Hello from the Editor side!', 'modern-lab' ) }
            </p>
        );
    },
    save: function() {
        return (
            <p className="wp-block-modern-lab-basic-block">
                { __( 'This is what the user sees on the site.', 'modern-lab' ) }
            </p>
        );
    },
} );