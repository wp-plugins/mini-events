<?php

class ME_Shortcodes {
    
        
    /**
     * Create new shortcodes for use throughout the application
     *
     * @param  array  $args
     * @return null
     * @added 1.0
     */
    
    public function __construct() {
        
        
        add_shortcode( 'mini-events', array( &$this, 'miniEvents' ) );
        
        
    }
    
    /**
     * Return the appropriate view for our testimonial
     *
     * @param  array  $args
     * @return view
     * @added 1.0
     */
    
    public function miniEvents( $args ) {
        
        
        return ME_View::make( 'mini-events', $args );
        
        
    }
    
}