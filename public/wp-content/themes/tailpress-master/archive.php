<?php get_header(); ?>

<?php
    $query_obj = get_queried_object();
    $sub_title = str_replace( '-' , ' ',  str_replace( '-en' , '', $query_obj->slug ) );
    //echo "<pre>" . print_r( $query_obj, true ) . "</pre>";
?>

    <div class="breadcrumb-wrapper">
        <div class="breadcrumb">
            <?php bcn_display(); ?>
        </div>
    </div>

    <div class="container">

        <div class="wrapper">
            
            <aside class="side-navigation" 
                x-bind:class="{ 'dropdown-collapse': collapse, 'wrapper-fixed': fixed, 'wrapper-bottom': bottom }"
                x-init="fixed = !top"
                x-on:scroll.window="
                    top = document.querySelector('aside').getBoundingClientRect().top < 0 ? false : true;
                    bottom = document.querySelector('aside').getBoundingClientRect().bottom > document.querySelector('aside .wrapper').clientHeight ? false : true;
                    fixed = !top;
                    "
                x-data="{ 
                    collapse: false, 
                    title: '<?php echo $query_obj->name; ?>', 
                    fixed: false,
                    top: true, 
                    bottom: false
                }">
                
                <div class="wrapper">

                    <div class="title"><?php echo mxbon_get_side_navigation_title(); ?></div>

                    <div class="mobile-toggle-btn" x-text="title" x-on:click="collapse = !collapse"></div>
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'primary',
                            'sub_menu' => true
                        ) );
                    ?>
                </div>

            </aside>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <h1 class="page-title side">
                        <?php echo $query_obj->name; ?>
                        <span class="sub">
                            <?php echo $sub_title; ?>
                        </span>
                    </h1>
                </header>

                <section class="post-grid">
                    <div class="container">

                        <?php if( $query_obj->slug === "knowledge" || $query_obj->slug === "knowledge-en" ) : ?>
       
                            <?php
                                $posts_arg = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => -1,
                                    'cat' => $query_obj->term_id,
                                    'order' => 'ASC',
                                );
                                $posts = get_posts( $posts_arg );
                            ?>
                            <div class="posts-accordion" x-data="{ active: 0 }">

                                <?php if( $posts ): ?>

                                <ul>

                                <?php foreach( $posts as $key => $post ) : ?>
                                    
                                    <li class="post"
                                        x-bind:class="active == <?php echo $key; ?> ? 'active' : ''"
                                        x-on:click="active = active !== <?php echo $key; ?> ? <?php echo $key; ?> : null"
                                        >
                                        <h2 class="content-title question" x-bind:class="active==<?php echo $key; ?> ? 'subline' : ''"><?php echo $post->post_title; ?></h2>
                                        <div class="answer" 
                                            x-ref="container<?php echo $key; ?>" 
                                            x-bind:style="active == <?php echo $key; ?> ? 'max-height: ' + $refs.container<?php echo $key; ?>.scrollHeight + 'px' : ''">
                                            <?php echo $post->post_content; ?>
                                        </div>
                                    </li>

                                <?php endforeach; ?>

                                </ul>

                                <?php endif; ?>

                            </div>

                        <?php else : ?>

                            <?php
                                $posts_arg = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => -1,
                                    'cat' => $query_obj->term_id,
                                );
                                $posts = get_posts( $posts_arg );
                            ?>
                            <div class="posts">

                                <?php foreach ($posts as $post) : ?>
                                    <?php 
                                        $thumbnail = has_post_thumbnail($post) ? get_the_post_thumbnail_url($post, 'large') : '/wp-content/themes/tailpress-master/resources/images/news-default-img.svg'; 
                                        $categories = get_the_category();
                                    ?>
                                    <a class="post" href="<?php echo get_permalink($post); ?>">
                                        <div class="image-wrapper">
                                            <img src="<?php echo $thumbnail; ?>" title="<?php echo $post->post_title; ?>" alt="<?php echo $post->post_title; ?>">    
                                        </div>
                                        <div class="info">
                                            <?php if( $categories ) : ?>
                                                <div class="category"><?php echo $categories[0]->name; ?></div>
                                            <?php endif; ?>
                                            <h3 class="title"><?php echo $post->post_title; ?></h3>
                                            <time><?php echo get_the_date('Y/m/d', $post); ?></time>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>

                    </div>
                </section>

            </article>
        </div>
    </div>

<?php
    get_footer();