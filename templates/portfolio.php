<?php
$thumb = get_field('thumbnail');
$tags = get_field('tags');
$featured = get_field('featured');
?>

<div class="col-lg-4 col-md-6 mix <?php if( $tags ): foreach( $tags as $tag ): echo $tag['value']; echo ' '; endforeach; endif;?> <?php if( $featured && in_array('featured', $featured)): echo 'featured'; endif;?>">

  <div class="content-wrapper page-card-target" data-page-path="<?php the_permalink(); ?>">
    <img class="img-fluid page-card-content" src="<?php echo $thumb['url']; ?>" alt="<?php echo $thumb['alt']; ?>">
    <div class="portfolio-caption">
      <span>
        <p class="project-title"><?php the_title(); ?></p>
        <?php
        // vars
        $tags = get_field('tags');
        $lastitem = count($tags) - 1;
        $i = 0;
        // check
        if( $tags ): ?>
        <p class="project-tags">
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
      </span>
    </div>
  </div>
</div>
