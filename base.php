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
                <button type="button" class="control hvr-underline-from-center" data-filter=".uid">UI Design</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".uxr">UX Research</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".ia">Information Architecture</button>
                <button type="button" class="control hvr-underline-from-center" data-filter=".ixd">Interaction Design</button>
              </div>
            </div>

          </div>
          <div class="row portfolio-cards page-card-grid" id="portfolio-cards">
            <div class="col-md-4 col-sm-6 mix uxr uxd code featured">
              <div class="content-wrapper page-card-target" data-page-path="test.html">
                <img class="img-fluid page-card-content" src="<?= get_template_directory_uri(); ?>/dist/images/thumbs/wot.jpg" alt="Women of Tomorrow Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Women of Tommorrow</p>
                    <p class="project-tags">UX Design, UX Research, Code</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxd featured">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/so.jpg" alt="Sports Unified Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Unified Sports</p>
                    <p class="project-tags">UX Design</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxd featured">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/radio.jpg" alt="Radio UI">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Radio UI</p>
                    <p class="project-tags">UX Design</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxr uxd">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/parkpass.jpg" alt="Park Pass Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">ParkPass</p>
                    <p class="project-tags">UX Design, UX Research</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxd">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/dashboard.jpg" alt="SafetyFirst Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">SafetyFirst</p>
                    <p class="project-tags">UX Design</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxd code">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/ccs.jpg" alt="U-Compute">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">U-Compute</p>
                    <p class="project-tags">UX Design, Code</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxd code">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/lemon.jpg" alt="Good Lemon Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">The Good Lemon Project</p>
                    <p class="project-tags">UX Design, Code</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix pcomp code">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/mirror.jpg" alt="Good Lemon Project">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Magic Mirror</p>
                    <p class="project-tags">P-Comp, Code</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxr uxd">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/coke.jpg" alt="Coke Ethnography">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Coke Ethnography</p>
                    <p class="project-tags">UX Research, UX Design</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix uxr">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/im.jpg" alt="Interactive Media Website Review and Card Sort">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Interactive Media Website Review and Card Sort</p>
                    <p class="project-tags">UX Research</p>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mix pcomp uxr uxd">
              <div class="content-wrapper page-card-target">
                <img class="img-fluid page-card-content" src="img/thumbs/docs.jpg" alt="Usabilty Testing DOCS Website">
                <div class="portfolio-caption">
                  <span>
                    <p class="project-title">Usabilty Testing DOCS Website</p>
                    <p class="project-tags">UX Research, UX Design</p>
                  </span>
                </div>
              </div>
            </div>
          </div>
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
              <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Your Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Subject</label>
                  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea">Message</label>
                  <textarea class="form-control" id="exampleTextarea" placeholder="Enter Your Message..." rows="5"></textarea>
                </div>

                <div class="button">
                  <button class="button-link" type="submit">
                    <svg>
                      <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
                    </svg>
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
          <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
        </div>
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
