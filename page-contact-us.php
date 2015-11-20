<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PickUrProjects
 */

get_header(); ?>

			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Contact Us
							</h1>
						</div>
					</div>
					<br/><br/>
					<?php echo do_shortcode( '[contact-form-7 id="28" title="Contact Form"]' );?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php get_footer(); ?>
