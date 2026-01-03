<div class="newsletter-block yellow-gradient">

    <?php
    $newsletterBlock = get_field('newsletter_block_settings', 'options');
    if ($newsletterBlock); ?>
    <?php
    $image = $newsletterBlock['image_item'];
    if ($image); ?>
    <div class="left">
        <figure>
            <?php include "image.php"; ?>
        </figure>
    </div>
    <?php
    $newsletterHeadline = $newsletterBlock['newsletter_headline'];
    $newsletterSubhead = $newsletterBlock['newsletter_subhead']; ?>
    <?php
    if ($newsletterHeadline); ?>
    <div class="right">
        <h1 class="h2"><?php echo $newsletterHeadline; ?></h1>

        <?php
        if ($newsletterSubhead); ?>
        <p class><?php echo $newsletterSubhead; ?></p>
        <div class="footer--sign-up">

            <article>
                <?php echo do_shortcode('[ninja_form id=2]'); ?>
            </article>

        </div>
    </div>
</div>