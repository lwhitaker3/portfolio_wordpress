<?php while (have_posts()) : the_post(); ?>

  <div id="trigger1"></div>
  <div id="pin1" class="project-intro <?php the_field('intro_side'); ?>">
    <div class="project-intro-image">
      <div class="image-wrapper">
        <?php
        $intro_image = get_field('intro_image');
        if( !empty($intro_image) ): ?>
        	<img src="<?php echo $intro_image['url']; ?>" alt="<?php echo $intro_image['alt']; ?>" />
        <?php endif; ?>
      </div>
    </div>
    <div class="project-intro-text">
      <?php
      // vars
      $tags = get_field('tags');
      $lastitem = count($tags) - 1;
      $i = 0;
      // check
      if( $tags ): ?>
      <p class="project-category">
      	<?php foreach( $tags as $tag ):
          if ($i != $lastitem):
            echo $tag['label']; echo ", ";
          else:
            echo $tag['label'];
          endif;
          $i++;
        endforeach; ?>
      </p>
      <?php endif; ?>
      <h1 class='display-1'><?php the_title(); ?></h1>
      <p class="project-description lead"><?php the_field('project_intro'); ?></p>
      <p class="project-date"><?php the_field('project_date'); ?></p>
      <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
    </div>
    <div class="icon-down-wrapper"><i class="icon-down"></i></div>
  </div>

  <div class="project-intro-text-mobile">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php
            // vars
            $tags = get_field('tags');
            // check
            if( $tags ): ?>
            <p class="project-category">
              <?php foreach( $tags as $tag ): ?>
                <?php echo $tag['label']; ?>,
              <?php endforeach; ?>
            </p>
            <?php endif; ?>
          <h1 class='display-1'><?php the_title(); ?></h1>
          <p class="project-description lead"><?php the_field('project_intro'); ?></p>
          <p class="project-date"><?php the_field('project_date'); ?></p>
          <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
        </div>
      </div>
    </div>
  </div>


  <div class="project-overview">
    <div class="container page-section" id="">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="mb-50">Overview</h2>
        </div>
      </div>
      <?php
      // vars
      $overview = get_field('overview');
      if( $overview ): ?>

        <div class="row at-a-glance justify-content-sm-center text-center">
          <div class="col col-sm-4 col-md-3">
            <h4 class="mb-20">Tools</h4>
            <p><?php echo $overview['tools']; ?></p>
          </div>
          <div class="col col-sm-4 col-md-3">
            <h4 class="mb-20">Methods</h4>
            <p><?php echo $overview['methods']; ?></p>
          </div>
          <div class="col col-sm-4 col-md-3">
            <h4 class="mb-20">Context</h4>
            <p><?php echo $overview['context']; ?></p>
          </div>
        </div>
      <?php endif; ?>
      <div class="row flex mb-50">
        <div class="col-md-6">
          <div class="image-wrapper mb-50-mobile">
            <?php
            $challenge = get_field('challenge_image');
            if( !empty($challenge) ): ?>
            	<img src="<?php echo $challenge['url']; ?>" alt="<?php echo $challenge['alt']; ?>" />
            <?php endif; ?>
          </div>
        </div>
        <div class="col-md-6 content-vertical">
          <h3 class="mb-20">The Challenge</h3>
          <p class=""><?php the_field('challenge_text'); ?></p>
        </div>
      </div>
      <div class="row flex">
        <div class="col-md-6 content-vertical mb-50-mobile">
          <h3 class="mb-20">The Solution</h3>
          <p class=""><?php the_field('solution_text'); ?></p>
        </div>
        <div class="col-md-6">

          <?php
            // check if the flexible content field has rows of data
            if( have_rows('solution_media') ):

                 // loop through the rows of data
                while ( have_rows('solution_media') ) : the_row();

                    if( get_row_layout() == 'image' ):

                    $solution = get_sub_field('image');
                    if( !empty($solution) ): ?>
                      <div class="image-wrapper mb-50-mobile">
                        <img src="<?php echo $solution['url']; ?>" alt="<?php echo $solution['alt']; ?>" />
                      </div>
                    <?php endif;

                    elseif( get_row_layout() == 'video' ):
                      $video = get_sub_field('youtube_link');

                    ?>

                      <div class="videoWrapper">
                        <iframe width="100%" height="auto" src="<?php echo $video['url']; ?>" frameborder="0" allowfullscreen></iframe>
                      </div>

                    <?php

                    endif;

                endwhile;

            else :

                // no layouts found

            endif;

            ?>

        </div>
      </div>
    </div>
  </div>

  <div class="project-process">
    <div class="container page-section">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="mb-50">Process</h2>
        </div>
      </div>


      <?php if( have_rows('process') ): ?>

      	<div class="step-wrapper">

      	<?php while( have_rows('process') ): the_row();

      		// vars
      		$title = get_sub_field('title');
      		$text = get_sub_field('text');
      		?>

          <div class="row mb-50">
            <div class="col-sm-1">
              <img class="step-icon" src="<?= get_template_directory_uri(); ?>/dist/images/diamond.svg">
            </div>
            <div class="col-sm-11">
              <h5 class=""><?php echo $title; ?></h5>
              <div class ="mb-50"><?php echo $text; ?></div>

              <?php
              if( have_rows('links') ):
                while( have_rows('links') ): the_row();
                $project_link = get_sub_field('link');
                ?>
                  <div class="button large mb-50">
                    <a class="button-link" href="<?php echo $project_link['url'];?>">
                      <svg>
                        <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
                      </svg>
                      <?php echo $project_link['title'];?>
                    </a>
                  </div></br>
                <?php endwhile; ?>
              <?php endif; ?>
              <?php
              if( have_rows('media') ):
              ?>

                <?php
                // check if the flexible content field has rows of data
                while ( have_rows('media') ) : the_row();

                  if( get_row_layout() == 'single_image' ):
                    $single_image = get_sub_field('image');
                    ?>
                    <div class="row">
                      <div class="col-sm-12 mb-50">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $single_image['url']; ?>" alt="<?php echo $single_image['alt']; ?>">
                          <p class="card-text"><?php echo $single_image['caption']; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php elseif ( get_row_layout() == 'two_images' ):
                    $two_image_1 = get_sub_field('image_1');
                    $two_image_2 = get_sub_field('image_2'); ?>
                    <div class="row">
                      <div class="col-sm-6 mb-50">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $two_image_1['url']; ?>" alt="<?php echo $two_image_1['alt']; ?>">
                          <p class="card-text"><?php echo $two_image_1['caption']; ?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $two_image_2['url']; ?>" alt="<?php echo $two_image_2['alt']; ?>">
                          <p class="card-text"><?php echo $two_image_2['caption']; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php elseif ( get_row_layout() == 'three_images' ):
                    $three_image_1 = get_sub_field('image_1');
                    $three_image_2 = get_sub_field('image_2');
                    $three_image_3 = get_sub_field('image_3'); ?>
                    <div class="row">
                      <div class="col-sm-4 mb-50">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $three_image_1['url']; ?>" alt="<?php echo $three_image_1['alt']; ?>">
                          <p class="card-text"><?php echo $three_image_1['caption']; ?></p>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $three_image_2['url']; ?>" alt="<?php echo $three_image_2['alt']; ?>">
                          <p class="card-text"><?php echo $three_image_2['caption']; ?></p>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="card">
                          <img class="card-img-top img-border" src="<?php echo $three_image_3['url']; ?>" alt="<?php echo $three_image_3['alt']; ?>">
                          <p class="card-text"><?php echo $three_image_3['caption']; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php elseif ( get_row_layout() == 'carousel_3' ):
                    if( have_rows('images') ): ?>
                    <div class="row">
                      <div class="col-sm-12 mb-50">
                        <div class="image-slider mobile">
                          <?php while ( have_rows('images') ) : the_row();
                            $carousel_image = get_sub_field('image');?>
                            <div><img src="<?php echo $carousel_image['url']; ?>" alt="<?php echo $carousel_image['alt']; ?>"><p><?php echo $carousel_image['caption']; ?></p></div>
                          <?php endwhile; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                  <?php elseif ( get_row_layout() == 'carousel_1' ):
                    if( have_rows('images') ): ?>
                    <div class="row">
                      <div class="col-sm-12 mb-50">
                        <div class="image-slider full">
                          <?php while ( have_rows('images') ) : the_row();
                            $carousel_image_2 = get_sub_field('image');?>
                            <div><img src="<?php echo $carousel_image_2['url']; ?>" alt="<?php echo $carousel_image_2['alt']; ?>"><?php echo $carousel_image_2['caption']; ?></div>
                          <?php endwhile; ?>
                        </div>
                      </div>
                    </div>
                    <?php endif; ?>
                  <?php elseif ( get_row_layout() == 'text' ): ?>
                    <div class="row mb-50">
                      <?php the_sub_field('text');?>
                    </div>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>

      	<?php endwhile; ?>

      </div>

      <?php endif; ?>
      <div class="step-wrapper">

        <!-- <div class="row mb-100">
          <div class="col-sm-1">
            <img class="step-icon" src="img/diamond.svg" alt="Generic placeholder image">
          </div>
          <div class="col-sm-11">
            <h5 class="">1. Brainstorming</h5>
            <p class="mb-50">The client was looking for a way to grow community engagement so we had a very broad ask to work with. We began the project with brainstorming sessions to break down the design problem and identify areas for improvement. This allowed us to come up with the concept for our application. The app is a tool for coaches to schedule and manage events and a tool for players to find events and teams in their area.</p>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <img class="card-img-top img-border" src="img/so/design-thinking.jpg" alt="Sticky Notes">
                  <p class="card-text">Affinity Diagram with Sticky Notes</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-100">
          <div class="col-sm-1">
            <img class="step-icon" src="img/diamond.svg" alt="Generic placeholder image">
          </div>
          <div class="col-sm-11">
            <h5 class="">2. Design</h5>
            <p class="mb-50">We used an agile apporach to this project. We worked to develop a new prototype each week so it could be tested with users right away to continuously get feedback and refine our design. We used symbols in Sketch to create a style guide that we refined and developed as we went through the project.</p>
            <div class="row">
              <div class="col-sm-6 mb-50-mobile">
                <div class="card">
                  <img class="card-img-top" src="img/so/earlyiteration.jpg" alt="First Iteration of Design">
                  <p class="card-text">First Design Iteration</p>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <img class="card-img-top" src="img/so/designguide.jpg" alt="Styles in Sketch">
                  <p class="card-text">Styles created with symbols in Sketch App</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-100">
          <div class="col-sm-1">
            <img class="step-icon" src="img/diamond.svg" alt="Generic placeholder image">
          </div>
          <div class="col-sm-11">
            <h5 class="">3. Testing</h5>
            <p class="mb-50">Each prototype was tested with our key users - both players and coaches. In our weekly meeting, we went through the wireframes and discussed feedback we received on the design and how we could improve it.</p>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <img class="card-img-top" src="img/so/earlyiteration.jpg" alt="First Iteration of Design">
                  <p class="card-text">Print out of wireframes with feedback notes.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-100">
          <div class="col-sm-1">
            <img class="step-icon" src="img/diamond.svg" alt="Generic placeholder image">
          </div>
          <div class="col-sm-11">
            <h5 class="">4. Iterations</h5>
            <p class="mb-50">By the end of the project we had 21 iterations of our admin app and 11 iterations of our player app. This is the evolution of the home screen for the admin app.</p>
            <div class="image-slider slider-iterations">
              <div><img src="img/so/iteration1.jpg" alt="Home Page - Iterations 1"></div>
              <div><img src="img/so/iteration2.jpg" alt="Home Page - Iterations 2"></div>
              <div><img src="img/so/iteration4.jpg" alt="Home Page - Iterations 4"></div>
              <div><img src="img/so/iteration5.jpg" alt="Home Page - Iterations 5"></div>
              <div><img src="img/so/iteration11.jpg" alt="Home Page - Iterations 11"></div>
              <div><img src="img/so/iteration13.jpg" alt="Home Page - Iterations 13"></div>
              <div><img src="img/so/iteration17.jpg" alt="Home Page - Iterations 17"></div>
              <div><img src="img/so/iteration21.jpg" alt="Home Page - Iterations 21"></div>
            </div>
          </div>
        </div>

        <div class="row mb-100">
          <div class="col-sm-1">
            <img class="step-icon" src="img/diamond.svg" alt="Generic placeholder image">
          </div>
          <div class="col-sm-11">
            <h5 class="">5. Final Presentation</h5>
            <p class="">After 15 weeks we had two complete prototypes we presented to our client. The two prototypes were developed in inVision to demonstrate the interactions to the client. They reflected all of the user feedback we had gathered over the 15 weeks.</p>
            <p class="mb-50">From this project I learned: when collaborating on sketch projects keeping all of the art boards organized and labeled is key, the Craft plugin for Sketch saves so much time, and creating a design library when working on a team so everyone is using the same buttons and fonts while developing wireframes is a must.</p>
            <div class="button large mb-50">
              <a class="button-link" href="">
                <svg>
                  <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
                </svg>
                Admin/Coach App Prototype
              </a>
            </div>
            <div class="button large mb-50">
              <a class="button-link" href="">
                <svg>
                  <rect x="0" y="0" fill="none" width="100%" height="100%"></rect>
                </svg>
                Player App Prototype
              </a>
            </div>
            <div class="image-slider slider-final">
              <div><img class="carousel_image" src="img/so/screen5.jpg" alt="Login Screen"><p>Login Screen</p></div>
              <div><img class="carousel_image" src="img/so/screen4.jpg" alt="Home Screen"><p>Home Screen</p></div>
              <div><img class="carousel_image" src="img/so/screen9.jpg" alt="Team Page"><p>Team Page</p></div>
              <div><img class="carousel_image" src="img/so/screen2.jpg" alt="Event Information"><p>Event Information</p></div>
              <div><img class="carousel_image" src="img/so/screen6.jpg" alt="Notifications"><p>Notifications</p></div>
              <div><img class="carousel_image" src="img/so/screen7.jpg" alt="Profile Page"><p>Profile Page</p></div>
              <div><img class="carousel_image" src="img/so/screen1.jpg" alt="Create a Team"><p>Create a Team</p></div>
              <div><img class="carousel_image" src="img/so/screen8.jpg" alt="Member Page"><p>Member Page</p></div>
              <div><img class="carousel_image" src="img/so/screen3.jpg" alt="Find a Sport"><p>Find a Sport</p></div>
            </div>
          </div>
        </div> -->

      </div>
    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
  </div>
<?php endwhile; ?>
