<li aria-expanded="false" class="accordion-item">
    <button class="item--inner">
        <?php
        $accessTitle = get_field('access_title');
        if ($accessTitle) : ?>
            <p class="question"><?php echo $accessTitle; ?></p>
        <?php endif; ?>


        <figure class="icon"><ion-icon name="arrow-forward-outline"></ion-icon></figure>
    </button>
    <?php
    $accessDescrip = get_field('access_description');
    if ($accessDescrip) :
    ?>
        <div class="p answer"><?php echo $accessDescrip; ?></div>
    <?php endif; ?>
</li>