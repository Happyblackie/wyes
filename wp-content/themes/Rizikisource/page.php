<?php get_header(); ?>
<?php
global $post;

?>
<section class="inner-pages">
   <div class="container clearfix">
      <h1 class="slidetitle" > <?php the_title(); ?></h1>
      <div class="border"></div>
		<?php the_content(); ?>
    </div>  
</section>  


<?php get_footer(); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.field').focus(function () {
            $(this).removeClass('error');
        });
    });


    function send() {

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;


        var p_fullname = $("#p_fullname").val();
        var p_email = $("#p_email").val();
        var p_phone = $("#p_phone").val();
        var p_message = $("#p_message").val();
        // var p_message= stringToReplace.replace(/[^\w\s]/gi, '');
        console.log(p_message); 


        if (p_fullname == "" || p_fullname == "Name") {
            $("#p_fullname").addClass('error');
            $("#loading_div").html("Please enter your name").addClass('notifications error');
            return false;
        }

        else if (p_phone == "" || p_phone == "Name") {
            $("#p_phone").addClass('error');
            $("#loading_div").html("Please enter your phone number").addClass('notifications error');
            return false;
        }
        else if (!reg.test(p_email)) {
            $("#cta_name").addClass('error');
            $("#loading_div").html("Please enter a valid email").addClass('notifications error');
            return false;
        }
        else if (p_message == "" || p_message == "Message") {
            $("#p_message").addClass('error');
            $("#loading_div").html("Please enter your message").addClass('notifications error');
            return false;
        }
        else {


            var form = $('form#product_form');
            var values = form.serialize();
      
            $.ajax({
                url: "<?php bloginfo('template_directory'); ?>/app/send.php",
                type: "post",
                data: values,
                dataType: 'json',
                beforeSend: function () {
                    $('#send_btn').val('Sending...').removeAttr('onClick');
                    $("#loading_div").html("");
                }
            }).done(function (data) {
                // alert(data.status);
                if (data.status == 1) {
                    form.html('<div class="apa_thankyou">Thank you for your interest. Our customer care representative will contact you shortly</div>');
                    //window.location.href = '<?php// bloginfo('url'); ?>/thank-you-page/';
                } else {
                    $(data.field).addClass('error');
                    $('#send_btn').val('Submit').attr('onClick', 'send()');
                }

            });
        }
    }

    	//scroll to booking form
	$('a.product_form').click(function(){
		$('html, body').animate({
			scrollTop: $('#product_form').offset().top
		}, 1000);
		return false;
	});

</script>
