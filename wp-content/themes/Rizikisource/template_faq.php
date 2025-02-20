<?php
   /*
   Template Name: FAQ Page
   */
   
       $mydownloads = get_posts( array(
          'posts_per_page' => -1,
          'offset'         => 0,
          'post_type'=>'FAQ',
          'term'=>'slug'
      ));
   
   
   ?>
<?php get_header(); ?>
<section class="inner-pages">
   <div class="container">
    <div class="row">
      <h1 class="slidetitle" > <?php the_title(); ?></h1>
      <div class="border"></div>
      <?php
         $filteredtags = array();
                
                  query_posts(array('post_type'=>'FAQ', 'order'=>'ASC', 'posts_per_page'=>-1));
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
         			//  exit;
         	if($sino){
         
            foreach($sino as $key=>$custom_term) {
         
         
             // wp_reset_query();
             $args = array('post_type' => 'FAQ',
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
         
         	 {?>
      <div class="col-sm pt-3">
         <h4><?php echo $key; ?> </h4>
         <?php
            $i=1;
            
                    while($loop->have_posts()) : $loop->the_post();
                    $post_id = get_the_ID();
            		?>
         <div class="accordion" id="accordionExample">
            <div class="accordion-item">
               <h2 class="accordion-header" id="heading<?php echo $post_id; ?> ">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $post_id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $post_id; ?>">
                  #<?php echo $i; ?>  <?php the_title(); ?>
                  </button>
               </h2>
               <div id="collapse<?php echo $post_id; ?>" class="accordion-collapse collapse <?php if($i==1) { echo 'show'; } ?>" aria-labelledby="heading<?php echo $post_id; ?>" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                     <?php the_content(); ?>
                  </div>
               </div>
            </div>
         </div>
         <?php $i++; endwhile; }?>
      </div>
      <?php }
         }?>
   </div>
   </div>  
</section>
<?php get_footer(); ?>
