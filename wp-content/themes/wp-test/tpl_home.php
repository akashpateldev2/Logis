<?php
/*
  Template Name: Home Page
 */
get_header();
$temp_url=get_bloginfo('template_url');
$pageid = get_the_ID();
$home_meta_data=get_post_meta($pageid);
?>
<!--Banner Start-->
<div class="site-blocks-cover overlay" style="background-image: url(<?php echo wp_get_attachment_url($home_meta_data['banner_image'][0]); ?>);" data-aos="fade" data-stellar-background-ratio="0.5" id="section-home">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
        <!--Banner Content-->
        <?php if(!empty($home_meta_data['banner_text'][0])){ ?>
        <?php echo apply_filters('the_content',$home_meta_data['banner_text'][0]); ?>
        <?php }
        if(!empty($home_meta_data['button_text'][0])){ ?>
        <!--Banner Button-->
          <p data-aos="fade-up" data-aos-delay="200"><a href="<?php echo $home_meta_data['button_link'][0]; ?>" class="btn btn-primary py-3 px-5 text-white"><?php echo $home_meta_data['button_text'][0]; ?></a></p>
        <?php } ?>
      </div>
    </div>
  </div>
</div>  
<!--Banner End-->
<!--About Start-->
<div class="site-section" id="section-about">
  <div class="container">
    <div class="row mb-5">
      <!--About Image section-->
      <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade-up" data-aos-delay="100">
        <img src="<?php echo wp_get_attachment_url($home_meta_data['about_image'][0]); ?>" alt="About Image" class="img-fluid rounded">
      </div>
      <!--About Content Section-->
      <div class="col-md-6 order-md-1" data-aos="fade-up">
        <div class="text-left pb-1 border-primary mb-4">
          <h2 class="text-primary"><?php echo $home_meta_data['about_title'][0]; ?></h2>
        </div>
        <?php echo apply_filters('the_content',$home_meta_data['about_content'][0]); ?>
      </div>
    </div>
  </div>
