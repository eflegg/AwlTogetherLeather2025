<div class="access-block--container item">
    <?php
    $faqQuestion = get_field('faq_question');
    if($faqQuestion) :?>
    <h2 class="access-title"><?php echo $faqQuestion; ?></h2>
    <?php endif; ?>
    <?php
    $faqAnswer = get_field('faq_answer');
    if($faqAnswer) :
        ?>
    <p class="access-description"><?php echo $faqAnswer; ?></p>
    <?php endif; ?>
  
   
  
</div>