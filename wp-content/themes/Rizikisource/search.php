<?php get_header(); ?>

<?php
    global $wp_query;
    global $page;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>


<div class="col-lg-12  inner-banner">
            
            </div>
<div class="content-container pt-5">
    
    <div class="container">

        <div class="content-wrapper">

            <div class="results-header">
                <h1>Search Results for: <span><?php echo strip_tags( addslashes( $_GET['s'] ) ); ?></span> </h1>
            </div>

            <div class="results-container">

                <div class="results">

                    <?php if ( have_posts() ) : ?>
                       <ul>
                           <?php while ( have_posts() ) : the_post(); ?>
                           <li>
                                <span class="header">
                                    <p><?php the_title();?></p>
                                </span>
                                <span class="content"><?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $post->post_content ), 50 ) ); ?></span>
                                <span class="read-more-date">
                                    <span class="read-more"><a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More....</a></span>
                                </span>
                            </li>

                            <?php
                                // End the loop.
                                endwhile;

                                // Previous/next page navigation.
                                // global $wp_query;

                                // $big = 999999999; // need an unlikely integer

                                // $pages = paginate_links( array(
                                //     'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                //     'format' => '?paged=%#%',
                                //     'current' => max( 1, get_query_var('paged') ),
                                //     'total' => $wp_query->max_num_pages,
                                //     'type'  => 'array',
                                //     ) );
                                // if( is_array( $pages ) ) {
                                //     $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                                //     echo '<div class="pagination"><ul>';
                                //     foreach ( $pages as $page ) {
                                //         echo "<li>$page</li>";
                                //     }
                                //     echo '</ul></div>';
                                // }
                            ?>
                        </ul>
                        <?php
                            // If no content, include the "No posts found" template.
                            else :
                                echo 'Sorry, no results matching your query';
                            endif;
                        ?>

                </div>

            </div>

        </div>
        


    </div>
 
</div>


<?php get_footer(); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.field').focus(function(){
            $(this).removeClass('error');
            $('#notify').html('');
        });
    });

    function searchContact(){
        var form=$('form#scontact_form');
        var notify=$('#notify');
        var values=form.serialize();
        $('#submit_btn').val('Sending...').removeAttr('onClick');
        $.ajax({
            url: "<?php bloginfo('template_directory'); ?>/app/search_contact.php",
            type: "post",
            data: values,
            dataType: 'json',
            success: function(data){
                //alert(data);
                if(data.status==1) {
                    form.html('<div class="apa_thankyou">Thank you for contacting APA Insurance, our sales executive will contact you soon</div>');
                } else {
                    $(data.field).addClass('error');
                    notify.html(data.message);
                    $('#submit_btn').val('Submit').attr('onClick','searchContact()');
                }
            },
            error:function(){
                //alert('error');
            }
        });
    }
</script>