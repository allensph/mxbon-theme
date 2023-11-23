<?php

/**
 * Theme setup.
 */
function tailpress_setup() {

  load_theme_textdomain('tailpress', get_template_directory() . '/languages');

	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
			'lang' => __( 'Language Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

  add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'noto-sans-tc', 'https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swa' );
	wp_enqueue_style( 'rajdhani', 'https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&display=swap' );
	wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');

	if ( is_front_page() || is_singular( 'product' ) || is_page( 'talent-recruitment' ) || is_page( 'talent-recruitment-en' ) ) {
		wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
		wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js' );
	}
	if ( is_page( 'company-overview' ) || is_page( 'company-overview-en' ) ) {
		wp_enqueue_script( 'counter-up', 'https://unpkg.com/counterup2@2.0.2/dist/index.js' );
	}
	if( is_page( 'history' ) || is_page( 'history-en' ) ) {
		wp_enqueue_script( 'alpine-intersect', 'https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js' );
		wp_enqueue_script( 'alpine', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js', array('alpine-intersect') );
	} else {
		wp_enqueue_script( 'alpine', 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js' );
	}

  if( is_page() ) {

    global $post;
    $lang = pll_current_language();

    $aos_pages = array(
      'corporate-philsosphy',
      'innovation',
      'certification',
      'talent-recruitment',
    );

    $aos_pages = $lang === "en"
     ? array_map( fn($value): string => $value . "-en", $aos_pages )
     : $aos_pages;

    if ( in_array( $post->post_name, $aos_pages ) ) {
      wp_enqueue_style( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css' );
      wp_enqueue_script( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js' );
    }
  }

  if( is_singular( 'product' ) || is_singular( 'industry' ) ) {
    wp_enqueue_style( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.css' );
    wp_enqueue_script( 'aos', 'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.min.js' );
  }
	

	wp_enqueue_script( 'paroller', 'https://cdn.jsdelivr.net/npm/paroller.js@1.4.4/dist/jquery.paroller.min.js', array('jquery') );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array('jquery'), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


/**
 * Add Admin Style
 */
add_action('admin_enqueue_scripts', 'tellustek_admin_enqueue_scripts');
function tellustek_admin_enqueue_scripts($hook) {
	//global $pagenow;
  $option_pages = array('options-about-us', 'options-talent-recruitment', 'options-information', 'options-contact-us' );
	if ( isset( $_GET['page'] ) && in_array( $_GET['page'], $option_pages ) ) {
		wp_enqueue_style( 'acf-option-page', get_stylesheet_directory_uri() . "/css/acf-option-style.css" );
	}
  $post_types = array( 'product' );
  if( isset($_GET['post']) && in_array( get_post_type( $_GET['post'] ), $post_types ) ) {
    wp_enqueue_style( 'acf-option-page', get_stylesheet_directory_uri() . "/css/acf-option-style.css" );
  }
}


/**
 * JS loading handler
 */
add_filter( 'script_loader_tag', 'custom_loading_scripts', 10, 3 );
function custom_loading_scripts( $tag, $handle, $src ) {

  // The handles of the enqueued scripts we want to defer
  $defer_scripts = array( 
	'alpine',
	'alpine-intersect',
	'swiper'
  );
/*
  $defer_async_scripts = array( 
    'line-share',
  );
*/
  if ( in_array( $handle, $defer_scripts ) ) {
      return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
  }
  /*
  if ( in_array( $handle, $defer_async_scripts ) ) {
	  return '<script src="' . $src . '" defer="defer" async="async" type="text/javascript"></script>' . "\n";
  }
  */

  return $tag;
}
//Disable emojis in WordPress
add_action( 'init', 'tellustek_disable_emojis' );

function tellustek_disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

// Disable comments on all post types
function tellustek_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'tellustek_disable_comments_post_types_support');

// Close comments on the front-end
function tellustek_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'tellustek_disable_comments_status', 20, 2);
add_filter('pings_open', 'tellustek_disable_comments_status', 20, 2);

// Hide existing comments
function tellustek_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'tellustek_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function tellustek_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'tellustek_disable_comments_admin_menu');

// Remove comments link in admin bar
function tellustek_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'tellustek_admin_bar_render' );

//Disable auto p in thr_content
remove_filter( 'get_the_content', 'wpautop' );

// Custom primary menu walker
function tellustek_custom_nav_walker_class() {
	require_once('includes/Mxbon_Primary_Menu_Walker.class.php');
}
add_action( 'after_setup_theme', 'tellustek_custom_nav_walker_class' );

// filter_hook function to react on sub_menu flag
function tellustek_sub_menu_for_wp_nav_menu_objects( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }

    // find current post category menu item's parent
    if ( isset( $args->news_submenu ) ) {
      global $post;
      $category_id = get_the_category( $post->ID )[0]->cat_ID;
      
      //echo "<pre>" . print_r( $sorted_menu_items, true) . "</pre>";
      //die;

      if ( $category_id ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->object_id == $category_id ) {
            $root_id = $menu_item->menu_item_parent;
            break;
          }
        }
      }
    }

    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
  }
  else {
    return $sorted_menu_items;
  }
}
add_filter( 'wp_nav_menu_objects', 'tellustek_sub_menu_for_wp_nav_menu_objects', 10, 2 );

