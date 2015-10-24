<?php
/**
 *
 * home.php
 *
 */

get_header(); ?>

    <div class="row">
        
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <div class="jumbotron text-center" style="background-color:#563d7c;color:white;#1894FF">
                    <h1>PickUrProjects.com</h1>
                    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
                    <p><a class="btn btn-lg btn-default" href="" role="button">Get started today</a></p>
                </div>
                
                <h3 class="well">Choose a category to begin with!</h3>
                
                <?php
                $args = array ( 'hide_empty'=> 0, 'orderby' => 'count', 'order' => 'desc', 'exclude' => '1' );  
                $categories = get_categories($args);  
              
                if ( ! $categories )  
                {
                    echo 'No categories found';  
                }
                else
                {
                    ?>
                    
                    <div class="text-center" style="padding-bottom:50px">
                    
                    <?php
                    foreach ( $categories as $category ) { 
                        
                        $cat_id = $category->term_id ;
                        $cat_image = get_category_image($cat_id);?>
                        
                        
                        <div id="cat-<?php echo $cat_id ?>" class="post-archive">
                            <a href="<?php echo site_url('/category/').$category->slug ?>" rel="bookmark">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <figure class="entry-thumbnail">
                                            <?php echo $cat_image; ?>
                                        </figure>
                                    </div>
                                    <div class="panel-footer">
                                        <h4>
                                            <?php echo $category->name; ?></a>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php 
                    }
                    ?>
                    </div>
                <?php
                } 
                ?>
                
            </main><!-- #main -->
        </div><!-- #primary -->
        
        
        <?php get_footer(); ?>
