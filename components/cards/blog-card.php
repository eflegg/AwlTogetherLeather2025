<article class="blog-card--container">
<a  href="<?php the_permalink();?>">
<?php if (has_post_thumbnail( $post->ID ) ): ?>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <figure>
    <img src="<?php echo $image[0]; ?>" alt="">
  </figure>
<?php endif; ?>
<div class="card-text">
<? global $post; $categories = get_the_category($post->ID);?>
  <p class="card-date"><?php the_date();?></p>
      <h3 class="card-title"><?php the_title();?></h3>
       <? foreach( $categories as $category ): ?>
                    <p class="cat-title"><?= $category->cat_name; ?></p>
                <? endforeach; ?>
      <div class="excerpt">
          <?php the_excerpt();?>
      </div>
</div>
</a>
</article>