<?php
/*
Template Name: Redirect To First Child
*/

if( is_home() ) :
    
    global $wp_query; 
    $blog_page_id = $wp_query->queried_object->ID;

    $menu_slug = 'en' === pll_current_language()
        ? 'main-nav-en' : 'main-nav';

    if( $menu_items = wp_get_nav_menu_items( $menu_slug ) ) :

        $key = array_search( $blog_page_id, array_column( $menu_items, 'object_id' ) );
        $blog_menu_item =  $key !== null ? $menu_items[$key] : null;

        $key = array_search( $blog_menu_item->ID, array_column( $menu_items, 'menu_item_parent' ) );
        $first_menu_child =  $key !== null ? $menu_items[$key] : null;

        if ( $first_menu_child ) :
            wp_redirect( get_category_link( $first_menu_child->object_id ) );
        endif;

    endif;

endif;

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