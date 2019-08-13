    <?php $temp_url=get_bloginfo('template_url'); ?>
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5 mr-auto">
              <!--Footer widget 1-->
              <?php	 if ( is_active_sidebar( 'footer_1' ) ) : ?>
                <?php dynamic_sidebar( 'footer_1' ); ?>
              <?php endif; ?>
              </div>
              <!--Footer widget 2-->
              <div class="col-md-3">
                <?php	 if ( is_active_sidebar( 'footer_2' ) ) : ?>
                  <?php dynamic_sidebar( 'footer_2' ); ?>
                <?php endif; ?>
              </div>
              <!--Footer widget 3-->
              <div class="col-md-3">
                <?php if ( is_active_sidebar( 'footer_3' ) ) : ?>
                  <?php dynamic_sidebar( 'footer_3' ); ?>
                <?php endif; ?>
                <!--Facebook-->
                <?php if(!empty(get_option('facebook_val'))){ ?>
                <a href="<?php echo get_option('facebook_val'); ?>" target="_blank" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <?php } ?>
                <!--Twitter-->
                <?php if(!empty(get_option('twitter_val'))){ ?>
                <a href="<?php echo get_option('twitter_val'); ?>" target="_blank" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <?php } ?>
                <!--Instagram-->
                <?php if(!empty(get_option('instagram_val'))){ ?>
                <a href="<?php echo get_option('instagram_val'); ?>" target="_blank" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <?php } ?>
                <!--Linkedin-->
                <?php if(!empty(get_option('linkedin_val'))){ ?>
                <a href="<?php echo get_option('linkedin_val'); ?>" target="_blank" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                <?php }  ?>          
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <!-- <form id="newsletter-form" method="post">
              <input type="hidden" name="action" value="newsletter_send" />  
              <div class="input-group mb-3">
                <input class="form-control border-secondary text-white bg-transparent" type="text" id="newsletter_email" name="newsletter_email" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2" />
                <div class="input-group-append">
                  <button id="button-addon2" class="btn btn-primary text-white" type="submit">Send</button>
                </div>
              </div>
            </form>             -->
            
          <?php 
          if ( is_active_sidebar( 'footer_4' ) ) : 
             dynamic_sidebar( 'footer_4' ); 
           endif; 
           ?> 
           <div id="footer_success"></div>
            <div id="footer_error"></div>       
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <?php echo apply_filters('the_content',get_option('my_footer_text')); ?>
            </div>
          </div>          
        </div>
      </div>
    </footer>
    <script src="<?php echo $temp_url; ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery-ui.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery.easing.1.3.js"></script>
    <script src="<?php echo $temp_url; ?>/js/popper.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery.stellar.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery.countdown.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo $temp_url; ?>/js/aos.js"></script>
    <script src="<?php echo $temp_url; ?>/js/main.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function ($) {
        var is_sending = false,
            failure_message = 'Whoops, looks like there was a problem. Please try again later.';
        
        /**
        * Contact Form
        */
        $('#contact-form').submit(function (e) {
          if (is_sending || !validateInputs()) {
            return false; // Don't let someone submit the form while it is in-progress...
          }
          e.preventDefault(); // Prevent the default form submit
          $this = $(this); // Cache this
          $.ajax({
            url: '<?php echo admin_url("admin-ajax.php") ?>', // Let WordPress figure this url out...
            type: 'post',
            dataType: 'JSON', // Set this so we don't need to decode the response...
            data: $this.serialize(), // One-liner form data prep...
            beforeSend: function () {
              is_sending = true;
              
              $("#contact_submit").attr('disabled',true);
              // You could do an animation here...
            },
            error: handleFormError,
            success: function (data) {
              $("#contact_submit").attr('disabled',false);
              if (data.status === 'success') {
                $('#contact-form')[0].reset();
                $("#contact_success").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong><span class="message">'+data.message+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();
                setTimeout(function() {
                  $("#contact_success").html('').hide();
                  location.reload();
                }, 5000);
              } else if (data.status === 'error') {                
                $("#contact_error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong><span class="message">'+data.message+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();                
              }else {
                handleFormError(); // If we don't get the expected response, it's an error...
              }
            }
          });
        });
  
        function handleFormError () {
          is_sending = false; // Reset the is_sending var so they can try again...
          alert(failure_message);
        }
  
        function validateInputs () {
          var $name = $('#contact-form input[name="name"]').val(),
              $email = $('#contact-form input[name="email"]').val(),
              $message = $('#contact-form textarea').val();
          if (!$name || !$email || !$message) {
            alert('Before sending, please make sure to provide your name, email, and message.');
            return false;
          }
          return true;
        }
        /**
        * Newsletter Form
        */
        var $email = $('#newsletter_email').val();
        var is_sending_email = false,
            failure_message_newsletter = 'Whoops, looks like there was a problem. Please try again later.';
            
        $('#newsletter-form').submit(function (e) {
          if (is_sending_email || !newsletter_validateInputs()) {
            return false; // Don't let someone submit the form while it is in-progress...
          }
          e.stopImmediatePropagation();
          e.preventDefault(); // Prevent the default form submit
          $this = $(this); // Cache this
          $.ajax({
            url: '<?php echo admin_url("admin-ajax.php"); ?>', // Let WordPress figure this url out...
            type: 'post',
            dataType: 'JSON', // Set this so we don't need to decode the response...
            data: $this.serialize(), // One-liner form data prep...
            beforeSend: function () {
              is_sending_email = true;
              $("#button-addon2").attr('disabled',true);
              // You could do an animation here...
            },
            error: newsletter_handleFormError,
            success: function (data) {
              $("#button-addon2").attr('disabled',false);
              // $('#newsletter-form').unbind('submit');
              if (data.status === 'success') {
                $('#newsletter-form')[0].reset();
                $("#footer_success").html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong><span class="message">'+data.message+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();
                setTimeout(function() {
                  $("#footer_success").html('').hide();
                  location.reload();
                }, 5000);
              } else if (data.status === 'error') {
                
                $("#footer_error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong><span class="message">'+data.message+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();
                // setTimeout(function() {
                //   $("#footer_error").html('').hide();
                //   location.reload();
                //   $('#newsletter-form')[0].reset();
                // }, 1200);
              }else {
                newsletter_handleFormError(); // If we don't get the expected response, it's an error...
              }
              setTimeout(function() {
                  location.reload();
                }, 3000);
              return false;
            }
          });
          // return false;
        });
  
        function newsletter_handleFormError () {
          is_sending_email = false; // Reset the is_sending_email var so they can try again...
          $("#footer_error").html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong><span class="message">'+failure_message_newsletter+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>').show();
        }
  
        function newsletter_validateInputs () {
          var $email = $('#newsletter-form input[name="newsletter_email"]').val();
          if (!$email) {
            alert('Before sending, please make sure to provide your email.');
            return false;
          }
          return true;
        }
      });
    </script>
    <?php wp_footer(); ?>
  </body>
</html>