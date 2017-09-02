<?php
/**
 * Template Name: About Page
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row page-intro text-center">
      <div class="col-sm-12">
        <i class="icon-coffee-cup"></i>
        <h1 class="text-center">About Me</h1>
      </div>

    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">
  </div>

  <div class="container page-section" id="">
    <!-- Example row of columns -->
    <div class="row flex">
      <div class="col-md-12">
        <?php
          $image = get_field('image');
          if( !empty($image) ): ?>
          <img class="about-photo" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php endif; ?>
        <h2>Hi, I am Louise!</h2>
        <p class="lead about-intro"><?php the_field('lead_text'); ?></p>
        <?php the_field('about_text'); ?>
      </div>
    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>

  <div class="container page-section" id="">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center mb-50">Hobbies/Interests</h2>
      </div>
    </div>
    <div class="row hobbies">
      <div class="col-md-3 col-sm-4">
        <i class="icon-scissors"></i>
        <p>Scrapbooking</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-sewing"></i>
        <p>Sewing</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-puzzle"></i>
        <p>Solving Puzzles</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-coffee-cup"></i>
        <p>Drinking Coffee</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-tv"></i>
        <p>Watching Crime Shows</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-steps"></i>
        <p>Getting Steps</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-column"></i>
        <p>History</p>
      </div>
      <div class="col-md-3 col-sm-4">
        <i class="icon-map"></i>
        <p>Travelling</p>
      </div>
    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>

  <div class="container page-section" id="">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-sm-12">
        <h2 class="text-center mb-50">States I've Visited</h2>
      </div>
      <div class="col-md-10 ml-md-auto mr-md-auto">
        <p class="text-center lead mb-50">My goal is to visit all 50, I still have a long way to go. <span class="pink">Pink</span> are the ones I've visted, <span class="orange">orange</span> are states I've travelled through, but never actually stopped at.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php get_template_part('templates/svg/usa'); ?>



      </div>
    </div>
    <img class="section-divider" src="<?= get_template_directory_uri(); ?>/dist/images/divider.svg">

  </div>

<?php endwhile; ?>
