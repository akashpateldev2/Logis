<!DOCTYPE html>
<html lang="en">
  <head>
    <title>
      <?php
        global $page, $paged;
        wp_title( '-', true, 'right' );
        bloginfo( 'name' );
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
          echo " | $site_description";
        if ( $paged >= 2 || $page >= 2 )
          echo ' | ' . sprintf( __( 'Page %s', 'mytheme' ), max( $paged, $page ) );
          $temp_url=get_bloginfo('template_url');
      ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />
	  <link rel="icon" type="image/png" href="<?php echo get_option('my_favicon_icon'); ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700"> 
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/aos.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo $temp_url; ?>/style.css">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_enqueue_script( 'jquery' ); wp_head(); ?>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="200" <?php body_class(); ?>>
    <!--Mobile Menu-->
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">
      <div class="container">
        <div class="row align-items-center">
          <!--Logo-->
          <div class="col-11 col-xl-2 site-logo">
            <h1 class="mb-0">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white h2 mb-0">
                <?php                
                  echo get_option('logo_text_val'); 
                ?>
              </a>
            </h1>
          </div>
          <!--Menu-->
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <?php
                $args = array(
                  'theme_location' => 'primary_one',
                  'depth'		 => 2,
                  'container'	 => 'ul',
                  'menu_class'	 => 'site-menu js-clone-nav mx-auto d-none d-lg-block',
                  'walker'	 => new BootstrapNavMenuWalker()
                );
                wp_nav_menu($args);
              ?>
            </nav>
          </div>
          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </div>
    </header>