<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PickUrProjects
 */

?>

<div id="post-<?php the_ID(); ?>" class="post-archive">
    <a href="<?php the_permalink(); ?>" rel="bookmark">
        <div class="panel panel-default">
            <div class="panel-body">
                <figure class="entry-thumbnail">
                    <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail'); ?>
                </figure>
            </div>
            <div class="panel-footer">
                <h4>
                    <?php the_title(); ?>
                </h4>
                
                <span style="font-size:80%;color: rgb(157, 151, 151);">

                <?php if ( 'post' === get_post_type() ) : 
                    $category = get_the_category(); 
                    $cat_name = $category[0]->cat_name;
                    /*if($cat_name!='Uncategorized')*/
                        echo $cat_name;                
                endif; ?>
                
                </span>
            </div>
        </div>
    </a>
</div>