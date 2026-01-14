<?php
/*
Template Name: Contact Page
 */
?>

<?php get_header(); ?>
<main>
    <?php while (have_posts()): the_post(); ?>

        <div class="yellow-gradient">
            <?php include "components/custom-page-header.php"; ?>
        </div>

        <div class="layout-container row contact-container">
            <div class="contact-left col-12  p-5">
                <?php
                $contactAppt = get_field('contact_appointment');
                $apptText = $contactAppt['book_appointment_text'];
                if ($apptText): ?>
                    <div class="book-appt">
                        <p><?php echo $apptText; ?>
                        <?php endif; ?>
                        </p>
                        <?php
                        $button = $contactAppt['button'];
                        if ($button): ?>
                            <?php include 'components/button.php'; ?>
                        <?php endif; ?>

                    </div>
                    <div class="track-order pt-4 pb-4">
                        <?php
                        $contactTrack = get_field('contact_order_tracking');
                        $trackText = $contactTrack['order_tracking_text'];
                        if ($trackText): ?>
                            <p><?php echo $trackText; ?>
                            </p>
                        <?php endif; ?>
                        <?php
                        $button = $contactTrack['button'];
                        if ($button): ?>
                            <?php include 'components/button.php'; ?>
                        <?php endif; ?>

                    </div>
                    <div class="email-us ">
                        <?php
                        $emailUstext = get_field('email_us_text');
                        if ($emailUstext): ?>
                            <p><?php echo $emailUstext; ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    $contactEmail = get_field('contact_email');
                    if ($contactEmail): ?>
                        <a href="mailto:<?php echo $contactEmail; ?>">
                        <?php endif; ?>
                        <div class="">
                            <button class="btn btn--primary">
                                Email us
                            </button>
                        </div>
                        </a>
            </div>


        </div>


        <!-- close php loop -->
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>