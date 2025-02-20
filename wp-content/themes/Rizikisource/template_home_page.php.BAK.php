<?php
   /*
   Template Name: Home Page
   */


   $homeslide = get_posts( array(
      'posts_per_page' => -1,
      'offset'         => 0,
     'post_type'      =>'homeslide',
      'order' => 'ASC',
  ) );


  $impact = get_posts( array(
   'posts_per_page' => 5,
   'offset'         => 0,
  'post_type'      =>'impact',
   'order' => 'ASC',
) );


$donors = get_posts( array(
    'posts_per_page' => 15,
    'offset'         => 0,
   'post_type'      =>'donor',
    'order' => 'ASC',
 ) );


$partner = get_posts( array(
   'posts_per_page' => 15,
   'offset'         => 0,
  'post_type'      =>'partner',
   'order' => 'ASC',
) );
  
  

 
$whatwedo = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'how_we_do_it',
    'order' => 'ASC',
 ) );


 $events = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'news',
    'order' => 'DESC',
 ) );



 get_header(); ?>


<?php
// $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => '-1' ) );

// if ( $loop->have_posts() ) :

//     while ( $loop->have_posts() ) : $loop->the_post();

//         // get all of the terms for this post, with the taxonomy of categories-projets.
//         $terms = get_the_terms( $post->ID, 'post_tag' );
//         the_title();

//         // create the span element, and write out the date this post was created.
//         echo "<span>" . the_date();

    

//         foreach ( $terms as $term ) {
//          // echo $term->name; //Display all terms
         
//         }
        
//         echo $term->name; //Display one term for each
        
//         echo "</span>";


//     endwhile;
//     wp_reset_query();

// endif;


?>

<!-- Carousel Start -->
<section class="hero-section hero-section-full-height">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12 col-12 p-0">
                        <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
      <?php
      if ( $homeslide ) {
         $count=0;
         foreach ($homeslide as $post ) :
            
            setup_postdata( $post );
            $postMeta=get_post_meta($post->ID);
            $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '1200x628');
            
         ?>
          <div class="carousel-item <?php if ($count == 0  ) {?> active <?php  } else { } ?>">
                                    <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                        class="carousel-image img-fluid" alt="<?php echo $post->post_title; ?>">

                                    <div class="carousel-caption d-flex flex-column justify-content-center">
                                        <h1><?php echo $post->post_title; ?></h1>

                                        <p class="text-light"> <?php echo wp_trim_words( ($post->post_content), 15);  ?> </p>
                                    </div>
                                </div>
      <?php 	
         $count++;	
      endforeach;
      wp_reset_postdata();
      }
      ?> 


                  </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#hero-slide"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
<!-- Carousel End -->

<!-- Introduction-->
<div class="container-fluid faq-section bg-light py-5 ">
      <div class="container py-5">
      <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">


      <div class="content-csr inner-pages">
<?php
   if (have_posts()) while (have_posts()) : the_post();  {?>

              
                    <p class="mb-0"><?php the_content(); ?>
                    </p>

                    <?php }endwhile; wp_reset_query(); ?>
                </div>
                </div>
                </div>
                </div>
         

              
            <!-- Stats Section -->

          
    <section id="stats" class="stats section dark-background">

      <div class="col-lg-10 col-12 text-center text-white mx-auto">
                    <h2 class="mb-5" style="z-index: 2; position: relative;">Our Impact</h2>
                </div>

        <img src="<?php bloginfo('template_directory'); ?>/images/impact.png" alt="Impact" data-aos="fade-in">
  
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
  
          <div class="row gy-4 justify-content-center">

          <?php

          foreach ($impact as $post ) {
            
            setup_postdata( $post );
            $postMeta=get_post_meta($post->ID);
            $impactCount= get_post_meta( $post->ID, '_impactno', true );
            
            ?>
  
            <div class="col-6 col-sm-6 col-md-6 col-lg-4">
              <div class="stats-item text-center w-100 h-100">
              
                 
                <span data-purecounter-start="0" data-purecounter-end="<?php echo  $impactCount ;?>" data-purecounter-duration="1" class="purecounter"></span>
             
                <p><?php the_content(); ?></p>
              </div>
            </div><!-- End Stats Item -->

         <?php wp_reset_query();  }?>
        
  
          </div>
  
        </div>
  
      </section><!-- /Stats Section -->

        <section class="section-padding" >
                  <div class="container">
                     <div class="row">

                     <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="mb-5  text-primary">What we do</h2>
                    </div>

                <div class="splide riziki-whatwedo" role="group" aria-label="partners">
                    <div class="splide__track">
                       <ul class="splide__list">
                     <?php foreach($whatwedo as $w) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($w->ID), '1200x628');
                     ?>

                       <li class="splide__slide pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                    class="custom-block-image img-fluid" alt="<?php echo $w->post_title; ?>">

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php echo $w->post_title; ?></h5>

                                          <p> <?php echo wp_trim_words($w->post_content, 15); ?> </p>

                                    </div>

                                    <a href="<?php echo get_the_permalink($w->ID); ?>" class="custom-btn btn">Learn More</a>
                                 </div>
                              </div>
                     </li>
                      <?php wp_reset_query();  }?> 
                    
                    
                       </ul>
                      </div>
                  </div>

                     </div>
                  </div>
            </section>

            <section class="section-padding section-bg " >
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <img src="<?php bloginfo('template_directory'); ?>/img/how-we-drive-change.jpg"
                            class="custom-text-box-image img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 col-12 col-lg-6 col-12 justify-content-center">
                        <div class="custom-text-box custom-text-box mt-5 mb-5">
                            <h2 class="mb-2 drive-change">How we drive change</h2>

                       
                            <ul class="custom-list mt-2">
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Employability and life skills development
                                        </li>
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Facilitating work placements
                                        </li>
                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            workplace accessibility audits and employer inclusion trainings
                                        </li>

                                        <li class="custom-list-item d-flex">
                                            <i class="bi-check custom-text-box-icon me-2"></i>
                                            Entrepreneurship skills development and business grants support.
                                        </li>

                                      
                                    </ul>



                           
                        </div>

                    </div>

                </div>
            </div>
        </section>
        
      
        
      <section class="section-padding ">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 col-12 text-center mx-auto">
                        <h2 class="mb-5  text-primary">How we do it</h2>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#!" class="d-block">
                                <img src="<?php bloginfo('template_directory'); ?>/images/icons/skill-development.png" class="featured-block-image img-fluid" alt="Skill Development">

                                <p class="featured-block-text">Skill<strong> Development</strong></p> 
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#!" class="d-block">
                                <img src="<?php bloginfo('template_directory'); ?>/images/icons/work-placement.png" class="featured-block-image img-fluid" alt="Work Placement">

                                <p class="featured-block-text"><strong>Work</strong> Placement</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#!" class="d-block">
                                <img src="<?php bloginfo('template_directory'); ?>/images/icons/employer-engagement.png" class="featured-block-image img-fluid" alt="Eployer Engagement">

                                <p class="featured-block-text"><strong>Employer </strong> Engagement</p>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0 mb-md-4">
                        <div class="featured-block d-flex justify-content-center align-items-center">
                            <a href="#!" class="d-block">
                                <img src="<?php bloginfo('template_directory'); ?>/images/icons/entrepreneurship-support.png" class="featured-block-image img-fluid" alt="Enterpreneurship Support">

                                <p class="featured-block-text">Entrepreneurship<strong> Support</strong></p>
                            </a>
                        </div>
                    </div>

                  

                </div>
            </div>
        </section>

           
