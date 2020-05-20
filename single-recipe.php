<?php

get_header();

?>


<section class="single--recipe">
<a class="link--home" href="<?php echo home_url(); ?>">
<img src="https://www.whatsfordinner.me/wp-content/uploads/2020/03/iconfinder_double-arrow-left_383152-e1585342069931.png" alt=""></a>
     <header>
     <?php
$recipeHeader = get_field('recipe_header');
if ($recipeHeader): ?>
<?php
$recipeTitle = $recipeHeader['recipe_title'];
if ($recipeTitle): ?>

<h1 class="header--title__recipe"><?php echo $recipeTitle; ?></h1>
<?php endif;?>

<h3 class="mb-5">By <?php the_field('your_name');?></h3>
<?php
$recipeIntro = $recipeHeader['recipe_intro'];
if ($recipeIntro): ?>
<h3 class="header--subtitle__recipe"><?php echo $recipeIntro; ?></h3>
<?php endif;?>
</header>
<section class="d-flex flex-column flex-md-row header--recipe">
    <div class="container--left col-12 col-md-6">
    <ol class="list--ingredients w-100">

	<?php
$repeater = get_field('ingredients');
if ($repeater): ?>
		<!--
			Erin note: when I am using a repeater that's nested within a group, it's easer to target the array (repeater) with a variable, then I will run a foreach loop for the sub items instead
		 -->
		<ol>
			<?php
foreach ($repeater as $row) {
    echo '<li>' . $row['single_ingredient'] . '</li>';
}
?>
            </ol>
        <?php endif;?>
    </div>

    <?php
$image = $recipeHeader['image'];
if ($image): ?>
    <div class="container--right col-12 col-md-6">
        <?php include 'components/image.php';?>
    <?php endif;?>
    </div>
</section>

<section class="section--steps">
    <h2>Steps</h2>
    <?php the_field('method');?>

</section>
<?php endif;?>

<?php get_footer();?>


