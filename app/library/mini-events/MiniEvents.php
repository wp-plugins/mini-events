<?php


class MiniEvents {
    
    
    /**
     * Main Construct for the Whole Application
     * Sets Registry and Default Values (if none present)
     *
     * @return null
     * @added 2.0
     */
    
    public function __construct() {
        
        
        if( !get_option( 'MEVer' ) ) :
                add_option( 'MEVer', ME_Registry::get( 'config', 'current_version' ) );
        endif;
        
        ME_Registry::set( 'version', get_option( 'MEVer' ) );

        
    }
    
        
    /**
     * The main application run function, this sets up all the magic and grunt
     * work of the application, firing off all the different controllers.
     *
     * @return null
     * @added 2.0
     */
    
    public function run() {
         
        new ME_InstallController;
        new ME_UpgradeController;
        new ME_GlobalController;
        new ME_AdminController;
        new ME_PostTypeFactory( new ME_PostType );
        new ME_Shortcodes();

     
    }
    
    public function getEvents( $data ) {
        
        $count = isset( $data['count'] ) ? intval( $data['count'] ) : null;

        $posts_args = array( 
            'posts_per_page' => -1, 
            'post_type' => 'events' 
            ); 

        $posts = get_posts( $posts_args );
        $future = self::getFutureEvents( $posts );
        usort( $future, array( "MiniEvents", "sortEvents" ) );
        $events = self::getAmountOfEvents( $future, $count );
        
        return $events;
        
    }
    
    public static function getFutureEvents( $events ) {
        
        $future = [];

        foreach( $events as $event ) :

            $from_date = strtotime( get_post_meta( $event->ID, 'event-date-from', true ) );

            if( $from_date > time() )
                $future[] = $event;

        endforeach;
        
        return $future;
        
    }
    
    public static function sortEvents( $a, $b ) {
        
        $aTime = strtotime( get_post_meta( $a->ID, 'event-date-from', true ) );
        $bTime = strtotime( get_post_meta( $b->ID, 'event-date-from', true ) );
        
        if( $aTime == $bTime )
            return 0;
        
       if( $aTime > $bTime )
            return -1;
        
       return 1;
       
    }
    
    public static function getAmountOfEvents( $events, $total ) {
        
        return array_slice( $events, 0, $total );
        
    }
    
}