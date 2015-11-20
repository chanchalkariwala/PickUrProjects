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
							<h1 class="page-header">Languages</h1>
						</div>
					</div>
					
					<div class="text-center" style="padding-bottom:50px">
					
					<?php /* Start the Loop */ ?>
					<?php

					$seed = date('Ymd');  // Use date('Ymdh') to get an hourly change
					global $mam_posts_query;
					$mam_posts_query = " ORDER BY rand($seed) "; // Turn on filter
					$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

					query_posts(array('post_type' => 'post', 'post_status' => 'publish', 'paged' => $page, 'category_name'=>'languages', 'orderby'=>'rand',));
					 $mam_posts_query = ''; // Turn off filter

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
