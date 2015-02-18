<?php

class ME_InstallController extends ME_BaseController {
    
    
    /**
     * Prepare our Installation Options
     *
     * @return null
     * @added 2.0
     */
    
    public function __construct() {
        
        
        register_activation_hook( __FILE__, array( &$this, 'install' ) );
        
        
    }
    
        
    /**
     * Sets our initial default options when menu
     * is first installed
     *
     * @return null
     * @added 1.0
     */
    
    public function install() {

        flush_rewrite_rules();
        
        add_option( 'MEVer', ME_Registry::get( 'config', 'current_version' ) );

        
    }
    
    
}