<?php
// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'groupsite', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);
 


// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'groupsite') . get_query_var('paged');
    }
} // end get_page_number

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'group-menu' => 'Vertical Page Menu',
	'inner-menu' => 'Inner Page Menu',
	'footer-general' => 'Footer General',
	'quick-links' => 'Quick Links'
) );

// register_sidebar(array(
//         'before_widget' => '',
//         'after_widget' => '',
//         'before_title' => '<div class="title">',
//         'after_title' => '</div>',
//     ));
	
//add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );	
	
add_theme_support('post-thumbnails');
set_post_thumbnail_size(184, 119, true);
add_image_size( 'featured', 300, 9999 ); //300 pixels wide (and unlimited height)
add_image_size( '404X288', 404, 288, true );
add_image_size( '480X500', 480, 500, true );
add_image_size( '600X300', 600, 300, true );
add_image_size( '1170X392', 1170, 392, true );
add_image_size( '1170X526', 1170, 526, true );

function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );


function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/logo.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

add_filter('show_admin_bar', '__return_false');


//create well formatted titles
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$site_description $sep $title";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'apainsurance2015' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

// Removes ul class from wp_nav_menu
function remove_ul ( $menu ){
    return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
add_filter( 'wp_nav_menu', 'remove_ul' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

function add_link_atts($atts) {
	$atts['class'] = "list-group-item list-group-item-action";
    // $atts['style'] = '<i class="fas fa-angle-right me-2"></i>';
 
	return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');

//show a menu
function display_menu($menu){
	$defaults = array(
		'menu'            => $menu,
		'container'       => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		'add_li_class'  => 'dropdown-item',
	
	);
	wp_nav_menu( $defaults );
				
}

function display_f_menu($menu){
	$defaults = array(
		'menu'            => $menu,
		'container'       => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'items_wrap'      => '%3$s',
		'depth'           => 0,
		 'add_li_class'  => 'list-group-item list-group-item-action',
	);
	wp_nav_menu( $defaults );
				
}

// function add_additional_class_on_li($classes, $item, $args) {
//     if(isset($args->add_li_class)) {
//         $classes[] = $args->add_li_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// search filter
function fb_search_filter($query) {
if ( !$query->is_admin && $query->is_search) {
$query->set('post_type', array('impact','post','how_we_do_it', 'news', 'whatwedo', 'testimonials', 'involve', 'careers', 'newsletter') ); // id of page or post
}       
return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<link rel="stylesheet" href="'.get_bloginfo('template_directory').'/admin.css" type="text/css" media="all" />';
}


include_once('customposts.php');


function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));

}



function clean_value($str) {
    $str = trim($str);
    $str = preg_replace("@<script[^>]*>.+</script[^>]*>@i", "", $str);
    $str = preg_replace("@<style[^>]*>.+</style[^>]*>@i", "", $str);
    $str = strip_tags($str);
    //$str=mysql_real_escape_string($str);
    //return addslashes($str);
	return $str;
}

//Get attachment details
function wp_get_attachment_details( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'title' => $attachment->post_title,
		'url' => $attachment->guid
	);
}

function get_people_filter(){
	global $post;
	$companies=array();
	query_posts(array('post_type'=>'people'));
	if ( have_posts() ) while ( have_posts() ) : the_post();
	$company=get_post_meta($post->ID,'_personcompany', true);
	if(!in_array($company,$companies)){$companies[]=$company;}
	endwhile; wp_reset_query();
	return $companies;
}

// function get_product_list() {
// 	global $post;
// 	$products=array();
// 	$products=query_posts(array('post_type'=>'products'));
	
	
// 	foreach($products as $product)
// 	{
// 		 $productTitle=$product->post_title;
// 		 $productId=$product->ID;
	 
// 	}
	
	
// }
	

function is_phone($phone){
	$phone = str_replace("+","",$phone);
	$phone = str_replace(" ","",$phone);
	$phone = str_replace("(","",$phone);
	$phone = str_replace(")","",$phone);
	return is_numeric($phone);
}

