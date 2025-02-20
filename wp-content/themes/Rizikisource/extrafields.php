<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */
/********************* META BOX DEFINITIONS ***********************/
/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = '_';
global $meta_boxes;
$meta_boxes   = array();


/*-------------------------------
---------------------------------
----------RIZIKI SOURCE----------------*/

// Meta box for careers
$meta_boxes[] = array(
	'title' => 'Advanced Fields',
	'pages' => array('careers'),
	'fields' => array(
			array(
				'name'             => esc_html__( 'Full Job Description PDF Upload', 'your-prefix' ),
				'id'               => "{$prefix}jobdescription",
				'type'             => 'file',
				// Delete image from Media Library when remove it from post meta?
				// Note: it might affect other posts if you use same image for multiple posts
				'force_delete'     => false,
				// Maximum image uploads
				'max_file_uploads' => 1,
				// Display the "Uploaded 1/2 files" status
				'max_status'       => true,
            ),
            array(
				'name'             => esc_html__( 'Deadline Date', 'your-prefix' ),
				'id'               => "{$prefix}endofappdate",
				'type'             => 'text',
			
            ),
	
	)
);


// Show if Fetured 
$meta_boxes[] = array(
    'title' => 'Featured',
    'pages' => array(
        'values' ,
    ),
    'fields' => array(
       
    
        array(
            // Field name - Will be used as label
            'name' => __('Ordering', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}ordering",
            // Field description (optional)
            'desc' => __('The order relative to others', 'meta-box'),
            'type' => 'text'
        ),
    
        
    )
);



// Our Impact
$meta_boxes[] = array(
    'title' => 'Impact Details',
    'pages' => array(
        'impact',
    ),
    'fields' => array(
      
        array(
            // Field name - Will be used as label
            'name' => __('Impact Number', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}impactno",
            // Field description (optional)
            'desc' => __('The order relative to others', 'meta-box'),
            'type' => 'number'
        ),
        
    )
);



$meta_boxes[] = array(
    'title' => 'Advanced Fields',
    'pages' => array(
        'team','bod'
    ),
    'fields' => array(
        //Award values
        // SELECT BOX
        array(
            // Field name - Will be used as label
            'name' => __('Designation', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}designation",
            // Field description (optional)
            'desc' => __('The persons designation', 'meta-box'),
            'type' => 'textarea'
        ),
        array(
            // Field name - Will be used as label
            'name' => __('Ordering', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}ordering",
            // Field description (optional)
            'desc' => __('The order relative to others', 'meta-box'),
            'type' => 'text'
        ),
 
   
        array(
            'name' => __('Management Level', 'meta-box'),
            'id' => "{$prefix}management_level",
            'type' => 'select',
            // Array of 'value' => 'Label' pairs for select box
            'options' => array(
                'volunteers' => __('Volunteers', 'meta-box'),
                'team' => __('Team', 'meta-box'),
                'management' => __('Management', 'meta-box'),
                'board' => __('Board of Directors', 'meta-box')
            ),
            // Select multiple values, optional. Default is false.
            'multiple' => false,
            'std' => 'team',
            'placeholder' => __('Select', 'meta-box')
        ),

      
    )
);


$meta_boxes[] = array(
    'title' => 'Social Links',
    'pages' => array(
        'team'
    ),
    'fields' => array(
        //Award values
        // SELECT BOX


        array(
            // Field name - Will be used as label
            'name' => __('Linkedin', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}linkedin",
            // Field description (optional)
            'desc' => __('Linkedin URL', 'meta-box'),
            'type' => 'text',
            'placeholder' => __('https://linkedin.com/in/username', 'meta-box')

        ),
   

      
    )
);

// News
$meta_boxes[] = array(
    'title' => 'Event Photos',
    'pages' => array(
        'news'
    ),
    'fields' => array(
        //Award values
        // SELECT BOX
        /*array(
        'name' => __( 'Promotional Slide', 'meta-box' ),
        'id'   => "{$prefix}promoslider",
        'type' => 'thickbox_image',
        ),*/
        // array(
        // 	'name'             => __( 'Promotional Slide', 'meta-box' ),
        // 	'id'               => "{$prefix}promoslider",
        // 	'type'             => 'image_advanced',
        // 	'max_file_uploads' => 4,
        // ),
        // PLUPLOAD IMAGE UPLOAD (WP 3.3+)
        array(
            'name' => __('Gallery', 'your-prefix'),
            'id' => "{$prefix}newsgallery",
            'type' => 'plupload_image',
            'max_file_uploads' => 9
        )
    )
);

//Featured stuff
$meta_boxes[] = array(
    'title' => 'Advanced Fields',
    'pages' => array(
        'newsletter'
    ),
    'fields' => array(
        // array(
        // 	'name'        => __( 'Category', 'meta-box' ),
        // 	'id'          => "{$prefix}download_category",
        // 	'type'        => 'select',
        // 	// Array of 'value' => 'Label' pairs for select box
        // 	'options'     => array(
        // 		'financials' => __( 'Financial', 'meta-box' ),
        // 		'trailblazer' => __( 'Trailblazer', 'meta-box' )
        // 	),
        // 	// Select multiple values, optional. Default is false.
        // 	'multiple'    => false,
        // 	'std'         => 'financials',
        // 	'placeholder' => __( 'Select', 'meta-box' ),
        // ),
        // array(
        // 	'name'             => __( 'Attachment', 'meta-box' ),
        // 	'id'               => "{$prefix}downloadfile",
        // 	'type'             => 'file_advanced',
        // 	'max_file_uploads' => 1,
        // 	'mime_type'        => 'application', // Leave blank for all file types
        // ),
        array(
            // Field name - Will be used as label
            'name' => __('Link', 'meta-box'),
            // Field ID, i.e. the meta key
            'id' => "{$prefix}thelink",
            // Field description (optional)
            'desc' => __('add the link here if the resource is hosted externally', 'meta-box'),
            'type' => 'text',
            // Default value (optional)
            'std' => __('', 'meta-box'),
            // CLONES: Add to make the field cloneable (i.e. have multiple value)
            'clone' => false
        ),
        array(
            'id' => $prefix . 'nas_file',
            'type' => 'file_input',
            'name' => esc_html__('File Input', 'metabox-online-generator')
        )
    )
);





/********************* META BOX REGISTERING ***********************/
/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if (!class_exists('RW_Meta_Box'))
        return;
    global $meta_boxes;
    foreach ($meta_boxes as $meta_box) {
        new RW_Meta_Box($meta_box);
    }
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action('admin_init', 'YOUR_PREFIX_register_meta_boxes');












