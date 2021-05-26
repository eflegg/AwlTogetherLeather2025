
<div class="access-block--container">
    <?php
    $accessTitle = get_field('access_title');
    if($accessTitle) :?>
    <h2 class="access-title"><?php echo $accessTitle; ?></h2>
    <?php endif; ?>
    <?php
    $accessDescrip = get_field('access_description');
    if($accessDescrip) :
        ?>
    <p class="access-description"><?php echo $accessDescrip; ?></p>
    <?php endif; ?>
    <?php 
    $accessButton = get_field('access_audit_button');
    $button=$accessButton['button'];

    if($accessButton);
    ?>

        <?php include 'button.php'; ?>
   
  
</div>

