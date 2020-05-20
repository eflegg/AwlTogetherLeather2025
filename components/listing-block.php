


<?php
$recipeHeader = get_field('recipe_header');
if ($recipeHeader): ?>
<div class="col-12 col-sm-6 col-md-4 container--recipes__single">
<?php
$image = $recipeHeader['image'];
if ($image): ?>
  <a href="<?php the_permalink();?>">
        <?php include "image.php";?>
        </a>
    <?php endif;?>
<?php
$recipeTitle = $recipeHeader['recipe_title'];
if ($recipeTitle): ?>

            <!-- <img src="http://localhost:8888/whatsfordinner/wp-content/uploads/2020/03/147735EMfl120212-R1-005-2-scaled.jpg" alt=""> -->
            <a href="<?php the_permalink();?>">
            <h3 class="mt-3"><?php echo $recipeTitle; ?></h3>
            </a>
    <?php endif;?>

        </div>

        <?php endif;?>
