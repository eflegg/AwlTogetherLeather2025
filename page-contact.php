<?php
/*
Template Name: Contact Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="pl-5 page-title title text-left d-flex">
    <h1><?php the_title( '' );?></h1>
    <hr>
</div>

<div class="layout-container row">
    <div class="contact-left col-12 col-md-6 p-5">
        <?php
        $contactAppt = get_field('contact_appointment');
        $apptText = $contactAppt['book_appointment_text'];
        if($apptText):?>
        <div class="book-appt">
            <p><?php echo $apptText; ?>
            <?php endif; ?>
            </p>
            <?php
            $button = $contactAppt['button'];
            if($button):?>
            <?php include 'components/button.php';?>
            <?php endif; ?>
           
        </div>
        <div class="track-order pt-4 pb-4">
        <?php
        $contactTrack = get_field('contact_order_tracking');
        $trackText = $contactTrack['order_tracking_text'];
        if($trackText):?>
            <p><?php echo $trackText; ?>
            </p>
            <?php endif; ?>
            <?php
            $button = $contactTrack['button'];
            if($button):?>
            <?php include 'components/button.php';?>
            <?php endif; ?>

        </div>
        <div class="email-us ">
            <?php
            $contactEmail = get_field('contact_email');
            if($contactEmail):?>
            <p><?php echo $contactEmail; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="contact-right col-12 col-md-6">
    <!-- <?php echo
            do_shortcode( '[ninja_form id=1]');
            ?> -->
    </div>

</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>