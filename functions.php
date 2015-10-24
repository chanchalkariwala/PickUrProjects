<?php
/**
 * PickUrProjects functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PickUrProjects
 */

if ( ! function_exists( 'pickurprojects_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pickurprojects_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on PickUrProjects, use a find and replace
	 * to change 'pickurprojects' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pickurprojects', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'pickurprojects' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pickurprojects_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // pickurprojects_setup
add_action( 'after_setup_theme', 'pickurprojects_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pickurprojects_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pickurprojects_content_width', 640 );
}
add_action( 'after_setup_theme', 'pickurprojects_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pickurprojects_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pickurprojects' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pickurprojects_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pickurprojects_scripts() {
   
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css',array(),'3.3.4' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome-4.4.0/css/font-awesome.min.css',array(),'4.4.0' );
     
	wp_enqueue_style( 'pickurprojects-style', get_stylesheet_uri() );
    
    if( !is_admin()){
        wp_deregister_script( 'jquery' );
        wp_register_script('jquery', get_template_directory_uri().'/js/jquery.min.js', false,'1.10.2',true);
        wp_enqueue_script('jquery');
    }
    wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.4', true );
    
	wp_enqueue_script( 'pickurprojects-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'pickurprojects-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pickurprojects_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**************************************************************************************/

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Custom Items in Primary Menu
 */
function my_custom_menu_item($items, $args)
{
    if(is_user_logged_in() && $args->theme_location == 'primary')
    {
        $user=wp_get_current_user();
        $name=$user->display_name; // or user_login , user_firstname, user_lastname

        $items .= '<li class="dropdown">';
        $items .= '<a href="wordpress1/profile" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi '.$name.'!&nbsp;<span class="caret"></span></a>';

        	$items .= '<ul class="dropdown-menu">';
        	$items .= '<li><a href="wordpress1/profile">View Profile</a></li>';
            $items .= '<li><a href="wordpress1/uploads">My Uploads</a></li>';	    
        	$items .= '<li><a href="wordpress1/logout">Logout</a></li>';    
        	$items .= '</ul>';

        $items .= '</li>';

    }

    elseif (!is_user_logged_in() && $args->theme_location == 'primary') {

        /*$items .= '<li><a href="wordpress1/profile/login">Login</a></li>';
        $items .= '<li><a href="wordpress1/profile/register">Sign Up!</a></li>';*/
        
        $items .= '</ul><ul class="nav navbar-nav navbar-right nav-pills">';
            $items .= '<li><p class="navbar-btn"><a class="btn btn-success" href="wordpress1/profile/login">Sign in</a></p></li>';
            $items .= '<li><p class="navbar-btn"><a class="btn btn-primary" href="wordpress1/profile/register">Register</a></p></li>';
		/*$items .= '</ul>';*/
    }
    return $items;
}

add_filter( 'wp_nav_menu_items', 'my_custom_menu_item', 10, 2);

/**************************************************************************************/

/**
 * Function to add 'Image URL' Field on Add Category Page
 */

function pippin_taxonomy_add_new_meta_field() {
	?>
	<div class="form-field">
		<label for="term_meta[img]"><?php _e( 'Category Image URL', 'pippin' ); ?></label>
		<input type="text" name="term_meta[img]" id="term_meta[img]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
<?php
}

add_action( 'category_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );

/**
 * Function to add 'Edit Image URL' Field on Edit Category Page
 */

function pippin_taxonomy_edit_meta_field($term) {
	// put the term ID into a variable
	$t_id = $term->term_id;

	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>

	<tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[img]"><?php _e( 'Category Image URL', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[img]" id="term_meta[img]" value="<?php echo esc_attr( $term_meta['img'] ) ? esc_attr( $term_meta['img'] ) : ''; ?>">
            <p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
<?php
}

add_action( 'category_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );

/**
 * Function to save Image URL Field on Add and Edit Category Page
 */

function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) 
    {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );

		foreach ( $cat_keys as $key ) 
        {
			if ( isset ( $_POST['term_meta'][$key] ) ) 
            {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}

		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  

add_action( 'edited_category', 'save_taxonomy_custom_meta', 10, 2 );  

add_action( 'create_category', 'save_taxonomy_custom_meta', 10, 2 );

/*
 * Display Category Image
 */

function get_category_image($cat_id)
{
    $category = get_category($cat_id);
    $term_meta = get_option( "taxonomy_$cat_id" );

    $cat_img_src = $term_meta['img'];
    if(! isset($cat_img_src) || $cat_img_src == null)
    {
        $cat_img_src = get_stylesheet_directory_uri() . '/images/default-thumb-img.png'.'';
    }

    $src = '<img src="'.$cat_img_src.'" alt="'.$category->slug.'" height="200" width="200" class="img-rounded attachment-thumbnail wp-post-image"/><br/>';

    return $src;

}

/**************************************************************************************/

/**

 * Function to return default thumbnail if Post does not have one

 *

 */

function wpse55748_filter_post_thumbnail_html( $html ) 
{

    $id = get_post_thumbnail_id();

    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) 
    {
        return '<img src="' . get_stylesheet_directory_uri() . '/images/default-thumb-img.png" alt="'.get_the_title($id).'" width="200" height="200" class="attachment-thumbnail wp-post-image img-rounded"/>';
    }

    // Else, return the post thumbnail
    return $html;
}

add_filter( 'post_thumbnail_html', 'wpse55748_filter_post_thumbnail_html');

function mam_posts_query($query) {

    global $mam_posts_query;

    if ($mam_posts_query && strpos($query, 'ORDER BY RAND()') !== false) 
    {
        $query = str_replace('ORDER BY RAND()',$mam_posts_query,$query);
        //print_r("<p>$query</p>");
    }
    return $query;
}

add_filter('query','mam_posts_query');