<?php
/*
Template Name: About Page
 */
?>

<?php get_header();?>

<?php while (have_posts()): the_post();?>

<div class="pl-5 page-title title text-left d-flex">
    <h1><?php wp_title( '' );?></h1>
    <hr>
</div>

<div class="layout-container about-container">
    <div class="about--hero-row row" >
        <div class="about--hero-img col-12 col-md-6">
            <img src="https://picsum.photos/400" alt="">        
            <div class="about--hero-caption">
                <p>
                Working to repair the future of cobbling
                </p>
            </div>
        </div>
        <div class="about--hero-text col-12 col-md-6">
            <p>

                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)
            </p>
            <p>
                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy..
            </p>

        </div>
    </div>
    <div class="page-title text-right d-flex mr-0">
        <hr> 
        <h2>We're passionate about our work</h2>
    </div>
    <div class="about--details row">
<div class="col-12 col-md-6 p-5">
    <h3 class="mb-5">The Leather</h3>
    <p>
        Our leather is constantly in rotation. We source locally and from afar. Our stock will always consist of 8 oz natural veg tan, 6-8 oz black oil tan, 8 – 10 oz black belting leather, many lightweight aniline and chrome-tanned leathers (black, red, blue, gold, silver, etc), lots and lots and lots of scraps. It’s likely we’ll also have some rough-out leathers (suede and nubuck) as well as the occasional exotic (ostrich shins, snakeskin). Craving something specific? Let us know. We’ll find it for you.
    </p>
</div>
<div class="col-12 col-md-6 p-5">
    <h3 class="mb-5">The Accessories</h3>
    <p>
    Want something extra spiffy on your jacket? Studs you say? We’ve got you. We’ll will add custom studs (of all shapes and sizes), rings, chains, buckles, straps, snaps and patches to just about anything. We also custom stamp words or patterns into leather with the options of a gold or silver finish.

    Note: we do not provide patches (you’ve got to bring them) or embroidery!

    </p>
</div>
<div class="col-12 col-md-6 p-5">
    <h3 class="mb-5">The Hardware</h3>
    <p>
    We currently stock hardware in silver and brass in a variety of buckles, snaps, zippers, studs, spots, eyelets, rings & attachments! Have a nickel allergy? Don’t fret! We have solid brass options that are body safe for long-term use.
    </p>
</div>

<div class="col-12 col-md-6 p-5">
    <h3 class="mb-5">What We Don't Do</h3>
    <p>
    We don’t do hand or machine embroidering (it’s a special fancy machine), hot foil stamping or laser engraving

    </p>
</div>
<div class="btn--text d-flex ml-auto mb-5 mr-5">
      <i>&xrarr;</i>
      <a href="#"><h3>See Our Work</h3></a>
</div>

    </div>
</div>



<!-- close php loop -->
<?php endwhile;?>

<?php get_footer();?>