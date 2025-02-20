<?php
   /*
   Template Name: Board of Directors
   */

   // wp_reset_query();
 
$team = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'bod',
   'meta_key' => '_ordering', 
   'orderby' => 'meta_value_num',
    'order' => 'ASC',
) );
   ?>
<?php get_header(); ?>

   <!-- Header Start -->
           
        <section class="section-padding-inner section-bg" id="section_2">
            <div class="container">
                <div class="row">

                
<?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?>
                <!-- <h1 class="text-center"> <?php the_title(); ?></h1> -->

                <div class="container-fluid bg-breadcrumb" >
                    <!-- <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>    
                    </div> -->

                    <p> <?php the_content(); ?></p>
                     <?php endwhile; wp_reset_query(); ?>
                </div>

             

            <div class="col-12">
                        <div class="custom-text-box  mt-0">                      
                          <!-- Team Section -->
                                <section id="team" class="team section light-background">

                            <!-- Section Title -->
                            <div class="container section-title text-center pt-2" data-aos="fade-up">
                           
                            </div><!-- End Section Title -->

                            <div class="container">

                                <div>
                                    <h2>Organizational Structure</h2>
                                    <p>
                                      Our organizational structure is designed for impact, accountability, and innovation.
                                      The Board of Trustees provides strategic direction, while our Executive Director leads with 
                                      vision and purpose.
                                      Our Program Managers drive key focus areas like agribusiness, climate action, advocacy, 
                                      and leadership, ensuring real change on the ground. 
                                      Backed by a Finance Officers for transparency and sustainability, our youth leaders and 
                                      volunteers are at the heart of everything we do—fueling progress and creating lasting 
                                      impact in communities.
                                    </p>
                                    
                                </div>
                                <h2 style="font-weight: 800; margin-left:auto;margin-right:auto;max-width:fit-content;">Board of Trustees</h2>
                              <div class="row gy-4 mb-5">
                                

                              <?php foreach($team as $post){




                            $desingation = get_post_meta($post->ID,'_designation', true); 
                            $management_level= get_post_meta($post->ID,'_management_level', true); 
                          
                            $linkedin = get_post_meta($post->ID,'_linkedin', true); 
                            // $profilepic=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');

                            ?>


                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                  <div class="team-member">
                                    <div class="member-img">  
                                                                                          <!--  <?php echo $poset->post_title ?> -->
                                    <img src="<?php echo $profilepic[0] ?>" class="img-fluid" alt="">
                                      <!-- <div class="social">
                                      
                                        <a href="<?php echo   $linkedin  ?>" tartget="_blank"><i class="bi bi-linkedin"></i></a>
                                      </div> -->
                                    </div>
                                    <div class="member-info">
                                      <h4><?php the_title() ?></h4>
                                      <!-- <span><?php echo   $desingation  ?></span> -->
                                      <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop-<?php echo $post->ID ?>">
                                        View Profile
                                        </button> -->
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal  -->




                                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop-<?php echo $post->ID ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?php the_title() ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <?php echo  $post->post_content ; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

                                <!-- /Modal End -->
                                
                                
                                <!-- End Team Member -->

                            <?php } ?>

                              </div>

                            </div>

                            </section><!-- /Team Section -->

                        </div>

                    </div>

                </div>
            </div>
        </section>


     



        


 
<?php get_footer(); ?>

