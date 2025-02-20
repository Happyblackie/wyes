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
    'post_type'      =>'whatwedo',
        'order' => 'ASC',
    ) );


    $howwedoit = get_posts( array(
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


    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

      <?php
                                    if ( $homeslide ) 
                                    {
                                        $count=0;
                                        foreach ($homeslide as $post ) :
                                            
                                            setup_postdata( $post );
                                            $postMeta=get_post_meta($post->ID);
                                            $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '1200x628');
                                            
                                        ?>

        <div class="carousel-item <?php if ($count == 0  ) {?>active <?php  } else { } ?>">
          <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" alt="<?php echo $post->post_title; ?>">
          <div class="carousel-container">
            <h2><?php echo $post->post_title; ?><br></h2>
            <p><?php echo wp_trim_words( ($post->post_content), 15);  ?> </p>
            <a href="<?php echo get_the_permalink($post->ID); ?>" class="btn-get-started">Get Started</a>
          </div>
        </div><!-- End Carousel Item -->

        <?php 	
                                            $count++;	
                                            endforeach;
                                        wp_reset_postdata();
                                    }
                                ?> 

   

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->


     <!-- Stats Section -->
     <section id="stats" class="stats section">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4">
  <?php

if ( $partner) {
    $count=0;
    foreach ($partner as $post ) :

setup_postdata( $post );
$postMeta=get_post_meta($post->ID);
$slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

?>


    <?php if (have_posts()) 
    while (have_posts()) : the_post();  { ?>

<div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
      <i class="bi bi-emoji-smile"></i>
      <div class="stats-item">
        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
        <p><?php the_title();?></p>
      </div>
    </div><!-- End Stats Item -->
               


            

<?php }endwhile; wp_reset_query(); ?>


<?php 	
            $count++;	
            endforeach;
            wp_reset_postdata();
            }
        ?> 


  </div>

</div>

</section><!-- /Stats Section -->

<!-- Introduction-->
<div class="container-fluid faq-section bg-light py-5 ">

        <div class="container py-5">

                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">


                        <div class="content-csr inner-pages">
                            <?php if (have_posts()) 
                                        while (have_posts()) : the_post();  { ?>

<h1 class="mb-0">                   
                                                    <?php the_title(); ?>
                                        </h1>

                                                <p class="mb-0">
                                                    <?php the_content(); ?>
                                                </p>

                                <?php }endwhile; wp_reset_query(); ?>
                        </div>
                </div>

        </div>

</div>
    
        </section>


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


                                            <li class="splide__slide">

                                                <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>" class="img-fluid" alt="<?php echo $post->post_content; ?>">

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

    <!--footer--> <?php get_footer(); ?>

      
      

  