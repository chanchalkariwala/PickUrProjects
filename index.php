<?php
/**
 *
 * index.php
 * Only to be used for Projects Page
 *
 */
if ( isset($_REQUEST['cat_name']) ) {
     
    $categories = $_REQUEST['cat_name'];
    $separator = '';
    $message = '';
    
    foreach ($categories as $category) {    
        $message = $message.$separator.$category;
        $separator = "+";
        $options[] = $category;
    }
        
    global $wp_query;
    $modifications = array();
    if( !empty( $message ) ) {
        $modifications['category_name'] = $message;
        $modifications['orderby'] = 'rand';
    }

    $args = array_merge( 
        $wp_query->query_vars, 
        $modifications 
    );

    query_posts( $args );
    
}

get_header();
global $post;
?>
    
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                
                    <div id="post-filters" class="text-center">
                        <form>   
                        <?php                    
                        $categories = get_categories(array('hide_empty'=> 0, 'orderby'=>'count', 'order'=>'desc', 'number'=>'15'));  
                        
                        foreach ( $categories as $category ) { ?>
                            <div class="div-checkbox">
                                <label>
                                <?php echo $category->cat_name; ?>
                                <input type="checkbox" name="cat_name[]" value="<?php echo $category->slug; ?>" 
                                <?php if(isset($_REQUEST['cat_name']) &&(in_array($category->slug, $_REQUEST['cat_name'] ))){echo 'checked="checked"';}?>
                                />
                                </label>
                            </div>
                        <?php } ?>
                        <br/>
                        <input class="btn btn-primary" type="submit" value="Filter" />
                        </form>
                    </div><!-- #post-filters -->
                    
                    <?php                
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $seed = date('Ymd');  // Use date('Ymdh') to get an hourly change
                    global $mam_posts_query;
                    $mam_posts_query = " ORDER BY rand($seed) "; // Turn on filter

                    $args = array(
                        'ignore_sticky_posts' => 1,  // Stickies will be repeated if this is not set
                        'orderby' => 'rand',      // This MUST be in the query - the filter checks for it
                        'paged' => $paged,
                        'cat' => '-52,-53,-38'
                    );

                    global $wp_query;
                    
                    query_posts(
                        array_merge(
                            $wp_query->query,
                            $args
                        )
                    );

                    $mam_posts_query = ''; // Turn off filter
                    ?>
                    
                <?php if ( have_posts() ) : ?>
                    
                    <div class="text-center" style="padding-bottom:50px">
                    
                    <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        
                        <?php
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );
                        ?>
                        
                    <?php endwhile; ?>
                    </div>
                    
                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>

                </main><!-- #main -->
            </div><!-- #primary -->

            <?php get_footer(); ?>
