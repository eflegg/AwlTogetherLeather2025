<?php
/*
Template Name: FAQ Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>


<div class="layout-container">
    <!-- test for page title here. could be blog -->
    <div class="page-title text-right d-flex flex-column-reverse flex-md-row">
        <hr> 
        <h1>FAQs</h1>
    </div>

    <div  class="access-grid--container grid">
    <div class="vertline">
        </div>

        <?php
        $args = array (
            'post_type' => 'faqs',
            'posts_per_page' => -1,
            'order' => 'ASC',
        );
        $faqQuery = new WP_query($args);
        if($faqQuery ->have_posts()): ?>
        <?php while($faqQuery->have_posts()) : $faqQuery->the_post() ?>
        
        <div class=" access-block--outer item"> 
            <?php include 'components/faq-block.php'; ?>
        </div> 
       
       <?php endwhile; endif; ?>
    </div>

</div>


<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>