// Change Homepage text in Naxvt Breabcrumbs
function tellustek_breadcrumb_title_swapper($title, $type, $id) {
    if( in_array( 'home', $type ) ) {
        $title = __('Home');
    }
    if( in_array( '404', $type ) ) {
        $title = __('找不到符合條件的頁面');
    }
    if( in_array( 'post-industry-archive', $type) ) {
        $title = __( 'Industries', 'tailpress' );
    }
    return $title;
}
add_filter('bcn_breadcrumb_title', 'tellustek_breadcrumb_title_swapper', 3, 10);


// breadcrumb: unlinked with parent blank page
add_filter('bcn_breadcrumb_linked', 'tellustek_breadcrumb_url_stripper', 3, 10);
function tellustek_breadcrumb_url_stripper($linked, $type, $id) {
	/*
    if(in_array('product-category', $type) ) {
        return false;
    }
	*/

	$skip_linked_page = array( 101, 114 );
    if(in_array('post-page', $type) && in_array($id, $skip_linked_page) ) {
        return false;
    }

    return $linked;
}

// breadcrumb: change product category link

add_filter('bcn_breadcrumb_url', 'tellustek_breadcrumb_url_changer', 3, 10);
function tellustek_breadcrumb_url_changer($url, $type, $id)
{
    if(in_array('product-category', $type) ) {
        $url = get_post_type_archive_link('product') . "#" . wp_basename( $url );
    }
    return $url;
}

// Template function: Get paragraph

function mxbon_get_paragraph( $index ) {
    global $post, $posts;
    $post_content = $post->post_content;
    $post_content = apply_filters('the_content', $post_content);
    $post_content = str_replace('</p>', '', $post_content);
    $paras = explode('<p>', $post_content);
    array_shift($paras);

    return $paras[$index]; 
}

// Template function: Get sidemenu title

function mxbon_get_side_navigation_title() {
	  
    $parent_item_title = '';
    $parent_id = 0;
    $menu_name = pll_current_language() === 'en'
      ? 'main-nav-en' : 'main-nav';

    if( $menu_items = wp_get_nav_menu_items( $menu_name ) ) :
      
        if( is_singular( 'post' ) ) : 

          global $post;
          $cat_id = get_the_category( $post->ID )[0]->cat_ID;

          foreach( $menu_items as $menu_item ) {

              if( $menu_item->object_id == $cat_id ) {
                  $parent_id = $menu_item->menu_item_parent;
                  break;
              }
          }
          
          $key = array_search( $parent_id, array_column( $menu_items, 'ID' ) );
          $parent_item_title = $key !== false ? $menu_items[$key]->title : null;

        elseif( is_singular() ) :
            
            global $post;
            
            foreach( $menu_items as $menu_item ) {

                if( $menu_item->object_id == $post->ID ) {
                    $parent_id = $menu_item->menu_item_parent;
                    break;
                }
            }
            
            $key = array_search( $parent_id, array_column( $menu_items, 'ID' ) );

            if( $post->post_type === 'page' ) {
                // Get page origin title, not the menu itme title
                $parent_item_title = $key !== false ? get_the_title( $menu_items[$key]->object_id ) : null;
            } 
            if( $post->post_type === 'industry' ) {
                // Get the menu item title
                $parent_item_title = $key !== false ? $menu_items[$key]->title : null;
            }

        endif;

        if( is_category() ):

            $category_id = get_queried_object_id();

            foreach( $menu_items as $menu_item ) {
                
                if( $menu_item->object_id == $category_id ) {
                    $parent_id = $menu_item->menu_item_parent;
                    break;
                }
            }
            $key = array_search( $parent_id, array_column( $menu_items, 'ID' ) );
            $parent_item_title = $key !== false ? $menu_items[$key]->title : null;
            
        endif;

    endif;

	  return $parent_item_title;
}

// Relevanssi: change search result size to all
function tellustek_rlv_postsperpage($query) {
  $query->query_vars['posts_per_page'] = -1;
	return $query;
}
add_filter('relevanssi_modify_wp_query', 'tellustek_rlv_postsperpage');

// ACF: change query command when meta_query in two-layer repeater
function tellustek_replace_repeater_field( $where ) {
  $where = str_replace( "meta_key = 'detail_\$_series_\$", "meta_key LIKE 'detail_%_series_%", $where );
  return $where;
}
add_filter( 'posts_where', 'tellustek_replace_repeater_field' );

// Relpace product archive title in English
function tellustek_replace_product_archive_title( $title ) {
  if ( is_post_type_archive( 'product' ) && pll_current_language() === "en" ) {
      $title = 'Products';
  }
  return $title;
}
add_filter( 'post_type_archive_title', 'tellustek_replace_product_archive_title' );

// Redirect: to archive if link to singular knowledge post
function tellustek_redirect_post() {
  if( is_singular( 'post' ) ) {

      if( in_category( 'knowledge' ) ) {
          $link = get_category_link( get_category_by_slug( 'knowledge' ) );
          wp_redirect( $link, 301 );
          exit;
      }
      if( in_category( 'knowledge-en' ) ) {
          $link = get_category_link( get_category_by_slug( 'knowledge-en' ) );
          wp_redirect( $link, 301 );
          exit;
      }
  }
}
add_action( 'template_redirect', 'tellustek_redirect_post' );

add_filter( 'bea.aofp.get_default', '__return_false' );