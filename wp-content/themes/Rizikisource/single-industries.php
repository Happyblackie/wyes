<?php get_header(); ?> <?php
   set_views($post->ID);
   
      $tags = wp_get_post_tags($post->ID);
      $content_post = get_post($post->ID);
      $content = $content_post->post_content;
      $title = $content_post->post_title;
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
      

         global $post;
         // $tempPostVar = $post;
         $editScreenId = $post->ID;
         $mainproductname = $post->post_title;
         $maintexpertise=$post->post_title;



$products = get_posts( array(
   'posts_per_page' => -1,
   'offset'         => 0,
   'post_type'=>'product',
   'term'=>'slug'
)); 


  
//   $tags = array();
//   foreach ($peoples as $peoplecat) {
// $post_tags =  get_post_meta($peoplecat->ID, '_staffcategory', true );

//   // $pslug = preg_replace("/[^a-zA-Z0-9]+/", "", $post_tags[0]->slug);
// $pslug = $post_tags ;

//   $tags[$peoplecat->ID] = $pslug;
  
//  }


// $expertiselist=array();

//  foreach( $people as $rpeople){

//    $iExpertiseID = get_post_meta($rpeople->ID,'_pexpertise', false); 


//    $expertiselist[$rpeople->ID]=$iExpertiseID;
  
// }

// <-- your array
// $final=array();

// //remove arrays inside arrays 
// foreach ($expertiselist as $key1=>$arr) {
 
//     foreach ($arr as $key=>$block) {
      
//         $final[$key1 . ',' .$key] = $block; //get id's
//     }
// }


$industries = get_posts( array(
   'posts_per_page' => -1,
   'offset'         => 0,
   'post_type'=>'solution',
   'term'=>'slug',
   'meta_key' => '_ordering', 
   'orderby' => 'meta_value_num',
   'order' => 'ASC',
));   


foreach($products as $rwork) {
   // $category= get_post_meta( $rwork->ID, '_wexpertise', false ); 
     // wp_reset_query();
   $solargs = get_posts(array(
     'posts_per_page' => 12,
     'offset'         => 0,
     'post_type'     => 'product',
     'meta_key'      => '_jcil', 
     'meta_value'    =>   $editScreenId,   
 
   ));

}




// print_r($query); exit;

// foreach($argsone as $thepeople){

//    $args = get_posts(array(
//       'posts_per_page' => -1,
//       'offset'         => 0,
//       'post_type'     => 'people',
//       'meta_key' => '_ordering', 
//       'orderby' => 'meta_value_num',
//       'order' => 'ASC',
//       'meta_key'      => '_pexpertise',
//       'meta_value'    =>   $editScreenId,
    
//     ));
  

// }









// print_r($peoplesval );



// exit;

// foreach ($peoplesval  as $key=>$value){

//    echo 'key=='. $key;

//    $split_arr = explode(", ", $value);

   
// echo $split_arr[0]."<br/>";

// echo $split_arr[1]."<br/>";

// echo $split_arr[2]."<br/>";

// echo $split_arr[3]."<br/>";


// }
 
?>

   



    <div class="col-lg-12  inner-banner">
   </div>
  
        

<div class="container pt-5">
   <div class="row">
   <div class="col-md-12 pb-5">
     <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
  </div> 
      <div class="col-md-3 pb-3" id="rearrange">
           <div class="submenu">
             <div class="list-group">
                     <h4>Solutions</h4>
                     <?php
                   	foreach ($industries  as $ppertise ) :
                        setup_postdata($ppertise );
                        $postMeta=get_post_meta($ppertise->ID);
                    ?>
                 
                  <a href="<?php the_permalink($ppertise->ID); ?>" class="list-group-item list-group-item-action <?php if($ppertise->ID == $editScreenId){echo 'active aria-current="true"';} ?> " ><?php echo $ppertise->post_title; ?></a>
                     <?php
                      endforeach; wp_reset_query(); 
                        ?>
               </div>
            </div>
         </div>
     

      <div class="col-md-9">

      
     <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                  $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                  $bannercaption = get_post_meta($post->ID,'_bannercaption', true); 
               ?>

     <img src="<?php 
                        if($banner){
                        echo $banner[0];
                        }
                        else{ 
                           echo bloginfo('template_directory');?>/img/mainpagedefault.jpg'
                     <?php  } ?>" class="pb-3 bannerimage img-fluid"/>

                     <?php endwhile; wp_reset_query(); ?>   
                     
                     <h2 class="pt-3 singleh2"><?php the_title(); ?> </h2>

      <p class="iphase"><em><?php echo get_post_meta($post->ID,'_iphase', true);  ?></em></p>
   
         <?php the_content();?>
   
    

</div>
      </div>

     

   </div>
</div>



<?php get_footer(); ?> 

