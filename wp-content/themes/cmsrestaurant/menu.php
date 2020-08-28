<?php
/*
template name: menu
*/
?>

<?php get_header() ?>
<header>
    <div class="menu_image">
<?php the_post_thumbnail('post-thumbnail',['class'=>'menu_image_principal']);?>
        <div class="menu_title_image">
            <?php
            $url= get_field('header-internlink')
            ?>
            <span class="menu_title_image_1"><?php echo get_field('header-subtitle'); ?></span>
            <br>
            <span class="menu_title_image_2"><?php echo get_field('header-maintitle');?></span>
            <br>
            <a class="menu_header_link" href="<?php echo $url['url'];?>">order online</a>
        </div>
    </div>
</header>
<main>
    <section class="menu_main">
        <div class="menu-subtitle"><?php echo get_field('menu-subtitle'); ?></div>
        <div class="menu-title"><?php echo get_field('menu-title'); ?></div>
	        <?php
/**
 * Field Structure:
 *
 * - menu-repeater (Repeater)
 *   - menu-repeater-title (Text)
 *   - menu-repeater-repeater (Repeater)
 *     - menu-repeater-repeater-title (Text)
 *     - menu-repeater-repeater-text (text)
 *     - menu-repeater-repeater-price (number)
 *     - menu-repeater-repeater-chefschoice (radio)
 */
if( have_rows('menu-repeater') ):
    while( have_rows('menu-repeater') ) : the_row();

        // Get parent value.
        $parent_title = get_sub_field('menu-repeater-title');
        ?>
        <section class="<?php echo $parent_title;?>">
            <div class="title-meal"><?php echo $parent_title;?></div>
        <?php
        // Loop over sub repeater rows.
        if( have_rows('menu-repeater-repeater') ):
            while( have_rows('menu-repeater-repeater') ) : the_row();

                // Get sub value.
                $child_title = get_sub_field('menu-repeater-repeater-title');
                $child_text = get_sub_field('menu-repeater-repeater-text');
                $child_price = get_sub_field('menu-repeater-repeater-price');
                $child_chef = get_sub_field('menu-repeater-repeater-chefschoice');

                ?>
            <section class="dish-case<?php if ($child_chef == 'highlighted'){echo " highlighted";}?>">
                <div class="first-line">
                <span class="dish-title"><?php echo $child_title;?></span>
                <span class="dots-menu">.......................................................................................................</span>
                <span class="dish-price"><?php echo $child_price;?></span>
                </div>
                <span class="dish-text"><?php echo $child_text;?></span>
            </section>
            <?php
            endwhile;
        endif;
        ?>
        </section>
        <?php
    endwhile;
endif;
            ?>
    </section>
    <br>
    <br>
    <section class="recipes-blog">
        <div class="Latest">Latest updates</div>
        <div class="title-recipes">Recipes Blog</div>
        <section class="blog-post">
            <?php
                $blog = new WP_Query(array(
                        'post_type' => 'recipe',
                        'post_per_page'=> 4,
                        'order' => 'DESC',
                        'orderby' =>'date'
                ));
                ?>
               <?php if ($blog ->have_posts()):?>
               <?php $i=0; ?>
<?php while ($blog->have_posts()):$blog->the_post();?>
                <section class="card<?php echo $i; ?>">
                    <figure class="card-image">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" class="image-post">
                    </figure>
                    <div class="card-date"><?php echo get_the_date();?></div>
                    <div class="card-title"><?php echo get_the_title();?></div>
                    <div class="card-text"><?php echo get_post_field('recipe-bannertop_recipe-bannertop-text') ;?></div>
                </section>
		               <?php if ($i>=3):?>
                       <?php break; ?>
        <?php endif; ?>
                   <?php $i++;?>
        <?php endwhile;?>
        <?php endif;?>


        </section>
    </section>
</main>
<?php get_footer() ?>