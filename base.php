<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body data-spy="scroll" data-target="#main-nav" data-offset="0" <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->

    <div class="jumbotron-wrapper">
        <div class="jumbotron jumbotron-fluid">
          <div class="container jumbotron-content-wrapper">
            <div id="jumbotron-content">
              <img id="intro-image" src="<?= get_template_directory_uri(); ?>/dist/images/intro-image.svg">
              <div id="svgWrapper">
                <?php get_template_part('templates/svg/name'); ?>
              </div>
              <p id="typing-animation"></p>
            </div>
          </div>
        </div>
        <div class="intro-scroll-wrapper"><i class="intro-scroll icon-down"></i></div>
      </div>


      <?php get_template_part('templates/header'); ?>

      <div class="home-page-content">
        <div class="container page-section" id="work">
          <!-- Example row of columns -->
          <div class="row section-intro">
            <div class="col-sm-12">
              <h1 class="text-center mb-50">My Work</h1>
            </div>
            <div class="controls">
              <div class="col-sm-12">
                <button type="button" class="control hvr-underline-from-center mixitup-control-active" data-filter=".featured">Featured</button>
                <button type="button" class="control hvr-underline-from-center" data-filter="all">All</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".ui">UI Design</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".research">UX Research</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".ia">Information Architecture</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".ixd">Interaction Design</button>
              </div>
            </div>

          </div>

          <?php $query = new WP_Query( array( 'post_type' => 'project' ) ); ?>
          <?php if ( $query->have_posts() ) : ?>


          <div class="row portfolio-cards page-card-grid" id="portfolio-cards">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <?php get_template_part('templates/portfolio'); ?>
            <?php endwhile; wp_reset_postdata(); ?>

          </div>
          <!-- show pagination here -->
          <?php else : ?>
              <!-- show 404 error here -->
          <?php endif; ?>
          <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
        </div>

        <div class="container page-section" id="about">
          <!-- Example row of columns -->
          <div class="row section-intro">
            <div class="col-sm-12">
              <h1 class="text-center mb-50">About Me</h1>
            </div>
            <div class="col-md-10 ml-md-auto mr-md-auto">
              <p class="text-center lead mb-50">I graudated in May 2017 with an MFA in Interactive Media from the University of Miami and now I live in Seattle, WA. I am passionate about developing experiences that are intuitive and make technology more accessible to everyone.</p>
            </div>
          </div>


          <div class="row about-me-cards page-card-grid">
            <div class="col-sm-4 about-me-cards-wrapper">
              <div class="card color1 page-card-content page-card-target">
                <div class="card-body">
                  <p class="card-icon"><i class="icon-briefcase"></i></p>
                  <h4 class="card-title">My Resume</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4 about-me-cards-wrapper">
              <div class="card color2 page-card-content page-card-target">
                <div class="card-body">
                  <p class="card-icon"><i class="icon-process"></i></p>
                  <h4 class="card-title">My Process</h4>
                </div>
              </div>
            </div>
            <div class="col-sm-4 about-me-cards-wrapper">
              <div class="card color1 page-card-content page-card-target">
                <div class="card-body">
                  <p class="card-icon"><i class="icon-coffee-cup"></i></p>
                  <h4 class="card-title">My Profile</h4>
                </div>
              </div>
            </div>
          </div>
          <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
        </div>

        <div class="container page-section" id="contact">
          <div class="row section-intro">
            <div class="col-sm-12">
              <h1 class="text-center mb-50">Contact</h1>
            </div>
            <div class="col-md-10 ml-md-auto mr-md-auto">
              <p class="text-center lead mb-50">Feel free to send me a message below or email me at: <a class="hoverlink" href="#">l.whitaker@umiami.edu</a></p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 ml-md-auto mr-md-auto">
              <?php echo do_shortcode("[contact-form-7 id='179' title='Contact form 1']"); ?>
            </div>
          </div>
          <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
        </div>

        <div id="project-page-content-wrapper">
          <div class="close">X</div>
          <div class="project-page-content">
            <?php get_template_part('templates/header', 'close'); ?>
            <?php include Wrapper\template_path(); ?>
            <?php get_template_part('templates/footer'); ?>
          </div>
        </div>



    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>

</html>
