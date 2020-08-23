<?php get_header(); ?>
    <main>
        <section class="home-bannertop-header">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h3 class="home-bannertop-header__subtitle"><?= the_field('header-subtitle') ?></h3>
                    <h2 class="home-bannertop-header__maintitle"><?= the_field('header-maintitle') ?></h2>
                    <?php
                    if ( has_post_thumbnail()) {
                        the_post_thumbnail('full', array('class' => 'home-bannertop-header__image'));
                    } ?>
                    <a href="<?= the_field('header-internlink') ?>" class="home-bannertop-header__internlink"></a>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-bannertop-qualities">
            <?php if (have_rows('home-bannertop-qualities')): ?>
                <?php while (have_rows('home-bannertop-qualities')): the_row(); ?>
                <?php
                    $image = get_sub_field('home-bannertop-qualities-image');
                    if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2><?php the_sub_field('home-bannertop-qualities-title'); ?></h2>
                    <p><?php the_sub_field('home-bannertop-qualities-text'); ?></p>
                <?php endwhile; ?>
            <?php else: ?>
            <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-intro">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $image = get_field('home-intro-image');
                    if(!empty($image)): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2 class="home-intro__title"><?= the_field('home-intro-title') ?></h2>
                    <h3 class="home-intro__subtitle"><?= the_field('home-intro-subtitle') ?></h3>
                    <p class="home-intro__text"><?= the_field('home-intro-text') ?></p>
                    <div class="home-intro__signature signature">
                        <p class="signature__subtitle"><?= the_field('home-intro-signature-subtitle') ?></p>
                        <p class="signature__title"><?= the_field('home-intro-signature-title') ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-restaurants">
            <?php
            // the query
            $the_query = new WP_Query(array (
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <h3 class="home-bannertop-header__subtitle"><?= the_field('header-subtitle') ?></h3>
                    <h2 class="home-bannertop-header__maintitle"><?= the_field('header-maintitle') ?></h2>

            <a href="<?= the_field('header-internlink') ?>" class="home-bannertop-header__internlink"></a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-menu">

        </section>

        <section class="home-testimony">

        </section>

        <section class="home-recipes">
            <!-- Bloc de Ruben -->
        </section>
    </main>
<?php get_footer(); ?>