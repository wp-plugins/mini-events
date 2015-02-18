<?php

class ME_MetaBoxFactory {
    
    public $metaBoxCreator;
    
    public function __construct( $postType ) {
        
        $this->metaBoxCreator = $postType;
        
        add_action( 'add_meta_boxes', array( &$this, 'createAll' ) );
        
        add_action( 'save_post', array( 'ME_MetaBoxLocation', 'save' ) );
        add_action( 'save_post', array( 'ME_MetaBoxDateFrom', 'save' ) );
        add_action( 'save_post', array( 'ME_MetaBoxDateTo', 'save' ) );
        add_action( 'save_post', array( 'ME_MetaBoxMap', 'save' ) );

    }
    
    /**
     * Create all post types
     *
     * @return null
     * @added 1.0
     */
    
    public function createAll() {

        $this->metaBoxCreator->create( 
                
                'event-location',
                'Location',
                array( 'ME_MetaBoxLocation', 'display' ),
                'events',
                'side'
                
                );
        
        $this->metaBoxCreator->create( 
                
                'event-date-from',
                'Date From',
                array( 'ME_MetaBoxDateFrom', 'display' ),
                'events',
                'side'
                
                );
        
        $this->metaBoxCreator->create( 
                
                'event-date-to',
                'Date To',
                array( 'ME_MetaBoxDateTo', 'display' ),
                'events',
                'side'
                
                );
        
        $this->metaBoxCreator->create( 
                
                'event-map',
                'Google Map',
                array( 'ME_MetaBoxMap', 'display' ),
                'events'
                
                );


    }
    
    
}