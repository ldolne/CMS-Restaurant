<?php get_header(); ?>
    <main class="home">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <section class="home-bannertop-header" style="background-image:url('<?php echo get_field('header-image'); ?>')">
            <div class="home-bannertop-header__blocktext">
                <h3 class="home-bannertop-header__subtitle"><?php echo get_field('header-subtitle'); ?></h3>
                <h2 class="home-bannertop-header__maintitle"><?php echo get_field('header-maintitle'); ?></h2>
                <?php $internLink = get_field('header-internlink'); ?>
                <a href="<?php echo $internLink['url'] ?>" class="home-bannertop-header__internlink"><?php echo $internLink['title'] ?></a>
            </div>
            <img class="home-bannertop-header__hachure" src="http://localhost:8000/wp-content/uploads/2020/08/hachures-blanches-1-e1598446491726.png" alt="">
        </section>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No info.</p>
        <?php endif; ?>
        <section class="home-bannertop-qualities">
            <?php if (have_rows('home-bannertop-qualities')): ?>
                <?php while (have_rows('home-bannertop-qualities')): the_row(); ?>
                <?php
                    $image = get_sub_field('home-bannertop-qualities-image');
                    if( !empty( $image ) ): ?>
                    <img class="home-bannertop-qualities__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2 class="home-bannertop-qualities__title"><?php echo get_sub_field('home-bannertop-qualities-title'); ?></h2>
                    <p class="home-bannertop-qualities__text"><?php echo get_sub_field('home-bannertop-qualities-text'); ?></p>
                <?php endwhile; ?>
            <?php else: ?>
            <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-intro">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $image = get_field('home-intro_home-intro-image');
                    if(!empty($image)): ?>
                        <img class="home-intro__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <h2 class="home-intro__title"><?php echo get_field('home-intro_home-intro-title'); ?></h2>
                    <h3 class="home-intro__subtitle"><?php echo get_field('home-intro_home-intro-subtitle'); ?></h3>
                    <p class="home-intro__text"><?php echo get_field('home-intro_home-intro-text'); ?></p>
                    <div class="home-intro__signature signature">
                        <p class="signature__subtitle"><?php echo get_field('home-intro_home-intro-signature_home-intro-signature-subtitle'); ?></p>
                        <p class="signature__title"><?php echo get_field('home-intro_home-intro-signature_home-intro-signature-title'); ?></p>
                    </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No info.</p>
        <?php endif; ?>
        </section>

        <section class="home-restaurants">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <h3 class="home-restaurants__subtitle"><?= the_field('home-3restaurants_home-3restaurants-subtitle') ?></h3>
                    <h2 class="home-restaurants__title"><?= the_field('home-3restaurants_home-3restaurants-title') ?></h2>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No info.</p>
            <?php endif; ?>

            <?php
            // the query
            $the_query = new WP_Query(array (
                'post_type' => 'post',
                'posts_per_page' => 3,
                'order'   => 'ASC',
            ));
            ?>

            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php if (have_rows('restaurants-bannerpresentation_restaurants-bannerpresentation-repeater')): ?>
                        <?php the_row(); ?>
                            <?php
                            $image = get_sub_field('restaurants-bannerpresentation-repeater-image');
                            if( !empty( $image ) ): ?>
                                <img class="home-restaurants-repeater__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                            <h5 class="home-restaurants-repeater__subtitle"><?php echo get_sub_field('restaurants-bannerpresentation-repeater-subtitle'); ?></h5>
                            <h4 class="home-restaurants-repeater__title"><?php echo get_sub_field('restaurants-bannerpresentation-repeater-title'); ?></h4>
                            <p class="home-restaurants-repeater__content"><?php echo get_sub_field('restaurants-bannerpresentation-repeater-content'); ?></p>
                            <a class="home-restaurants-repeater__link" href="<?php the_permalink(); ?>">
                                <p>More infos</p>
                            </a>
                    <?php else: ?>
                        <p>No info.</p>
                    <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-menu">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $images = get_field('home-ourmenu_home-ourmenu-gallery');
                    if( $images ): ?>
                        <ul>
                            <?php foreach( $images as $image ): ?>
                                <li>
                                    <a href="<?php echo esc_url($image['url']); ?>">
                                        <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </a>
                                    <p><?php echo esc_html($image['caption']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <h3 class="home-menu__subtitle"><?php echo get_field('home-ourmenu_home-ourmenu-subtitle'); ?></h3>
                    <h2 class="home-menu__title"><?php echo get_field('home-ourmenu_home-ourmenu-title'); ?></h2>
                    <p class="home-menu__text"><?php echo get_field('home-ourmenu_home-ourmenu-text'); ?></p>
                    <?php
                    $internLink = get_field('home-ourmenu_home-ourmenu-internlink'); ?>
                    <a class="home--menu__link" href="<?php echo $internLink['url'] ?>">
                        <p><?php echo $internLink['title'] ?></p>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-testimony">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (have_rows('home-testimony_home-testimony-repeater')): ?>
                        <?php while(have_rows('home-testimony_home-testimony-repeater')) : the_row(); ?>
                        <?php
                        $image = get_sub_field('home-testimony-repeater-image');
                        if( !empty( $image ) ): ?>
                            <img class="home-testimony__image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        <p class="home-testimony__text"><?php echo get_sub_field('home-testimony-repeater-text'); ?></p>
                        <p class="home-testimony__name"><?php echo get_sub_field('home-testimony-repeater-name'); ?></p>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No info.</p>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
            <p>No info.</p>
            <?php endif; ?>
        </section>

        <section class="home-recipes">
            <!-- Bloc de Ruben -->
        </section>
    </main>
<?php get_footer(); ?>