</div>
<!--About End-->
<!--How it works Start-->
<div class="site-section bg-image overlay" style="background-image: url(<?php echo wp_get_attachment_url($home_meta_data['how_it_works_background_image'][0]); ?>);" id="section-how-it-works">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--How it works Title-->
        <h2 class="font-weight-light text-primary" data-aos="fade"><?php echo $home_meta_data['how_it_works_title'][0]; ?></h2>
      </div>
    </div>
    <div class="row">
      <!--Content 1-->
      <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <div class="how-it-work-item">
          <span class="number">1</span>
          <div class="how-it-work-body">
            <?php echo apply_filters('the_content',$home_meta_data['content_1'][0]); ?>
          </div>
        </div>
      </div>
      <!--Content 2-->
      <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
        <div class="how-it-work-item">
          <span class="number">2</span>
          <div class="how-it-work-body">
            <?php echo apply_filters('the_content',$home_meta_data['content_2'][0]); ?>
          </div>
        </div>
      </div>
      <!--Content 3-->
      <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300">
        <div class="how-it-work-item">
          <span class="number">3</span>
          <div class="how-it-work-body">
            <?php echo apply_filters('the_content',$home_meta_data['content_3'][0]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--How it works End-->
<!--Team Start-->
<div class="site-section border-bottom" id="section-our-team">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--Team Title-->
        <h2 class="font-weight-light text-primary" data-aos="fade"><?php echo $home_meta_data['team_title'][0]; ?></h2>
      </div>
    </div>
    <!--Team Members-->
    <?php         
    $team = get_field('team');
    if(count($team)>0){
      ?>
    <div class="row">
      <?php
        for($i=0;$i<count($team);$i++){
          $post_id = $team[$i]->ID;                         
      ?>
      
      <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
        <div class="person">
          <!--Member Profile-->
          <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="<?php echo get_field('name',$post_id); ?> Profile" class="img-fluid rounded mb-5 w-75 rounded-circle">
          <!--Member Name-->
          <h3><?php echo get_field('name',$post_id); ?></h3>
          <!--Member Position-->
          <p class="position text-muted"><?php echo get_field('position',$post_id); ?></p>
          <!--Member Details-->
          <p class="mb-4"><?php echo get_field('description',$post_id); ?></p>
          <!--Member Social Links-->
          <?php $social_links = get_field('social_links',$post_id); ?>
          <ul class="ul-social-circle">
            <?php if(!empty($social_links['facebook'])){ ?>
              <li><a href="<?php echo $social_links['facebook']; ?>" target="_blank"><span class="icon-facebook"></span></a></li>
            <?php }
              if(!empty($social_links['twitter'])){ ?>
            <li><a href="<?php echo $social_links['twitter']; ?>" target="_blank"><span class="icon-twitter"></span></a></li>
            <?php }
              if(!empty($social_links['instagram'])){ ?>
            <li><a href="<?php echo $social_links['instagram']; ?>" target="_blank"><span class="icon-linkedin"></span></a></li>
            <?php }
              if(!empty($social_links['linkedin'])){ ?>
            <li><a href="<?php echo $social_links['linkedin']; ?>" target="_blank"><span class="icon-instagram"></span></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php      
        }  
      ?>
    </div>
    <?php         
      }  
    ?>
  </div>
</div>
<!--Team End-->
<!--Services Start-->
<div class="site-section bg-light" id="section-services">
  <div class="container">
    <div class="row justify-content-center mb-5" data-aos="fade-up">
      <div class="col-md-7 text-center border-primary">
        <!--Services Title-->
        <h2 class="mb-0 text-primary"><?php echo $home_meta_data['services_title'][0]; ?></h2>
        <!--Services Sub-Title-->
        <p class="color-black-opacity-5"><?php echo $home_meta_data['services_sub_title'][0]; ?></p>
      </div>
    </div>
    <!--Services List-->
    <?php         
    $services = get_field('services');
    if(count($services)>0){
      ?>
    <div class="row align-items-stretch">
      <?php
        for($i=0;$i<count($services);$i++){
          $post_id = $services[$i]->ID;                                
      ?>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-flex">
          <!--Service Icon-->
          <div class="unit-4-icon mr-4"><span class="text-primary <?php echo get_field('icon',$post_id); ?>"></span></div>
          <div>
            <!--Service Title-->
            <h3><?php echo $services[$i]->post_title; ?></h3>
            <!--Service Content-->
            <p><?php echo get_the_excerpt($post_id); ?></p>
            <!--Service Link-->
            <p><a href="<?php echo get_the_permalink($post_id); ?>">Learn More</a></p>
          </div>
        </div>
      </div>
      <?php         
        }  
      ?>
    </div>
    <?php         
      }  
    ?>
  </div>
</div>
<!--Services End-->
<!--Industries Start-->
<div class="site-section block-13" id="section-industries">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--Industries Title-->
        <h2 class="mb-0 text-primary"><?php echo $home_meta_data['industries_title'][0]; ?></h2>
        <!--Industries Sub-Title-->
        <p class="color-black-opacity-5"><?php echo $home_meta_data['industries_sub_title'][0]; ?></p>
      </div>
    </div>
  </div>
  <!--Industries List-->
  <?php         
    $industries = get_field('industries');
    if(count($industries)>0){
      ?>
  <div class="owl-carousel nonloop-block-13">
  <?php
          for($i=0;$i<count($industries);$i++){
            $post_id = $industries[$i]->ID;                
        ?>
    <div>
      <!--Industry Link-->
      <a href="<?php echo get_the_permalink($post_id); ?>" class="unit-1 text-center">
        <!--Industry Image-->
        <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="<?php echo $industries[$i]->post_title; ?>" class="img-fluid">
        <div class="unit-1-text">
          <!--Industry Title-->
          <h3 class="unit-1-heading"><?php echo $industries[$i]->post_title; ?></h3>
        </div>
      </a>
    </div>
    <?php
          }             
        ?>
  </div>
  <?php         
    }
      ?>
</div>
<!--Industries End-->
<!--Video Start-->
<div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(<?php echo wp_get_attachment_url($home_meta_data['video_image'][0]); ?>); background-attachment: fixed;">
  <div class="container">
    <div class="row align-items-center justify-content-center text-center">
      <div class="col-md-7" data-aos="fade-up">
        <!--Video Link-->
        <a href="<?php echo $home_meta_data['video_link'][0]; ?>" class="play-single-big mb-4 d-inline-block popup-vimeo"><span class="icon-play"></span></a>
        <h2 class="text-white font-weight-light mb-5 h1">Watch The Video</h2>
      </div>
    </div>
  </div>
</div>  
<!--Video End-->
<!--Testimonial Start-->   
<div class="site-section border-bottom">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--Testimonials Title-->
        <h2 class="font-weight-light text-primary"><?php echo $home_meta_data['testimonial_title'][0]; ?></h2>
      </div>
    </div>
    <!--Testimonials List--> 
    <?php         
    $testimonials = get_field('client_testimonial');
    if(count($testimonials)>0){
      ?>
    <div class="slide-one-item home-slider owl-carousel">
    <?php
          for($i=0;$i<count($testimonials);$i++){
            $post_id = $testimonials[$i]->ID;                
        ?>
      <div>
        <div class="testimonial">
          <figure class="mb-4">
            <!--Testimonial Profile-->
            <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="<?php echo $testimonials[$i]->post_title; ?>" class="img-fluid mb-3">
          </figure>
          <blockquote>
            <!--Client's Testimonial-->
            <p>&ldquo;<?php echo $testimonials[$i]->post_content; ?>&rdquo;</p>
            <!--Client's Name-->
            <p class="author"> &mdash; <?php echo $testimonials[$i]->post_title; ?></p>
          </blockquote>
        </div>
      </div>
      <?php
          }
        ?> 
    </div>
    <?php         
    }
      ?>
  </div>
</div>
<!--Testimonial End--> 
<!--Blog Start-->
<div class="site-section" id="section-blog">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--Blog Title-->
        <h2 class="font-weight-light text-primary"><?php echo $home_meta_data['blogs_title'][0]; ?></h2>
        <!--Blog Sub-Title-->
        <p class="color-black-opacity-5"><?php echo $home_meta_data['blogs_sub_title'][0]; ?></p>
      </div>
    </div>
    <!--Blogs List-->
    <?php         
    $blogs = get_field('blogs');
    if(count($blogs)>0){
      ?>
      <div class="row mb-5 align-items-stretch">
        <?php
          for($i=0;$i<count($blogs);$i++){
            $post_id = $blogs[$i]->ID;
            $arr = array();
            $categories = get_the_category($post_id);
            foreach($categories as $cd){
              $cat_link = get_category_link($cd->cat_ID);
              $arr[]='<a href="'.$cat_link.'">'.$cd->cat_name.'</a>';
            }
        ?>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
          <div class="h-entry">
            <!--Blog Image-->
            <img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="<?php echo $blogs[$i]->post_title; ?>" class="img-fluid">
            <!--Blog Title and Link-->
            <h2 class="font-size-regular"><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo $blogs[$i]->post_title; ?></a></h2>
            <!--Blog Author, publish date and Category-->
            <div class="meta mb-4">by <?php echo get_the_author_meta('display_name',$blogs[$i]->post_author); ?> <span class="mx-2">&bullet;</span> <?php echo date("M d, Y",strtotime($blogs[$i]->post_date)); ?> <?php if(count($arr)>0){ echo '<span class="mx-2">&bullet;</span>'.implode('<span class="mx-2">&bullet;</span>',$arr); } ?></div>
            <!--Blog Content-->
            <p><?php echo get_the_excerpt($post_id); ?></p>
          </div> 
        </div>
        <?php
          }
        ?>            
      </div>
      <?php
    }
    ?>
    <div class="row">
      <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="300">
        <!--All Blogs page link-->
        <p class="mb-0"><a href="<?php echo $home_meta_data['all_blogs_page_link'][0]; ?>" class="btn btn-primary py-3 px-5 text-white">View All Blog Posts</a></p>
      </div>
    </div>
  </div>
</div>
<!--Blog End-->
<!--Contact Start-->  
<div class="site-section bg-light" id="section-contact">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center border-primary">
        <!--Contact Title-->
        <h2 class="font-weight-light text-primary"><?php echo $home_meta_data['contact_us_title'][0]; ?></h2>
        <!--Contact sub-title-->
        <p class="color-black-opacity-5"><?php echo $home_meta_data['contact_us_sub_title'][0]; ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7 mb-5">
        <!--Contact Form-->
        <form id="contact-form" method="post" class="p-5 bg-white">
          <input type="hidden" name="action" value="contact_send" />     
          <div class="row form-group">
            <div class="col-md-6 mb-3 mb-md-0">
              <label class="text-black" for="name">First Name</label>
              <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="col-md-6">
              <label class="text-black" for="lname">Last Name</label>
              <input type="text" id="lname" name="lname" class="form-control">
            </div>
          </div>
          <div class="row form-group">              
            <div class="col-md-12">
              <label class="text-black" for="email">Email</label> 
              <input type="email" id="email" name="email" class="form-control">
            </div>
          </div>
          <div class="row form-group">              
            <div class="col-md-12">
              <label class="text-black" for="subject">Subject</label> 
              <input type="subject" id="subject" name="subject" class="form-control">
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="message">Message</label> 
              <textarea name="message" id="message" message="message" cols="30" rows="7" class="form-control"></textarea>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-12">
              <input type="submit" value="Send Message" id="contact_submit" class="btn btn-primary py-2 px-4 text-white">
            </div>
          </div>
          <div id="contact_success"></div>
          <div id="contact_error"></div>
        </form>
        
        <?php //echo do_shortcode($home_meta_data['contact_form'][0]); ?>
      </div>
      <div class="col-md-5">
        <!--Contact Information-->
        <div class="p-4 mb-3 bg-white">
          <p class="mb-0 font-weight-bold">Address</p>
          <p class="mb-4"><?php echo $home_meta_data['address'][0]; ?></p>
          <p class="mb-0 font-weight-bold">Phone</p>
          <p class="mb-4"><a href="tel:<?php echo $home_meta_data['phone'][0]; ?>"><?php echo $home_meta_data['phone'][0]; ?></a></p>
          <p class="mb-0 font-weight-bold">Email Address</p>
          <p class="mb-0"><a href="mailto:<?php echo $home_meta_data['email'][0]; ?>"><?php echo $home_meta_data['email'][0]; ?></a></p>
        </div>
        <!--Contact More Information-->
        <div class="p-4 mb-3 bg-white">
          <h3 class="h5 text-black mb-3"><?php echo $home_meta_data['more_info_title'][0]; ?></h3>
          <p><?php echo $home_meta_data['more_information'][0]; ?></p>
          <p><a href="<?php echo $home_meta_data['more_info_link'][0]; ?>" class="btn btn-primary px-4 py-2 text-white"><?php echo $home_meta_data['more_info_btn_text'][0]; ?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Contact End-->  
<?php
get_footer();
?>