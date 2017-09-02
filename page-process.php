<?php
/**
 * Template Name: Process Page
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <div class="background-wrapper">
    <div class="container mb-50" id="">
      <!-- Example row of columns -->
      <div class="row page-intro text-center">
        <div class="col-sm-12">
          <i class="icon-process"></i>
          <h1 class="text-center">My Process</h1>
        </div>

      </div>
      <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
    </div>

    <div class="container pb-100" id="">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-10 ml-md-auto mr-md-auto">
          <p class="lead"><?php the_field('intro_text'); ?></p>
        </div>
      </div>
    </div>
  </div>



  <div class="process-timeline">
    <div class="stem-wrapper">
      <div class="stem"></div>
      <div class="stem-background"></div>
    </div>

    <div class="section process-line">
      <div class="section-inner">

        <div class="stem-padding"></div>

        <div class="post-wrapper">

          <article class="post research-icon" data-stem-color="pink">
            <div class="stem-overlay">
              <div class="icon"></div>
              <div class="stem-mask"></div>
            </div>

            <div class="post-content">
              <p class="meta">Step 1</p>
              <h2 class="post-title">Background Research</h2>
              <div class="entry-content">
                <p><?php the_field('background_research_text'); ?></p>
              </div>
            </div>
          </article>

          <article class="post brainstorm-icon" data-stem-color="orange">
            <div class="stem-overlay">
              <div class="icon"></div>
              <div class="stem-mask"></div>
            </div>

            <div class="post-content">
              <p class="meta">Step 2</p>
              <h2 class="post-title">Brainstorm & Sketching</h2>
              <div class="entry-content">
                <p><?php the_field('brainstorming_text'); ?></p>
              </div>
            </div>
          </article>

          <article class="post design-icon" data-stem-color="pink">
            <div class="stem-overlay">
              <div class="icon"></div>
              <div class="stem-mask"></div>
            </div>

            <div class="post-content">
              <p class="meta">Step 3</p>
              <h2 class="post-title">Wireframing & Prototyping</h2>
              <div class="entry-content">
                <p><?php the_field('wireframing_and_prototyping_text'); ?></p>
              </div>
            </div>
          </article>

          <article class="post test-icon" data-stem-color="orange">
            <div class="stem-overlay">
              <div class="icon"></div>
              <div class="stem-mask"></div>
            </div>

            <div class="post-content">
              <p class="meta">Step 4</p>
              <h2 class="post-title">User Testing</h2>
              <div class="entry-content">
                <p><?php the_field('user_testing_text'); ?></p>
              </div>
            </div>
          </article>

          <article class="post iterate-icon" data-stem-color="pink">
            <div class="stem-overlay">
              <div class="icon"></div>
              <div class="stem-mask"></div>
            </div>

            <div class="post-content">
              <p class="meta">Step 5</p>
              <h2 class="post-title">Iterate</h2>
              <div class="entry-content">
                <p><?php the_field('iterate_text'); ?></p>
              </div>
            </div>
          </article>


        </div> <!-- post-wrapper -->

        <!-- <div class="single-stem-icon scroll-to-top trigger-scroll-to-top"></div> -->

      </div> <!-- section-inner -->
    </div> <!-- main-content -->
  </div>

<?php endwhile; ?>
