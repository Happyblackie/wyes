<?php
define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die('Sorry pal you can not be here');}
require('../../../wp-load.php');
$person_id=$_REQUEST['person'];
global $post;
$person = get_post($person_id); 
setup_postdata($person);
$img=wp_get_attachment_image_src( get_post_thumbnail_id($person_id), '480X500');
?>

<div class="profile-wrap">
	<!--<div class="close"><img src="images/close-profile.png" alt="close"/></div>-->
	<div class="profile">
    		 <?php if(!empty($img)){ ?>
                <img src="<?php echo $img[0]; ?>" />
            <?php } ?>
            <h1><?php echo get_the_title($person_id); ?></h1>
            <h2><?php echo get_post_meta($person_id,'_designation', true); ?></h2>
    </div>
    
    <div class="designation">
            
            <?php the_content(); ?>
    </div>

</div>
