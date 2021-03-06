<?php

class ME_PostTypeFactory {
    
    public $postTypeCreator;
    
    public function __construct( $postType ) {
        
        $this->postTypeCreator = $postType;
        
        add_action( 'init', array( &$this, 'createAll' ) );


    }
    
    /**
     * Create all post types
     *
     * @return null
     * @added 1.0
     */
    
    public function createAll() {

        $this->postTypeCreator->create( 'events', array( 
            
            'labels' => array( 
                 
                    'name' => 'Events' ,
                    'singular_name' => 'Event',
                    'add_new_item' => 'Add New Event',
                    'edit_item' => 'Edit Event',
                    'new_item' => 'New Event',
                    'view_item' => 'View Event',
                    'search_items' => 'Search Events',
                    'not_found' => 'No Events Found',
                    'not_found_in_trash' => 'No Events Found in the bin',
                    
                ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 
                            'with_front' => false
                ),
            'register_meta_box_cb' => new ME_MetaBoxFactory( new ME_MetaBox )

            ) 
                
        );

    }
    
    
}