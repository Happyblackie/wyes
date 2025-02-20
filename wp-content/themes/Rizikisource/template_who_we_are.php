<?php
   /*
   Template Name: Who We Are
   */



   $values = get_posts( array(
      'posts_per_page' => -1,
      'offset'         => 0,
     'post_type'      =>'values',
      'order' => 'ASC',
   ) );
     
 get_header(); ?>
      <!-- Header Start -->
        <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>
        
        <section class="section-padding-inner section-bg" id="section_2">
            <div class="container">
                <div class="row">
                <h1 class="text-center"> <?php the_title(); ?></h1>

            <div class="container-fluid bg-breadcrumb" >
               <div class="container text-center py-3" style="max-width: 900px;">
                  <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                  <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                  </p>    
               </div>
            </div>

      <!-- /Header Start -->

             <div class="col-12 pb-3">
                        <img src="<?php 
                       if($banner){
                       echo $banner[0];
                       }
                       else{ 
                          echo bloginfo('template_directory');?>/img/defaultbanner.jpg'
                    <?php  } ?>"
                            class="custom-text-box-image img-fluid" alt="">
             </div>

             <div class="col-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                     <div class="custom-text-box">
                           <p> <?php the_content(); ?></p>
                           <?php endwhile; wp_reset_query(); ?>
                     </div>
                  </div>  
                <div>
             </div>

            <div class="row">
             <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box mb-lg-0">
                           <h5 class="mb-3">Our Vision</h5>
                           <ul class="custom-list mt-2">
                                 <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    We envision a society where young people are empowered to lead, innovate, and drive
                                    sustainable development, striving to be a leading catalyst for youth empowerment and
                                    sustainable livelihoods in Kenya and beyond.

                                 </li>                              
                           </ul>

                          
                        </div>
                     </div>

                     <div class="col-lg-6 col-md-6 col-12">
                        <div class="custom-text-box mb-lg-0">
                          

                           <h5 class="mb-3">Our Mission</h5>

                           <ul class="custom-list mt-2 mb-5">
                                 <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    Worldlink Youth Empowerment Forum is on a mission to inspire, equip, and
                                    empower young people by providing skills development, entrepreneurship
                                    support, mentorship, and community engagement—all designed to spark real,
                                    sustainable socio-economic transformation. 
                                 </li>

                                 <li class="custom-list-item d-flex">
                                    <i class="bi-check custom-text-box-icon me-2"></i>
                                    It’s all about creating opportunities, igniting potential, and shaping a future
                                    where young leaders thrive and make a lasting impact! 
                                 </li>

                           </ul>
                        </div>
                     </div>
               </div>


               <div class="row">
                    

                        <div class="col-lg-12 col-md-12 col-12">
                           
                                

                           <!-- Values -->
                                    <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                       <div class="row g-1">
                                             <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.4s" id="gallery">
                                                      <div class=" rounded p-2 h-100">
                                                            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px; visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                                         <h2 class="display-4 mb-4"> Our Values</h2>
                                                      </div>
                                                   </div>
                                                </div>
                                             
                                        

                                             <?php foreach($values as $post){
                                             $valueicon =wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

                                             ?>
                                                <div class="col-md-6 col-lg-6 col-xl-4 pb-2 about wow fadeInUp" data-wow-delay="0.2s">
                                                   <div class="feature-item p-4 pt-0">
                                                   <div class="feature-icon value-img p-4 mb-4">
                                                         <img src="<?php 
                                                         if(  $valueicon){
                                                         echo   $valueicon[0];
                                                         }
                                                         else{ 
                                                            echo bloginfo('template_directory');?>/img/defaultbanner.jpg'
                                                      <?php  } ?>"
                                                               class="img-fluid" alt="<?php echo $post->post_title; ?>">
                                                         </div>
                                                         <h5 class="mb-3 drive-change"><?php echo $post->post_title; ?></h4>
                                                         <p class="text-dark">

                                                         <?php echo $post->post_content; ?>
                                                      
                                                         </p>
                                                   </div>
                                                </div>

                                              <?php } ?>
                                          </div>
                                    </div>
                              <!-- /Values -->

                     </div>
               </div>


               </div>
            </div>

         </div>
   </div>
</section>


  
        
         

    
  





  

    


<?php get_footer(); ?>