<!-- Donors Section -->
        <section class="volunteer-section section-padding">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                <div class="col-lg-10 col-12 text-center text-white mx-auto">
                    <h2 class="text-white mb-5">Our Donors</h2>
                </div>
                   

   
        <div class="container pb-3" data-aos="fade-up" data-aos-delay="100">
               <div class="splide riziki-donors" role="group" aria-label="donors">
                    <div class="splide__track">
                     <ul class="splide__list">

                            <?php

                            if ( $donors) {
                                $count=0;
                                foreach ($donors as $post ) :
                            
                            setup_postdata( $post );
                            $postMeta=get_post_meta($post->ID);
                            $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                            
                            ?>


                            <li class="splide__slide"><img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="img-fluid" alt="<?php echo $post->post_content; ?>">
                            </li>
                                <?php 	
                            $count++;	
                            endforeach;
                            wp_reset_postdata();
                            }
                            ?> 
                   </ul>
              </div>
          </div>
      </div>

                </div>
            </div>
        </section>


          
<!-- /Donors Section -->
<!-- Partners Section -->

        <section class="cta-section section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                <div class="col-lg-10 col-12 text-center text-white mx-auto">
                    <h2 class="mb-5" >Our Partners</h2>
                </div>
                   
      



        <div class="container pb-3" data-aos="fade-up" data-aos-delay="100">
               <div class="splide riziki-partners" role="group" aria-label="partners">
                    <div class="splide__track">
                     <ul class="splide__list">

                            <?php

                            if ( $partner) {
                                $count=0;
                                foreach ($partner as $post ) :
                            
                            setup_postdata( $post );
                            $postMeta=get_post_meta($post->ID);
                            $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                            
                            ?>


                            <li class="splide__slide"><img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="img-fluid" alt="<?php echo $post->post_content; ?>">
                            </li>
                                <?php 	
                            $count++;	
                            endforeach;
                            wp_reset_postdata();
                            }
                            ?> 
                   </ul>
              </div>
          </div>
      </div>
                 </div>
            </div>
        </section>
        
<!-- Partners Section -->



<section class="section-padding" >
                  <div class="container">
                     <div class="row">

                     <div class="col-lg-10 col-12 text-center mx-auto  dark-background">
                        <h2 class="mb-5  text-primary">Events</h2>
                    </div>

                <div class="splide riziki-events" role="group" aria-label="partners">
                    <div class="splide__track">
                       <ul class="splide__list">
                     <?php foreach($events as $w) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($w->ID), '1200x628');
                     ?>

                       <li class="splide__slide pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                    class="custom-block-image img-fluid" alt="<?php echo $w->post_title; ?>">

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php echo $w->post_title; ?></h5>

                                          <p> <?php echo wp_trim_words($w->post_content, 15); ?> </p>

                                    </div>

                                    <a href="<?php echo get_the_permalink($w->ID); ?>" class="custom-btn btn">Learn More</a>
                                 </div>
                              </div>
                     </li>
                      <?php wp_reset_query();  }?> 
                    
                    
                       </ul>
                      </div>
                  </div>

                     </div>
                  </div>
            </section>

        
        







  



    <!--footer--> <?php get_footer(); ?>

      
      

  