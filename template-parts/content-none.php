<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PickUrProjects
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'pickurprojects' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pickurprojects' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pickurprojects' ); ?></p>
			
		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pickurprojects' ); ?></p>
			
		<?php endif; ?>
        
        <form class="navbar-form" role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>" style="padding-top:20px;">
            <div class="input-group">
                <input type="text" id="searchbox" class="form-control" placeholder="Search" name="s" id="s">
                <div class="input-group-btn">
                    <button class="btn btn-default"  id="searchsubmit"  type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
        
	</div><!-- .page-content -->
</section><!-- .no-results -->
