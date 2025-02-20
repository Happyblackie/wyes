<?php
/*
Template Name: Donate
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
<section class="section-padding-inner section-bg" id="">
  <div class="container">
    <div class="row"> <?php if ( have_posts() ) while ( have_posts() ) : the_post();
                 $banner=wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                 $bannercaption = get_post_meta($post->ID,'_bannercaption', true); ?> <h1 class="text-center"> <?php the_title(); ?> </h1>
      <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-3" style="max-width: 900px;">
          <p class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"> <?php if (function_exists('the_breadcrumb')) the_breadcrumb(); ?> </p>

          <p> <?php the_content(); ?> </p>
        </div>
       
      </div> <?php endwhile; wp_reset_query(); ?>
      <!--/Header Start -->
       
  <section class="">
          
            <div class="container">
                <div class="row justify-content-center">
                      <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center">
                    
                     <h5 class="text-center"> Click the button below to donate directly through Paypal - (Visa Card/Mastercard/Credit Card) Accepted.</h5>
                     
                     </div>
                    
                    <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-center">
                        
                     <div class="custom-text-box">
                         
                        
                        
                         <div id="donate-button-container">
<div id="donate-button"></div>
<script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
<script>
PayPal.Donation.Button({
env:'production',
hosted_button_id:'PFA7E2TP738W8',
image: {
src:'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
alt:'Donate with PayPal button',
title:'PayPal - The safer, easier way to pay online!',
}
}).render('#donate-button');
</script>
</div>

                         

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

	