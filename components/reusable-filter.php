


<?php 
$filterClass = "";?>

<div class="ajax-filters filter-by-category <?php if($filterClass): echo $filterClass; else: null; endif ;?>">
	<form class="category-form" id="ajax-filter">



<?php
	$parent_cat_arg = array(
		'hide_empty' => false, 
		'parent' => 0,
		'taxonomy' => 'product_cat',
	); 
	// get all categories that are parents, even the empty ones
	//category name that fulfills the above arguments
	$parent_cat = get_categories($parent_cat_arg);?> 


<?php foreach($parent_cat as $catVal):?>  

	<?php if($catVal->name == $category) :?>
		<!-- <h3><?php echo $catVal->name;?></h3> -->

		
	
		<?php $child_arg = array( 
			'hide_empty' => false, 
			'parent' => $catVal->term_id, 
		);

		$child_cat = get_terms( 'product_cat', $child_arg );?>
	

	

	<div data-type=<?php echo $dataType;?> class="cat-select" name="categories" id="cat-select">

	<label for="all-cats" class="cat-label active">

	<input type="radio" name="cat-option" id="all-cats" data-type=<?php echo $dataType;?> class="cat-list_item active" value="<?php echo $catVal->slug; ?>">All categories</input>
	</label>
		
		
		<?php foreach($child_cat as $child_term):?>
			<label for="<?= $child_term->slug; ?>" class="cat-label">
			<input name="cat-option" id="<?= $child_term->slug; ?>" type="radio" data-type=<?php echo $dataType;?> data-slug="<?= $child_term->slug; ?>" class="cat-list_item"  value="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></input>
			</label>
		<?php endforeach ;?>
		</div>


		<?php endif;?>
<?php endforeach; ?> 

		</form>
	</div>


<!-- select element filter -->
	<!-- <select data-type=<?php echo $dataType;?> class="cat-select" name="categories" id="cat-select">
		
		<option data-slug="" data-type=<?php echo $dataType;?> class="cat-list_item active" value="<?php echo $catVal->slug; ?>">All categories</option>
		<?php foreach($child_cat as $child_term):?>
			<option data-type=<?php echo $dataType;?> data-slug="<?= $child_term->slug; ?>" class="cat-list_item"  value="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></option>
		<?php endforeach ;?>
	</select> -->
	