<?php
/*
Template Name: Product Page
*/

$myposts = get_posts( array(
    'posts_per_page' => 5,
    'offset'         => 0,
	'post_type'      =>'products'
) );

$myproducts = get_posts( array(
    'posts_per_page' => 12,
    'offset'         => 0,
	'post_type'      =>'products'
) );

?>
<?php get_header(); ?>

 <div class="flexslider">	
    <ul class="slides">
	<?php
		// query_posts(array('post_type'=>'slides' ,'posts_per_page'=>10));
		// if ( have_posts() ) while ( have_posts() ) : the_post();
		// $slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
		
		if ( $myposts ) {
			foreach ( $myposts as $post ) :
				setup_postdata( $post );
				$postMeta=get_post_meta($post->ID);
				$slide = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
				// $goToUrl= get_post_meta( $post->ID, 'prefix-url_3', true );
				// $stepUrl= get_post_meta( $post->ID, 'prefix-step', true );
				// $fileUrl= get_post_meta( $post->ID, 'prefix-prsp_file', true );
				// $goToPageUrl= get_post_meta( $post->ID, 'prefix-page', true );
	?>
      <li>
        <div class="bgimg" style="background-image: url(<?php echo $slide[0]; ?>)"><div class="overlay"></div></div>
           <h1> 
			    	<div class="row row-no-padding">
					
						<?php
						query_posts(array('post_type'=>'products','posts_per_page'=>5));
						if ( have_posts() ) while ( have_posts() ) : the_post();
						?>
							<div class="sitenav-topline"></div> 
							<div class="sitenav-toplinemobile"></div> 
					<a href="<?php the_permalink(); ?>" class="mobilelink">
						<div class="col-md-2 col-sm-3" >
							<div class="sitenav">
							<p class="slidetitle"><?php the_title() ?></p>
							<p class="slidetitlemobile"><?php the_title() ?></p>
								<div class="sitenav-content">
									 <?php echo wp_trim_words(get_the_excerpt(), 150); ?>
									<div class="sitenav-footer">
										<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
									</div>
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_query(); ?> 
			    	</div>
			     </a>
			
		</h1>
      </li>
	<?php 		
	endforeach;
	wp_reset_postdata();
}
	?>   
    </ul>
  </div>

 

        
 
		
	<?php get_footer(); ?>
	<script type="text/javascript">
	$(function() {
		var $owl = $('.apollo-center-carousel');
		$owl.owlCarousel({
			navigation : false,
			slideSpeed : 1000,
			paginationSpeed : 1000,
			singleItem: true,
			pagination: true,
			autoPlay:true,
			autoPlayTimeout:4000,
			rewindSpeed: 500
		});

		$('.roomsgallery').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a.thumb', // the selector for gallery item
				type: 'image',
				gallery: {
				enabled:true
				}
			});
		});

		//scroll to booking form
		$('a.book-now').click(function(){
			$('html, body').animate({
				scrollTop: $('#booking-section').offset().top
			}, 1000);
			return false;
		});
	});

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.test-popup-link').magnificPopup({
			type: 'image',
			gallery:{
				enabled:true
			}
			});
		});
	</script>
