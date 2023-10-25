<?php
/*
Template Name: Redirect To First Child
*/

if( is_page() ) :
        
    $args = array(
    'child_of'    =>  $post->ID,
    'sort_column' =>  'menu_order'
    );
    
    $childrens = get_pages( $args );
    
    if ( $childrens ) :
        wp_redirect( get_permalink( $childrens[0]->ID ) );
        exit;
    endif;

endif;

if( is_archive() ) :
    if ( $posts ) :
        usort ($posts, fn($a, $b) => strcmp($a->menu_order, $b->menu_order) );
        wp_redirect( get_permalink( $posts[0]->ID ) );
    endif;
endif;

?>