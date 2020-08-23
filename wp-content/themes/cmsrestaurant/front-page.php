<?php get_header(); ?>
    <main>
        <h1><? bloginfo("name"); ?></h1>
        <?php if (have_posts()) : ?>

        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
            <article>
                <?= get_field('subtitle') ?>
                <?= get_field('title') ?>
                <img src="<?= get_field('image') ?>" alt="">
                <?= get_field('intern_link') ?>

                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('full'); ?>
                    <h2><?php the_title(); ?></h2>
                </a>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>">
                    <p>See More</p>
                </a>
            </article>
        <?php endwhile; ?>
        </div>

           <?php else : ?>
            <p>No article.</p>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>


<?php
// Pour répéteurs
/*
    if (have_rows('nom_champ_ACF')):
        while have_rows(): the_row();
            get_sub_field("nom_subfield")
    {

    }
    */