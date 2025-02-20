<?php
   /*
   Template Name: Career Page
   */


   //dispaly tags and categroy in cloud
//    $args = array(
//     'taxonomy' => array( 'post_tag', 'category' ), 
// ); 


   // wp_reset_query();
   $careers = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
    'post_type'=>'careers',
    'order' => 'ASC',
   
));




?> <?php get_header(); ?>


<!-- Header Start -->
<section class="section-padding-inner section-bg" id="section_2">
  <div class="container">
    <div class="row"> <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?> <h1 class="text-center"> <?php the_title(); ?> </h1>
      <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
          <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"> <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> </p>
        </div>
        <p> <?php the_content(); ?> </p>
      </div> <?php endwhile; wp_reset_query(); ?>
      <!--/Header Start -->
      <!-- Blog Start -->
      <section class="news-section ">
        <div class="container">
         
            <div class="col-12"> 
            <div class="row">

            <!-- ======= Team Section ======= -->
   <?php 
      $filteredtags = array();

      if($careers) {?>

      <h5>Submitted Applications to  <a href="mailto:info@rizikisource.org"  target="_blank">info@rizikisources.org</a></h5>

     <?php }?>

      <?php 
             
      query_posts(array('post_type'=>'careers', 'order'=>'DESC', 'posts_per_page'=>-1));
           if ( have_posts() ) while ( have_posts() ) : the_post();
       $benefitags =get_the_tags();
       if($benefitags) {
     foreach($benefitags as $filtered)

     {
       $filteredtags[$filtered->name] = $filtered->term_taxonomy_id;
     }

   }   
     // 
   endwhile;  wp_reset_query();   
   $sino=array_unique($filteredtags);
      
      //  print_r($sino); 
      //  exit; ?>
  
         <?php
            if($sino){
                foreach($sino as $key=>$custom_term) {
            
            
              // wp_reset_query();
              $args = array('post_type' => 'careers',
              'order'=>'DESC',
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'post_tag',
                          'field' => 'term_taxonomy_id',
                          'terms' => $custom_term,
                      ),
                  ),
               );
            
               $loop = new WP_Query($args);
            
            //  print_r($loop);
            //  exit;
            
            if($loop->have_posts())
             {
            ?>
         <div class="row pt-3">
            <!-- <h6><?php //echo $key; ?> </h6> -->
            <?php
               while($loop->have_posts()) : $loop->the_post();
    
            
               ?>
  
            <div class="item careers show-up wow fadeInUp  col-lg-4 col-md-4  <?php echo $pslug ?>">
               <div class="portfolio-item">
                           
                           <div class="down-content">
 
                     <h5>Job Title: <?php the_title() ?></h5>
   
                     <?php echo wp_trim_words(get_the_content($post->ID), 30); ?>
                    
                     <div class="social pb-3 pt-3">
                        <div class="bd-example">

                        <p><b>Published Date: <?php  echo get_the_date( 'Y-m-d' );  ?></b></p>
                        <p><b>Deadline: <?php echo get_post_meta($post->ID,'_endofappdate',  true) ?></b></p>
                           <a href="<?php echo wp_get_attachment_url( get_post_meta($post->ID,'_jobdescription', true) )?>" type="button" target="_blank" class="btn btn-primary">
                           Download Full JD    </a>
                           <a href="mailto:info@rizikisource.org"  type="button" class="btn btn-primary" targe="_blank" >
                          Apply
                        </a>
                       
                        </div>
                      
                     </div>
                  </div>
               </div>
            </div>
            <?php endwhile; wp_reset_query(); ?>
         </div>
      </div>
      <!-- End Team Section -->
      <?php } } ?>  
   </div>
   <?php } ?>  

   </div>
               
            

         
          </div>
        </div>
      </section> <?php get_footer(); ?>