<?php
   /*
   Template Name: Contact Us Page
   */
   
   $involve = get_posts( array(
    'posts_per_page' => -1,
    'offset'         => 0,
   'post_type'      =>'involve',
    'order' => 'ASC',
 ) );

 $my_postid = 922;//This is page id or post id
$content_post = get_post($my_postid);
$content = $content_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);

  

$name = get_post_field('post_title',  $my_postid);
  $photo  = wp_get_attachment_image_src( get_post_thumbnail_id( $my_postid), 'full');

 $desingation = get_post_meta($my_postid,'_designation', true); 



   
 get_header(); ?>

<section class="contact-section section-padding-inner" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                        <div class="contact-info-wrap">
                            <h2>Get in touch</h2>
                            <p class="mb-4">If you're interested in learning more about our initiatives or ways to get involved, we invite you to reach out. We look forward to collaborating with you to create more inclusive opportunities for Persons with disabilities</p>

                            <!-- <div class="contact-image-wrap d-flex flex-wrap">
                                <img src="<?php  $photo[0] ?>"
                                    class="img-fluid avatar-image" alt="<?php  $name?>">

                                <div class="d-flex flex-column justify-content-center ms-3">
                                    <p class="mb-0"><?php  $name?></p>
                                    <p class="mb-0"><strong><?php  $desingation ?></strong></p>
                                </div>
                            </div> -->

                            <div class="contact-info">
                                <h5 class="mb-3">Contact Infomation</h5>

                                <p class="d-flex mb-2">
                                    <i class="bi-geo-alt me-2"></i>
                                    Office Location 93 Royal Close,<br/> Banda Lane, Karen, <br/>Nairobi, Kenya.
                                </p>

                                <p class="d-flex mb-2">
                                    <i class="bi-telephone me-2"></i> <span>&nbsp;Phone:&nbsp;</span>

                                    <a href="tel:+254 706 811 603">
                                       +254 706 811 603
                                    </a>
                                </p>

                                <p class="d-flex">
                                    <i class="bi-envelope me-2"></i><span>&nbsp;Email:&nbsp;</span>

                                    <a href="mailto:info@rizikisource.org">
                                        info@rizikisource.org
                                    </a>
                                </p>

                                <a href="#get-directions" class="custom-btn btn mt-3">Get Direction</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 mx-auto" >
                    <form id="contact_form" onsubmit="return false;"  class="php-email-form contact-form custom-form  mb-5 mb-lg-0">
                                        <div class="row g-3">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name">
                                                    <label for="name">Your Name</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control border-0" id="email2" name="email" placeholder="Your Email">
                                                    <label for="email2">Your Email</label>
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
                                            <input type="subject" class="form-control border-0" id="subject" name="subject" placeholder="Phone">
                                                    <label for="subject">Subject</label>

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
        </section>


  
                        <div class="col-12 wow fadeInRight" id="get-directions" data-wow-delay="0.4s">
                                <div>
                                  <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="rounded">                            
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.680083219822!2d36.757514974816445!3d-1.36863539861841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1a1ca6608fe9%3A0x2f5072a3f477c57b!2sRiziki%20Source!5e0!3m2!1sen!2ske!4v1733982814634!5m2!1sen!2ske" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                                
                                   
                                </div>
                            </div>


      

 
<?php get_footer(); ?>
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
         url: " <?php bloginfo('template_directory'); ?>/app/contact.php",
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