//function to get List of branches from LMS
function get_lms_branches($department_id = 1){
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://apalms.squadlab.com/api/load-branches/".$department_id,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
		),
	));

	$response = curl_exec($curl);

	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		$result = array();
	} else {
		$result = json_decode($response);
	}

	return $result;
}

//add extra fields
include_once'extrafields.php';

function my_array_unique($array, $keep_key_assoc = false){
    $duplicate_keys = array();
    $tmp = array();       

    foreach ($array as $key => $val){
        // convert objects to arrays, in_array() does not support objects
        if (is_object($val))
            $val = (array)$val;

        if (!in_array($val, $tmp))
            $tmp[] = $val;
        else
            $duplicate_keys[] = $key;
    }

    foreach ($duplicate_keys as $key)
        unset($array[$key]);

    return $keep_key_assoc ? $array : array_values($array);
}


function set_views($post_ID) {
	$key = 'views';
	$count = get_post_meta($post_ID, $key, true); //retrieves the count

	if($count == ''){ //check if the post has ever been seen

		//set count to 0
		$count = 0;

		//just in case
		delete_post_meta($post_ID, $key);

		//set number of views to zero
		add_post_meta($post_ID, $key, '0');
      

	} else{ //increment number of views
		$count++;
		update_post_meta($post_ID, $key, $count);

      
	}

   
}

//keeps the count accurate by removing prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// function track_custom_post_product ($post_ID) {
// 	//you can use is_single here, to track all your posts. Here, we're traking custom post 'watch'
// 	if ( !is_singular( 'single-products') ) return; 

// 	if ( empty ( $post_ID) ) {

// 		//gets the global post
// 		global $post; 

// 		//extracts the ID
// 		$post_ID = $post->ID;    
// 	}

// 	//calls our previously defined methos
// 	set_views($post_ID);
// }
// //adds the tracker to wp_head.
// add_action( 'wp_head', 'track_custom_post_product');


/*=============================================
                BREADCRUMBS
=============================================*/
//  to include in functions.php
function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&raquo;'; // delimiter between crumbs
    $home = 'Home'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
} // end the_breadcrumb()




function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
  }


  //Image previous next function


function wpb_posts_nav(){
    $next_post = get_next_post();
    $prev_post = get_previous_post();
      
    if ( $next_post || $prev_post ) : ?>
      
        <div class="wpb-posts-nav">
            <div>
                <?php if ( ! empty( $prev_post ) ) : ?>
                    <a href="<?php echo get_permalink( $prev_post ); ?>">
                        <div>
                            <div class="wpb-posts-nav__thumbnail wpb-posts-nav__prev">
                                <?php echo get_the_post_thumbnail( $prev_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                        <div>
                            <strong>
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M13.775,18.707,8.482,13.414a2,2,0,0,1,0-2.828l5.293-5.293,1.414,1.414L9.9,12l5.293,5.293Z"/></svg>
                                <?php _e( 'Previous', 'textdomain' ) ?>
                            </strong>
                            <h4 class="nav-title" ><?php echo get_the_title( $prev_post ); ?></h4>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ( ! empty( $next_post ) ) : ?>
                    <a href="<?php echo get_permalink( $next_post ); ?>">
                        <div>
                            <strong>
                                <?php _e( 'Next', 'textdomain' ) ?>
                                <svg viewBox="0 0 24 24" width="24" height="24"><path d="M10.811,18.707,9.4,17.293,14.689,12,9.4,6.707l1.415-1.414L16.1,10.586a2,2,0,0,1,0,2.828Z"/></svg>
                            </strong>
                            <h4 class="nav-title"><?php echo get_the_title( $next_post ); ?></h4>

                         
                        </div>
                        <div>
                            <div class="wpb-posts-nav__thumbnail wpb-posts-nav__next">
                                <?php echo get_the_post_thumbnail( $next_post, [ 100, 100 ] ); ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div> <!-- .wpb-posts-nav -->
      
    <?php endif;
}
  




