<?php
/*
Template Name: Get Involved
*/

 
$involve = get_posts( array(
   'posts_per_page' => -1,
   'offset'         => 0,
  'post_type'      =>'involve',
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
                <h1 class="text-center"> <?php the_title(); ?></h1>

                <div class="container-fluid bg-breadcrumb" >
                    <div class="container text-center py-3" style="max-width: 900px;">
                        <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                        <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?>
                        </p>    
                    </div>

                    <p> <?php the_content(); ?></p>
                  
                </div>

            <?php endwhile; wp_reset_query(); ?>

       

            <section class="">
                  <div class="container">
                     <div class="row">
            
                        <div class="col-lg-12 col-12 text-center ">
                            
                        </div>

                <div class="col-md-12 col-lg-7">
                     <?php foreach($involve as $gi) { 
                        $slide = wp_get_attachment_image_src( get_post_thumbnail_id($gi->ID), '1200x628');
                     ?>

                        <div class="col-lg-12 col-md-12 col-12 pb-5 mb-5 mb-lg-0">
                              <div class="custom-block-wrap">
                                 <img src="<?php if (!empty($slide[0])) {echo $slide[0]; } else if (empty($slide[0]))  { bloginfo('template_directory');?>/img/default-insights.jpg <?php ; }?>"
                                    class="custom-block-image img-fluid" alt="<?php echo $gi->post_title; ?>">

                                 <div class="custom-block">
                                    <div class="custom-block-body">
                                          <h5 class="mb-3"><?php echo $gi->post_title; ?></h5>

                                          <p> <?php echo $gi->post_content; ?> </p>

                                    </div>

                                    <a href="#get-involved"  class="custom-btn btn thing">Get Involved</a>
                                 </div>
                              </div>
                        </div>
                      <?php wp_reset_query();  }?> 

                     </div>

                   
                    
                      <div class="col-md-12 col-lg-5 fixedElement sinoriziki" id="get-involved" id="content">
                    
                        <div class="custom-text-box" >                      
                            <p class="mb-0">   
                                
                            <div class="col-12 wow fadeInRight" data-wow-delay="0.4s">
                                <div>
                                    <h4 class="">Fill Online Form</h4>
                                
                                    <form id="contact_form" onsubmit="return false;"  class="php-email-form custom-form  mb-5 mb-lg-0">
                                        <div class="row g-3">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control border-0" id="email" name="email" placeholder="Your Email">
                                                    <label for="email">Your Email</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="phone" class="form-control border-0" id="phone" name="phone" placeholder="Phone">
                                                    <label for="phone">Your Phone</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                            <div class="form-floating">
                                                <input type="hidden" id="project"  name="project" value="">
                                                
                                                    <select name="product" class="form-control border-0 falert" required >
                                                    <option value="" disabled selected>--Select Category--</option>
                                                        <?php foreach ($involve as $in){?>
                                                                
                                                    <option value="<?php echo $in->post_title; ?>"><?php echo $in->post_title;} ?></option>
                                                    </select>

                                                </div>
                                            </div>

                                        
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control border-0" placeholder="Leave a message here" id="message"  name="message" style="height: 120px"></textarea>
                                                    <label for="message">Message</label>
                                                </div>

                                            </div>

                                        <div class="my-3">
                                            <div class="loading" id="loading">Loading</div>
                                            <div class="error-message"></div>
                                            <div id="notify" class="notify"></div>
                                            <!-- <div class="sent-message">Your message has been sent. Thank you!</div> -->
                                        </div>
                    
            
                                            <div class="col-12">
                                            <button  type="submit" id="contact_btn"  class="btn btn-primary w-100 py-3" value="Submit" onclick="contactUs();" >Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                     </div>
                  </div>
            </section>


                        </div>

                    </div>

                </div>
            </div>
        </section>

     
                  

<!-- Service End -->
<?php get_footer(); ?>

<script type="text/javascript">

if(screen.width >= 1200) {
$(function(){
    $('.thing').click(function(e){
         $('.sinoriziki').toggleClass('animate');
    });
});

       //code goes here

$(window).scroll(function(){
   
    var curScrollVal = $(window).scrollTop();

    if( curScrollVal > 700 && curScrollVal < 2400){
        $('.fixedElement').css({'position': 'fixed', 'top': 0});
        // $('#d3').css({'margin-top': '500px'});
    }
    //now I wanna show the next divs in order
    else if( curScrollVal > 2400  ){
        $('.fixedElement').css({'position': 'relative', 'top': '0'}); 

        //How can I show div "#d3" and the rest?
    }

});




$(window).scroll(function(e){ 
  var $el = $('.fixedElement'); 
  var isPositionFixed = ($el.css('position') == 'fixed');
//   if ($(this).scrollTop() > 700 && !isPositionFixed ){ 
//     $el.css({'position': 'fixed', 'top': '0px'}); 
//   }
  if ($(this).scrollTop() < 200 && isPositionFixed){
    $el.css({'position': 'static', 'top': '0px'}); 
  } 

});

}

</script>

<script type="text/javascript">

    //   contact us function
   function contactUs() {
   var form = $('form#contact_form');
      var notify = $('#notify');
      var form_data = new FormData($('form#contact_form')[0]);
      //   var form_data = form.serialize();
      console.log(form_data);
      //   alert(form_data);
      $.ajax({
         url: " <?php bloginfo('template_directory'); ?>/app/get-involved.php",
         type: "post",
         data: form_data,
         processData: false,
         contentType: false,
         dataType: 'json',
         beforeSend: function() {
               $('#contact_btn').val('Sending...').removeAttr('onClick');
               // $(".loading").html("");
               document.getElementById("loading").style.display = "block"; 
         }
      }).done(function(data) {
         //   alert(data.status);
         if (data.status == 1) {
               // form.html('<div class="apa_thankyou">Thank you for your interest. Our customer care representative will contact you shortly</div>');
               //         //window.location.href = '<?php bloginfo('url'); ?>/thank-you-page/';
               notify.html(data.message);

               $('#contact_btn').val('Submit').attr('onClick', 'contactUs()');

               $('#contact_form')[0].reset();
               document.getElementById("loading").style.display = "none"; 
               // $(":reset").css("background-color", "#F98700");

         } else {
               $(data.field).addClass('error');
               notify.html(data.message);
               document.getElementById("loading").style.display = "none"; 
               $('#contact_btn').val('Submit').attr('onClick', 'contactUs()');

               $('input.form-control').keydown(function() {
                  $(this).removeClass('error');
                  $('#notify').html('');
                
               });
               $('textarea.form-control').keydown(function() {
                  $(this).removeClass('error');
                  $('#notify').html('');
                
               });

         }
      });
   }
   //   }

</script>

	