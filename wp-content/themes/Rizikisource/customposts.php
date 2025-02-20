<?php


// Latest News
function custom_post_news() {
  $labels = array(
    'name'               => _x( 'Events', 'post type general name' ),
    'singular_name'      => _x( 'Events', 'post type singular name' ),
    'add_new'            => _x( 'Add Events', 'Events' ),
    'add_new_item'       => __( 'Add Events Item' ),
    'edit_item'          => __( 'Edit Events Item' ),
    'new_item'           => __( 'New Events' ),
    'all_items'          => __( 'All Events' ),
    'view_item'          => __( 'View Events' ),
    'search_items'       => __( 'Search Events' ),
    'not_found'          => __( 'No Events found' ),
    'not_found_in_trash' => __( 'No  Events found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the news description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
     'rewrite' => array('slug'=>'events'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'news', $args ); 
}
add_action( 'init', 'custom_post_news' );

// Donors
function custom_post_donor() {
  $labels = array(
    'name'               => _x( 'Donor', 'post type general name' ),
    'singular_name'      => _x( 'Donor', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'donor' ),
    'add_new_item'       => __( 'Add Donor Item' ),
    'edit_item'          => __( 'Edit Donor Item' ),
    'new_item'           => __( 'New Donor' ),
    'all_items'          => __( 'All Donors' ),
    'view_item'          => __( 'View Donors' ),
    'search_items'       => __( 'Search Donors' ),
    'not_found'          => __( 'No Donor found' ),
    'not_found_in_trash' => __( 'No  Donor found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Donors'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Donor description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'donor', $args ); 
}
add_action( 'init', 'custom_post_donor' );



// Partners
function custom_post_partner() {
  $labels = array(
    'name'               => _x( 'Partner', 'post type general name' ),
    'singular_name'      => _x( 'Partner', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'partner' ),
    'add_new_item'       => __( 'Add Partner Item' ),
    'edit_item'          => __( 'Edit Partner Item' ),
    'new_item'           => __( 'New Partner' ),
    'all_items'          => __( 'All Partners' ),
    'view_item'          => __( 'View Partners' ),
    'search_items'       => __( 'Search Partners' ),
    'not_found'          => __( 'No Partner found' ),
    'not_found_in_trash' => __( 'No  Partner found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Partners'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Partner description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'partner', $args ); 
}
add_action( 'init', 'custom_post_partner' );


// Partners
function custom_post_impact() {
  $labels = array(
    'name'               => _x( 'Impact', 'post type general name' ),
    'singular_name'      => _x( 'Impact', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Impact' ),
    'add_new_item'       => __( 'Add Impact Item' ),
    'edit_item'          => __( 'Edit Impact Item' ),
    'new_item'           => __( 'New Impact' ),
    'all_items'          => __( 'All Impacts' ),
    'view_item'          => __( 'View Impacts' ),
    'search_items'       => __( 'Search Impacts' ),
    'not_found'          => __( 'No Impact found' ),
    'not_found_in_trash' => __( 'No  Impact found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Impacts'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Impact description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'impact', $args ); 
}
add_action( 'init', 'custom_post_impact' );



// Home slides
function custom_post_homeslide() {
  $labels = array(
    'name'               => _x( 'Homeslide', 'post type general name' ),
    'singular_name'      => _x( 'Homeslide', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Homeslide' ),
    'add_new_item'       => __( 'Add Homeslide Item' ),
    'edit_item'          => __( 'Edit Homeslide Item' ),
    'new_item'           => __( 'New Homeslide' ),
    'all_items'          => __( 'All Homeslides' ),
    'view_item'          => __( 'View Homeslides' ),
    'search_items'       => __( 'Search Homeslides' ),
    'not_found'          => __( 'No Homeslide found' ),
    'not_found_in_trash' => __( 'No  Homeslide found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Home Slides'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Homeslide description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'homeslide', $args ); 
}
add_action( 'init', 'custom_post_homeslide' );

// How we do it 
function custom_post_how_we_do_it() {
  $labels = array(
    'name'               => _x( 'How we do it', 'post type general name' ),
    'singular_name'      => _x( 'How we do it', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'How we do it' ),
    'add_new_item'       => __( 'Add How we do it Item' ),
    'edit_item'          => __( 'Edit How we do it Item' ),
    'new_item'           => __( 'New How we do it' ),
    'all_items'          => __( 'All How we do it' ),
    'view_item'          => __( 'View How we do it' ),
    'search_items'       => __( 'Search How we do it' ),
    'not_found'          => __( 'No How we do it found' ),
    'not_found_in_trash' => __( 'No  How we do it found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'How we do it'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the How we do it description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'how_we_do_it', $args ); 
}
add_action( 'init', 'custom_post_how_we_do_it' );


// What we do impact how_we_do_it whatwedo
function custom_post_whatwedo() {
  $labels = array(
    'name'               => _x( 'What we do', 'post type general name' ),
    'singular_name'      => _x( 'What we do', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'whatwedo' ),
    'add_new_item'       => __( 'Add What we do Item' ),
    'edit_item'          => __( 'Edit What we do Item' ),
    'new_item'           => __( 'New What we do' ),
    'all_items'          => __( 'All What we do' ),
    'view_item'          => __( 'View What we do' ),
    'search_items'       => __( 'Search What we do' ),
    'not_found'          => __( 'No What we do found' ),
    'not_found_in_trash' => __( 'No  What we do found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'What we do'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the What we do description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'whatwedo', $args ); 
}
add_action( 'init', 'custom_post_whatwedo' );




// Services impact how_we_do_it services
function custom_post_services() {
  $labels = array(
    'name'               => _x( 'Services', 'post type general name' ),
    'singular_name'      => _x( 'Services', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'services' ),
    'add_new_item'       => __( 'Add Services Item' ),
    'edit_item'          => __( 'Edit Services Item' ),
    'new_item'           => __( 'New Services' ),
    'all_items'          => __( 'All Services' ),
    'view_item'          => __( 'View Services' ),
    'search_items'       => __( 'Search Services' ),
    'not_found'          => __( 'No Services found' ),
    'not_found_in_trash' => __( 'No  Services found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Services'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Services description',
    'public'        => true,
    'menu_position' => 8,
     'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),

  );
  register_post_type( 'services', $args ); 
}
add_action( 'init', 'custom_post_services' );










//Custom post type people
function custom_post_team() {
  $labels = array(
    'name'               => _x( 'Team', 'post type general name' ),
    'singular_name'      => _x( 'Person', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Team' ),
    'add_new_item'       => __( 'Add New Person' ),
    'edit_item'          => __( 'Edit Person' ),
    'new_item'           => __( 'New Person' ),
    'all_items'          => __( 'All Team' ),
    'view_item'          => __( 'View Person' ),
    'search_items'       => __( 'Search Team' ),
    'not_found'          => __( 'No Team found' ),
    'not_found_in_trash' => __( 'No Team found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Riziki Team'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the person description',
    'public'        => true,
    'menu_position' => 10,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail','excerpt'),
    'has_archive'   => false,
  
  );
  register_post_type( 'team', $args ); 
}
add_action( 'init', 'custom_post_team' );




//Custom post type people
function custom_post_bod() {
  $labels = array(
    'name'               => _x( 'BOD', 'post type general name' ),
    'singular_name'      => _x( 'BOD', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'BOD' ),
    'add_new_item'       => __( 'Add New BOD' ),
    'edit_item'          => __( 'Edit BOD' ),
    'new_item'           => __( 'New BOD' ),
    'all_items'          => __( 'All BOD' ),
    'view_item'          => __( 'View BOD' ),
    'search_items'       => __( 'Search BOD' ),
    'not_found'          => __( 'No BOD found' ),
    'not_found_in_trash' => __( 'No BOD found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Riziki BOD'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the BOD description',
    'public'        => true,
    'menu_position' => 10,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail','excerpt'),
    'has_archive'   => false,
  
  );
  register_post_type( 'bod', $args ); 
}
add_action( 'init', 'custom_post_bod' );



//Custom post type Testimonials
function custom_post_testimonials() {
  $labels = array(
    'name'               => _x( 'Testimonial', 'post type general name' ),
    'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Testimonial' ),
    'add_new_item'       => __( 'Add New Testimonial' ),
    'edit_item'          => __( 'Edit Testimonial' ),
    'new_item'           => __( 'New Testimonial' ),
    'all_items'          => __( 'All Testimonials' ),
    'view_item'          => __( 'View Testimonials' ),
    'search_items'       => __( 'Search Testimonials' ),
    'not_found'          => __( 'No Testimonials found' ),
    'not_found_in_trash' => __( 'No Testimonials found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => ' Testimonials'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Testimonials description',
    'public'        => true,
    'menu_position' => 10,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail','excerpt'),
    'has_archive'   => false,
  
  );
  register_post_type( 'testimonials', $args ); 
}
add_action( 'init', 'custom_post_testimonials' );

//Custom post type involve
function custom_post_involve() {
  $labels = array(
    'name'               => _x( 'Involve', 'post type general name' ),
    'singular_name'      => _x( 'Person', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Involve' ),
    'add_new_item'       => __( 'Add New Involvment' ),
    'edit_item'          => __( 'Edit Involvment' ),
    'new_item'           => __( 'New Involvment' ),
    'all_items'          => __( 'All Involvment' ),
    'view_item'          => __( 'View Involvment' ),
    'search_items'       => __( 'Search Involvment' ),
    'not_found'          => __( 'No Involvment found' ),
    'not_found_in_trash' => __( 'No Involvment found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Get Involved'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Involved description',
    'public'        => true,
    'menu_position' => 10,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail','excerpt'),
    'has_archive'   => false,
  
  );
  register_post_type( 'involve', $args ); 
}
add_action( 'init', 'custom_post_involve' );




//Custom post type careers
function custom_post_careers() {
  $labels = array(
    'name'               => _x( 'Careers', 'post type general name' ),
    'singular_name'      => _x( 'Career', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'career' ),
    'add_new_item'       => __( 'Add New Career' ),
    'edit_item'          => __( 'Edit Career' ),
    'new_item'           => __( 'New Career' ),
    'all_items'          => __( 'All Careers' ),
    'view_item'          => __( 'View Career' ),
    'search_items'       => __( 'Search Careers' ),
    'not_found'          => __( 'No Careers found' ),
    'not_found_in_trash' => __( 'No Careers found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Careers'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the career description',
    'public'        => true,
    'menu_position' =>8,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail','excerpt'),
    'taxonomies' => array('post_tag'),
    'has_archive'   => false
  );
  register_post_type( 'careers', $args ); 
}
add_action( 'init', 'custom_post_careers' );




//Custom post type Newsletter
function custom_post_newsletter() {
  $labels = array(
    'name'               => _x( 'Publication', 'post type general name' ),
    'singular_name'      => _x( 'Publication', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Publication' ),
    'add_new_item'       => __( 'Add New Publication' ),
    'edit_item'          => __( 'Edit Publication' ),
    'new_item'           => __( 'New Publication' ),
    'all_items'          => __( 'All Publications' ),
    'view_item'          => __( 'View Publications' ),
    'search_items'       => __( 'Search Publications' ),
    'not_found'          => __( 'No Publications found' ),
    'not_found_in_trash' => __( 'No Publications found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Publications'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Publications description',
    'public'        => true,
    'menu_position' => 12,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false
  );
  register_post_type( 'newsletter', $args ); 
}
add_action( 'init', 'custom_post_newsletter');




function custom_post_values() {
  $labels = array(
    'name'               => _x( 'Value', 'post type general name' ),
    'singular_name'      => _x( 'Value', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Value' ),
    'add_new_item'       => __( 'Add New Value' ),
    'edit_item'          => __( 'Edit Value' ),
    'new_item'           => __( 'New Value' ),
    'all_items'          => __( 'All Values' ),
    'view_item'          => __( 'View Values' ),
    'search_items'       => __( 'Search Values' ),
    'not_found'          => __( 'No Values found' ),
    'not_found_in_trash' => __( 'No Values found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Values'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add the Values description',
    'public'        => true,
    'menu_position' => 12,
    'taxonomies' => array('post_tag'),
    'supports'      => array( 'title','editor','thumbnail'),
    'has_archive'   => false
  );
  register_post_type( 'values', $args ); 
}
add_action( 'init', 'custom_post_values');








?>