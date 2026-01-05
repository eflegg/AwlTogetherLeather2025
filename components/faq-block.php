<li aria-expanded="false" class="accordion-item">
    <button class="item--inner">
        <?php
        $faqQuestion = get_field('faq_question');
        if ($faqQuestion) : ?>
            <p class="question"><?php echo $faqQuestion; ?></p>
        <?php endif; ?>


        <figure class="icon"><ion-icon name="arrow-forward-outline"></ion-icon></figure>
    </button>
    <?php
    $faqAnswer = get_field('faq_answer');
    if ($faqAnswer) :
    ?>
        <div class="p answer"><?php echo $faqAnswer; ?></div>
    <?php endif; ?>
</li>