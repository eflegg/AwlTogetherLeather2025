<?php
/*
Template Name: Home Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

   <?php include "components/home-hero.php" ;?>

    <div class="section--services layout-container">
        <h2 class="w-75 w-md-50">We’re repairing the future of leatherworks, one sole at a time</h2>
        <div class="listing-block--container row">
            <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?></div>
            <div class="col-12 col-sm-6 block-outer"><?php include "components/listing-block.php";?></div>
        </div>
        <div class="services--button">
            <a href="#">
                <button class="btn--primary">
                    See All Services
                </button>
            </a>
        </div>
    </div>

    <div class="section--accessibility d-flex flex-column flex-lg-row align-items-center">
        <div class="access-text">
            <h3>Accessibility Matters</h3>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
            <a href="#">
                <button class="btn--primary">
                    See Our Full Policy
                </button>
            </a>
        </div>
        <div class="access-image">
            <img src="https://picsum.photos/800" alt="">
        </div>
    </div>
    <div class="section--shop-slider">
        <h2 class="text-center">Shop</h2>
        <div class="product-slider">
            <?php echo
            do_shortcode( '[wcpscwc_pdt_slider type="products"]');
            ?>
        </div>
        <div class="text-center mt-5">

            <a href="#">
                    <button class="btn--primary">
                        Shop All Products
                    </button>
                </a>
        </div>
    </div>





     
 





<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>



