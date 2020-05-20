<?php
if (!empty($image)):
    // vars
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];
    // thumbnail
    $size = 'thumbnail';
    $thumb = $image['sizes'][$size]?>



							<img
								src="<?php echo $url; ?>"
								alt="<?php echo $alt; ?>" />

		        <!-- <i>you need to include an $image, dummy</i> -->
		<?php endif?>
