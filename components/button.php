<?php  if ($button): ?>

<?php
	$buttonText = $button['button_text'];
	$buttonType =  $button['internal_or_external_link'];
	if ($buttonText && $buttonType): ?>
	<?php
		
		if ($buttonType === 'Yes'):
	?>
		<?php
			$posts = $button['internal_link'];
			if( $posts ): ?>
					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
							<?php setup_postdata($post); ?>
							<a
							
							href="<?php the_permalink(); ?>">
							<div class="btn--primary">
									<?php echo $buttonText; ?>
								</div>
								</a>
								 
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
		<?php else: ?>
		<?php
			$externalUrl = $button['external_link'];
			if ($externalUrl):
		 ?>
		 <div class="btn--primary">

			 <a
				
				 target="_blank"
				 href="<?php echo $externalUrl?>">
				 <?php echo $buttonText; ?>
			 </a>
		 </div>
			<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
    <?php else: ?>
        <i>you have incorrectly formatted your $button variable</i>
<?php endif; ?>
