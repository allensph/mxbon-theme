<?php get_header(); ?>

<?php

    global $wp_query;
    $query_string = $wp_query->query['s'];

    $aside_output  = ""; 
    $result_output = "";
    $terms_count = 0;

    $taxonomies = get_taxonomies( array( 'public' => true ), 'names', 'AND' );
    $terms_in_result = array();

    foreach( $taxonomies as $taxonomy ) {
        $terms = get_terms(
            array(
                'taxonomy' => $taxonomy,
                'name__like' => $query_string,
            )
        );

        $terms_count += count($terms);

        if( $terms ) :
            foreach( $terms as $element ) :
                $terms_in_result[$element->taxonomy][] = $element;
            endforeach;
        endif;
    }

    $total_results = $wp_query->found_posts + $terms_count;

    if( $terms_in_result ) {

        $key_exist = "";

        foreach( $terms_in_result as $key => $result_terms ) {
            
            $term_attrubutes = "x-bind:class=\"current == '{$key}' ? 'current-menu-item' : ''\" x-on:click.prevent=\"current = '{$key}'\"";
            $taxonomy_label = get_taxonomy($key)->label;
            $aside_output .= sprintf( '<li class="menu-item" %s><a href="#">%s<span class="count">%s</span></a></li>', $term_attrubutes, $taxonomy_label, count($result_terms) );
            
            $result_output .= "<div class=\"result {$key}\" x-show=\"['all', '{$key}'].includes(current)\" x-transition>";

            foreach( $result_terms as $result_term ) {
                
                
                $term_link = $key === 'product-category' 
                    ? get_post_type_archive_link( 'product' ) . "#{$result_term->slug}"
                    : get_term_link( $result_term->term_id );

                $result_output .= $key_exist !== $key ? sprintf( '<h2 class="content-title subline">%s</h2>' , $taxonomy_label ) : "";
                $result_output .= sprintf( '<h3><a href="%s">%s</a></h3>', $term_link, $result_term->name );
                $result_output .= sprintf( '<p class="excerpt_part">%s</p>', $result_term->description );
                
                $key_exist = $key;
            }
            
            $result_output .= "</div>";
        }
    }

    $posts_in_result = array();

    if( $wp_query->posts ):
        foreach( $wp_query->posts as $element ) :
            $posts_in_result[$element->post_type][] = $element;
        endforeach;
    endif;

    if( $posts_in_result ) {

        $key_exist = "";

        foreach( $posts_in_result as $key => $result_posts ) {
            
            $post_type_attributes = "x-bind:class=\"current == '{$key}' ? 'current-menu-item' : ''\" x-on:click.prevent=\"current = '{$key}'\"";
            $post_type_label = get_post_type_object( $key )->labels->singular_name;
            $aside_output .= sprintf('<li class="menu-item" %s><a href="#">%s<span class="count">%s</span></a></li>', $post_type_attributes, $post_type_label, count($result_posts) );

            $result_output .= "<div class=\"result {$key}\" x-show=\"['all', '{$key}'].includes(current)\" x-transition.duration.500ms>";

            foreach( $result_posts as $result_post ) {
                
                if( $key_exist !== $key) {
                    $taxonomy = $key === "product" ? "product-category" : "";
                    $taxonomy = $key === "post" ? "category" : "";
                    $subtitle = $taxonomy ? get_the_terms( $result_post, $taxonomy)[0]->name : $post_type_label;

                    $result_output .= sprintf( '<h2 class="content-title subline">%s</h2>' , $subtitle );
                }
                
                $result_output .= sprintf( '<h3><a href="%s">%s</a></h3>', get_permalink( $result_post->ID ), $result_post->post_title );
                $result_output .= $result_post->post_excerpt;

                $key_exist = $key;
            }
    
            $result_output .= "</div>";
        }
    }
?>

<div class="breadcrumb-wrapper">
    <div class="breadcrumb">
        <?php bcn_display(); ?>
    </div>
</div>

<div class="container">

    <div class="wrapper"
        x-data="{ 
                collapse: false, 
                title: 'abc', 
                fixed: false,
                top: true, 
                bottom: false,
                current: 'all',
    }">

        <aside class="side-navigation"
    
            x-bind:class="{ 'dropdown-collapse': collapse, 'wrapper-fixed': fixed, 'wrapper-bottom': bottom }"
            x-init="fixed = !top"
            x-on:scroll.window="
                top = document.querySelector('aside').getBoundingClientRect().top < 0 ? false : true;
                bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                fixed = !top;
                "
            >
            <div class="wrapper">
                <div class="title">檢視</div>
                    <ul class="menu">
                        <li class="menu-item" x-bind:class="current=='all' ? 'current-menu-item' : ''" x-on:click.prevent="current='all'">
                            <a href="#">所有搜尋結果</a>
                        </li>
                        <?php if( $terms_in_result || $posts_in_result ): ?>
                            <?php echo $aside_output; ?>
                        <?php endif; ?>
                    </ul>
            </div>
        </aside>
        
        <div class="search-result">

            <header class="entry-header">
                <h1 class="page-title side">
                    搜尋結果
                    <span class="sub">Search Result</span>
                </h1>
            </header>

            <div class="description">針對「<?php echo $query_string; ?>」的搜尋結果： <?php echo $total_results; ?></div>

            <?php if( $terms_in_result || $posts_in_result ): ?>
            
                <?php echo $result_output; ?>
            
            <?php else: ?>
                    
                <p><?php _e( 'No Search Results found', 'nd_dosth' ); ?></p>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php
get_footer();
