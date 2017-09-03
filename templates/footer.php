<footer>
  <div class="arrow-up-wrapper back-to-top"><i class="icon-up" aria-hidden="true"></i></div>
  <div id="logo-wrapper2">
    <?php get_template_part('templates/svg/footerlogo'); ?>
  </div>
  <p>&copy; Handmade with <i class="icon-heart" aria-hidden="true"></i> and <i class="icon-coffee-cup" aria-hidden="true"></i> by Louise R Whitaker, 2017</p>
    <div class="social-icon-wrap">
      <a href="<?php the_field('github', 'option'); ?>" class="social-icon icon-github-filled"></a>
      <a href="<?php the_field('linked_in', 'option'); ?>" class="social-icon icon-linkedin-filled"></a>
      <a href="mailto:<?php the_field('email', 'option'); ?>" class="social-icon icon-email-filled"></a>
    </div>
</footer>
