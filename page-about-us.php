<?php
/**
 *
 * page-languages.php
 *
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">About Us
                        <small>It's Nice to Meet You!</small>
                    </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, explicabo dolores ipsam aliquam inventore corrupti eveniet quisquam quod totam laudantium repudiandae obcaecati ea consectetur debitis velit facere nisi expedita vel?</p>
                </div>
            </div>

            <!-- Team Members Row -->
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Our Team</h2>
                </div>
                
                <div class="col-md-4 col-md-offset-2 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                    <h3>John Smith
                        <small>Job Title</small>
                    </h3>
                    <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
                </div>
                <div class="col-md-4 col-sm-6 text-center">
                    <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                    <h3>John Smith
                        <small>Job Title</small>
                    </h3>
                    <p>What does this team member to? Keep it short! This is also a great spot for social links!</p>
                </div>
            </div>

            <div class="text-center" style="padding-bottom:50px">
            
			<?php /* Start the Loop */ ?>
            <?php
            while ( have_posts() ) : the_post(); ?>

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
