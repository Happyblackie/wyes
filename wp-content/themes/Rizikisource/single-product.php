<?php get_header(); ?> <?php
   set_views($post->ID);
   
      $tags = wp_get_post_tags($post->ID);
      $content_post = get_post($post->ID);
      $content = $content_post->post_content;
      $title = $content_post->post_title;
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);


      $myproducts = get_posts( array(
        'posts_per_page' => -1,
        'offset'         => 0,
        'post_type'=>'product',
        'term'=>'slug'
    ),
    $args = array(
           'tax_query' => array(
           array(
           //'taxonomy' => 'recipe_tx',
           'field' => 'term_taxonomy_id',
           'terms' =>  $tagid
            )
         )
       )
    );
       $query = new WP_Query( $args ); 
      
         global $post;
         $tempPostVar = $post;
         $editScreenId = $post->ID;
         $mainproductname = $post->post_title;
         $maintexpertise=$post->post_title;
       'maintexpertise=='. $maintexpertise . '<br>';
         
         // exit;
      

         // KO Associates
        
         $people = get_posts( array(
            'posts_per_page' => -1,
            'offset'         => 0,
            'post_type'=>'people',
            'term'=>'slug'
        ));

        $insights = get_posts( array(
         'posts_per_page' => 12,
         'offset'         => 0,
         'post_type'=>'insight',
         'term'=>'slug'
     ));

     $expertise = get_posts( array(
      'posts_per_page' => -1,
      'offset'         => 0,
      'post_type'=>'expertise',
      'term'=>'slug'
  ));   
  
  $works = get_posts( array(
    'posts_per_page' => 12,
    'offset'         => 0,
    'post_type'=>'work',
    'term'=>'slug',
    'order' => 'ASC',

));   


$news = get_posts( array(
   'posts_per_page' => 12,
   'offset'         => 0,
   'post_type'=>'news',
   'term'=>'slug',
   'order' => 'ASC',

));   
  


// foreach( $insights as $insight){

//    $iworkID = get_post_meta($insight->ID,'_expertise', false); 
//    // echo   'expertise= '.   get_the_title($expertise[0]) . '<br>';
//  $iWork = get_the_title($iworkID[0]);

//    if(!empty($Iexpertise == $maintexpertise)){

//       echo "postname=" . $insight->post_title .'<br>'; 


//    }

// }

// get post id of all items under specific insights  and put them in an array

         
?>

<div class="col-lg-12  inner-banner">
            
            </div>
    

<div class="container">
   <div class="row">

   <div class="col-md-12 pb-4">
     <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
  </div> 
  
      <div class="col-md-3 pb-3"  id="rearrange">
       
           <div class="submenu">
             <div class="list-group">
                     <h4>Our Partners</h4>

<?php



    foreach( $myproducts as $work){
  ?>
        <a href="<?php the_permalink($work->ID); ?>" class="list-group-item list-group-item-action <?php if($work->post_title ==$mainproductname){echo 'active aria-current="true"' ;}?> "  title="<?php echo $work->post_title ?>"><?php echo $work->post_title  ?></a>
    <?php  }   wp_reset_postdata();  ?>
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
                     <?php  } ?>"   class="pb-3 bannerimage img-fluid"/>

                     <?php endwhile; wp_reset_query(); ?>   
                     
                     <h2 class="pt-3 singleh2"><?php the_title(); ?> </h2>
  
         <?php the_content();       wp_reset_postdata(); ?>

      
                        
            </div>
         </div>
      </div>
      </div>
      </div>
            
         <!-- /Insights -->

      </div>

   </div>
</div>



<?php get_footer(); ?> 

