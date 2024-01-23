<?php get_header(); ?>
<?php

    global $wp_query;

    //echo "<pre>" . print_r( $wp_query->posts, true ) . "</pre>";

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

    // Product Catalog
    $catalogs = get_field( 'catalogs', 'option' );
    $catalog_models = array();
    $catalog_count = 0;

    foreach( $catalogs as $catalog ) {
        
        $cat = get_term($catalog['category']);

        if( str_contains( $cat->name, $query_string ) ) {
            $url = get_permalink( get_page_by_path( 'information/product-catalog' ) ) . "#" . $cat->slug;
            $catalog_output .= sprintf( '<h3><a href="%s">%s</a></h3>', $url, $cat->name );
            $catalog_count++;
        }

        foreach( $catalog['files'] as $file ) {

            if( str_contains( $file['name'], $query_string ) ) {
                $url = get_permalink( get_page_by_path( 'information/product-catalog' ) ) . "#" . $cat->slug;
                $catalog_output .= sprintf( '<h3><a href="%s">%s</a></h3>', $url, $file['name'] );
                $catalog_count++;
            }
        }
    }
    if( $catalog_count ) {
        $catalog_attributes = "x-bind:class=\"current == 'product-catalog' ? 'current-menu-item' : ''\" x-on:click.prevent=\"current = 'product-catalog'\"";
        $aside_output .= sprintf('<li class="menu-item" %s><a href="#">%s<span class="count">%s</span></a></li>', $catalog_attributes, '產品型錄', $catalog_count );

        $result_output .= "<div class=\"result product-catalog\" x-show=\"['all', 'product-catalog'].includes(current)\" x-transition.duration.500ms>";
        $result_output .= sprintf( '<h2 class="content-title subline">%s</h2>' , '產品型錄' );
        $result_output .= $catalog_output;
        $result_output .= "</div>";
    }

    // Documentation
    $document_query = array();
    $doc_count_in_product = 0;
    $term_count_in_taxonomy = 0;

    $product_category_objs = get_terms( array( 'taxonomy'   => 'product-category', 'hide_empty' => false, ) );
    $product_categories = array_column( $product_category_objs, 'name');
    $terms_output = "";

    foreach( $product_categories as $key => $product_category ) {

        $doc_count_in_category = 0;

        if( str_contains( $product_category, $query_string )) {
            $products_args = array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                    'taxonomy' => 'product-category',
                    'terms' => $product_category_objs[$key]->term_id,
                    ),
                ),
            );
            $product_query = new WP_Query( $products_args );

            if( $product_query->posts ) {

                foreach( $product_query->posts as $product ) {
                    $detail = get_field( 'detail', $product );
                    $feature_key = null;
                    $document_count = 0;

                    if( $detail ) {

                        $feature_key = array_search( 'feature', array_column( $detail, 'acf_fc_layout' ) );

                        if( $feature_key !== null && $detail[$feature_key]['series'] ) {
                            $document_count = count( array_filter( array_column( $detail[$feature_key]['series'], 'document' ) ) );
                            $doc_count_in_category +=  $document_count;
                        }

                    }
                }
            }

            if( $doc_count_in_category ) {
                $term_count_in_taxonomy++;

                $url = get_permalink( get_page_by_path( 'information/technical-documentation' ) ) . "#" . $product_category_objs[$key]->slug;
                $term_subtitle = implode(" ", array_map( 'ucfirst', explode( "-", $product_category_objs[$key]->slug ) ) );
                $terms_output .= sprintf( '<h3><a href="%s">%s %s</a></h3>', $url,  $product_category_objs[$key]->name, $term_subtitle );
            }
            
        }
        
    }

    $doc_count_in_product = 0;
    $docs_output = "";
    $product_output = "";

    if( $wp_query->posts ) {        

        foreach( $wp_query->posts as $item ) {

            if( $item->post_type == 'product' ) {

                $document_args = array(
                    'post_type' => 'product',
                    'p' => $item->ID,
                    'post_status' =>  'publish',
                    
                    'meta_query' => array(
                        array(
                            'key' => 'detail_$_series_$_model',
                            'value' => $query_string,
                            'compare' => '=',
                        ),
                        array(
                            'key' => 'detail_$_series_$_document',
                            'value' => '',
                            'compare' => '!=',
                        ),
                        'relation' => 'AND',
                    )
                );
                
                $document_query = new WP_Query($document_args);
                $doc_count_in_product = $document_query->post_count;
            }
        }

        if( $doc_count_in_product ) {

            foreach( $document_query->posts as $item ) {
                $url = get_permalink( get_page_by_path( 'information/technical-documentation' ) ) . "#" . $item->post_name;
                $post_name = implode(" ", array_map( 'ucfirst', explode( "-", $item->post_name ) ) );
                $docs_output .= sprintf( '<h3><a href="%s">%s %s</a></h3>', $url, $item->post_title, $post_name );
            }

        } else {            

            foreach( $wp_query->posts as $product ) {
                $detail = get_field( 'detail', $product );
                $feature_key = null;
                $document_count = 0;

                if( $detail ) {
                    
                    $feature_key = array_search( 'feature', array_column( $detail, 'acf_fc_layout' ) );

                    if( $feature_key !== null && $detail[$feature_key]['series'] ) {
                        $document_count = count( array_filter( array_column( $detail[$feature_key]['series'], 'document' ) ) );

                        if( $document_count ) {
                            $url = get_permalink( get_page_by_path( 'information/technical-documentation' ) ) . "#" . $product->post_name;
                            $post_name = implode(" ", array_map( 'ucfirst', explode( "-", $product->post_name ) ) );
                            $product_output .= sprintf( '<h3><a href="%s">%s %s</a></h3>', $url, $product->post_title, $post_name );
                            $doc_count_in_product++;
                        }
                    }

                }
            }

        }
        
    }

    if( $term_count_in_taxonomy || $doc_count_in_product ) {

        $total_count = $term_count_in_taxonomy + $doc_count_in_product;

        $docs_attributes = "x-bind:class=\"current == 'technical-documentation' ? 'current-menu-item' : ''\" x-on:click.prevent=\"current = 'technical-documentation'\"";
        $aside_output .= sprintf('<li class="menu-item" %s><a href="#">%s<span class="count">%s</span></a></li>', $docs_attributes, '技術資料', $total_count );        

        $result_output .= "<div class=\"result technical-documentation\" x-show=\"['all', 'technical-documentation'].includes(current)\" x-transition.duration.500ms>";
        $result_output .= sprintf( '<h2 class="content-title subline">%s</h2>' , '技術資料' );

        #大集合
        $result_output .= $terms_output;
        $result_output .= $docs_output;
        $result_output .= $product_output;

        $result_output .= "</div>";
    }

    // Total result count
    $total_results = $wp_query->found_posts + $terms_count + $catalog_count + $doc_count_in_product + $term_count_in_taxonomy;
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
                top = document.querySelector('aside').getBoundingClientRect().top < 90 ? false : true;
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

            <!--
            原始搜尋結果:
            <pre>
                <?php 
                    /*
                    if( have_posts() ) {
                        while( have_posts() ) {
                            the_post();
                            echo "<h3>".get_the_title()."</h3>";
                        }
                    } 
                    */
                ?>
            </pre>
            -->
        </div>
    </div>
</div>

<?php
get_footer();
