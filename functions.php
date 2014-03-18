<?php
ob_start();
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/*********************
INCLUDE NEEDED FILES
*********************/

/*
library/joints.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once('library/joints.php'); // if you remove this, Joints will break
/*
library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once('library/custom-post-type.php'); // you can disable this if you like
/*
library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once('library/admin.php'); // this comes turned off by default
/*
library/translation/translation.php
	- adding support for other languages
*/
// require_once('library/translation/translation.php'); // this comes turned off by default

/*********************
THUMNAIL SIZE OPTIONS
*********************/

// Thumbnail sizes
add_image_size( 'joints-thumb-600', 600, 150, true );
add_image_size( 'joints-thumb-300', 300, 100, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'joints-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'joints-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. 
*/

add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);
/*********************
MENUS & NAVIGATION
*********************/
// registering wp3+ menus
register_nav_menus(
	array(
		'main-nav' => __( 'The Main Menu' ),   // main nav in header
		'footer-links' => __( 'Footer Links' ) // secondary nav in footer
	)
);


function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first-item-in-menu';
    $items[count($items)]->classes[] = 'last-item-in-menu';
    return $items;
}

add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');
// the main menu
function joints_main_nav() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',           // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'jointstheme' ),  // nav name
    	'menu_class' => '',         // adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
    	'fallback_cb' => 'joints_main_nav_fallback'      // fallback function
	));

} /* end joints main nav */




// the footer menu (should you choose to use one)
function joints_footer_links() {
	// display the wp3 menu if available
    wp_nav_menu(array(
    	'container' => '',                              // remove nav container
    	'container_class' => 'footer-links clearfix',   // class of container (should you choose to use it)
    	'menu' => __( 'Footer Links', 'jointstheme' ),   // nav name
    	'menu_class' => 'nav footer-nav clearfix',      // adding custom nav class
    	'theme_location' => 'footer-links',             // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 0,                                   // limit the depth of the nav
    	'fallback_cb' => 'joints_footer_links_fallback'  // fallback function
	));
} /* end joints footer link */

// this is the fallback for header menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'top-bar top-bar-section',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function joints_footer_links_fallback() {
	/* you can put a default here if you like */
}

/*********************
SIDEBARS
*********************/

// Sidebars & Widgetizes Areas
function joints_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __('Sidebar 1', 'jointstheme'),
		'description' => __('The first (primary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer1',
		'name' => __('Footer1', 'jointstheme'),
		'description' => __('Footer 1.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',
	));
		register_sidebar(array(
		'id' => 'footer2',
		'name' => __('Footer2', 'jointstheme'),
		'description' => __('Footer 2.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',
	));
	register_sidebar(array(
		'id' => 'footer3',
		'name' => __('Footer3', 'jointstheme'),
		'description' => __('Footer 3.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',
	));

	register_sidebar(array(
		'id' => 'footer4',
		'name' => __('Footer4', 'jointstheme'),
		'description' => __('Footer 4.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="footer-widget footer-logo-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="footer-widget-title">',
		'after_title' => '</h4>',
	));

function search_form_no_filters() {
  // look for local searchform template
  $search_form_template = locate_template( 'searchform.php' );
  if ( '' !== $search_form_template ) {
    // searchform.php exists, remove all filters
    remove_all_filters('get_search_form');
  }
}
add_action('pre_get_search_form', 'search_form_no_filters');

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __('Sidebar 2', 'jointstheme'),
		'description' => __('The second (secondary) sidebar.', 'jointstheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!

class Use_Cases_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			__('Use Cases', 'text_domain'), // Name
			array( 'description' => __( 'Use Cases Widget (links to in-screen pop-ups)', 'text_domain' ), ) // Args
		);
	}

	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $title = apply_filters('widget_title', $instance['title']);
	   $text = $instance['text'];
	   $textarea = $instance['textarea'];
	   echo $before_widget;
	   // Display the widget
	   echo '<div class="widget-text wp_widget_plugin_box">';

	   // Check if title is set
	   if ( $title ) {
	      echo $before_title . $title . $after_title;
	   }

	   // Check if text is set
	   if( $text ) {
	      echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
	   }

	   if( $textarea ) {
	   		$ids = explode(',',$textarea);
	   }
	   echo "<ul class='use-cases-lists'>";
	   	foreach($ids as $id){

	   		//get post information
	   		$id = trim($id);
			$post = get_post( $id );
			$title = $post->post_title;
			$content = $post->post_content;

			//create 'Modal' pop-up display
		   echo '<div id="myModal' . $id . '" class="reveal-modal" data-reveal>
					
				  <h1>' . $title . '</h1>
				  <p class="lead">'. $content . '</p>
				  <a class="close-reveal-modal">&#215;</a> 
				</div>';

			//create link to display in widget
			echo '<li><a href="#" data-reveal-id="myModal' . $id . '" data-reveal>' . $title . '</a></li>';

		}

		echo "</ul>";

	   echo '</div>';
	   echo $after_widget;
	}

	function form($instance) {

		// Check values
		if( $instance) {
		     $title = esc_attr($instance['title']);
		     $text = esc_attr($instance['text']);
		     $textarea = esc_textarea($instance['textarea']);
		} else {
		     $title = '';
		     $text = '';
		     $textarea = '';
		}
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description (optional text):', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Desired Use Cases (enter post-ids separated by comma):', 'wp_widget_plugin'); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
		</p>
		<?php
	}

	// update widget
	function update($new_instance, $old_instance) {
	      $instance = $old_instance;
	      // Fields
	      $instance['title'] = strip_tags($new_instance['title']);
	      $instance['text'] = strip_tags($new_instance['text']);
	      $instance['textarea'] = strip_tags($new_instance['textarea']);
	     return $instance;
	}

}
add_action( 'widgets_init', function(){
     register_widget( 'Use_Cases_Widget' );
});


class Recent_Widget extends WP_Widget {
///THIS IS THE NEW RECENT POSTS WIDGET BECAUSE THE OTHER ONE DIDN'T DISPLAY THE DATE BEFORE THE TITLE
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Your site&#8217;s most recent Posts.") );
		parent::__construct('recent-posts', __('iRODS Recent Posts'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_posts', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
		if ( ! $number )
 			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
			<?php if ( $show_date ) : ?>
				<span class="recents-post-date"><?php echo get_the_date("F j"); ?><br /></span>
			<?php endif; ?>
				<a class="recents-posts-link" href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_posts', $cache, 'widget');
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
	}

function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}
} // class Recent_Widget

// register Recent_Widget widget
function register_recent_widget() {
    register_widget( 'Recent_Widget' );
}
add_action( 'widgets_init', 'register_recent_widget' );

/*********************
COMMENT LAYOUT
*********************/

// Comment Layout
function joints_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class('panel'); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
			<header class="comment-author">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<?php printf(__('<cite class="fn">%s</cite>', 'jointstheme'), get_comment_author_link()) ?> on
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'jointstheme')); ?> </a></time>
				<?php edit_comment_link(__('(Edit)', 'jointstheme'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e('Your comment is awaiting moderation.', 'jointstheme') ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!



?>