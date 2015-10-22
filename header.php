<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PickUrProjects
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div class="container">

        <!--<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pickurprojects' ); ?></a>-->

        <header id="masthead" class="site-header" role="banner">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php get_home_url(); ?>"><img class="img-rounded img-responsive" src="<?php echo get_template_directory_uri() .'/images/new-logo.png'?>"/></a>
                    </div><!--end navbar-header-->
                    <div class="collapse navbar-collapse menu-primary" id="bs-example-navbar-collapse-1">
                        <?php
                        wp_nav_menu( array(
                            'menu'              => '',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => '',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav nav-pills',
                            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                            'walker'            =>  new wp_bootstrap_navwalker())
                        );
                        ?>
                        <div class="col-sm-3 col-md-3 pull-right search-navbar">
                            <form class="navbar-form" role="search" method="get" id="searchform" action="<?php bloginfo('home'); ?>" >
                                <div class="input-group">
                                    <input type="text" id="searchbox" class="form-control" placeholder="Search" name="s" id="s">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default"  id="searchsubmit"  type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!--end navbar-colapse-->
                </div><!--end container-->
            </nav>
            
            
        </header><!-- #masthead -->

        <div id="content" class="site-content">
