<?php


class ME_GlobalController extends ME_BaseController {
    
        
    /**
     * Prepare our Global Options
     *
     * @return null
     * @added 1.0
     */
    
    public function __construct() {
        
        
        add_action( 'plugins_loaded', array( &$this, 'Internationalise' ) );
        add_action( 'wp_enqueue_scripts', array(  &$this, 'jQuery' ) );

         
    }
    

    /**
     * Makes sure jQuery is added to all pages as it is needed for the
     * system to work
     *
     * @return null
     * @added 1.0
     */
    
    public function jQuery() {
        
        
        wp_enqueue_script( 'jquery' ); 
        
        
    }
    
    
    /**
     * Loads our Translations for use throughout the program
     *
     * Current Translations:
     * 
     * @return null 
     * @added 1.0
     */
    
    
    public function Internationalise() {

        
        load_plugin_textdomain( 'mini-events', false, 'mini-events/translations/' );

        
    }
    
    
}