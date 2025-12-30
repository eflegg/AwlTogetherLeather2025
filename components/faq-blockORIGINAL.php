<div class="access-block--container content">
    <?php
    $faqQuestion = get_field('faq_question');
    if ($faqQuestion) : ?>
        <h2 class="access-title"><?php echo $faqQuestion; ?></h2>
    <?php endif; ?>
    <?php
    $faqAnswer = get_field('faq_answer');
    if ($faqAnswer) :
    ?>
        <p class="access-description"><?php echo $faqAnswer; ?></p>
    <?php endif; ?>


    <li aria-expanded="false" class="accordion-item">
        <button class="item--inner display-flex justify-space-between">
            <?php
            $faqQuestion = get_field('faq_question');
            if ($faqQuestion) : ?>
                <p><?php echo $faqQuestion; ?></p>
            <?php endif; ?>


            <figure class="icon"><img src="<?php bloginfo('template_url'); ?>/images/svg-arrow.svg" alt="chevron icon"></figure>
        </button>
        <?php
        $faqAnswer = get_field('faq_answer');
        if ($faqAnswer) :
        ?>
            <div class="p answer"><?php echo $faqAnswer; ?></div>
        <?php endif; ?>
    </li>


</div>


<div class="access-grid--container grid">
    <div class="vertline">
    </div>

    <?php
    $args = array(
        'post_type' => 'faqs',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    $faqQuery = new WP_query($args);
    if ($faqQuery->have_posts()): ?>
        <?php while ($faqQuery->have_posts()) : $faqQuery->the_post() ?>

            <div class=" access-block--outer item">
                <?php include 'components/faq-block.php'; ?>
            </div>

    <?php endwhile;
    endif; ?>
</div>