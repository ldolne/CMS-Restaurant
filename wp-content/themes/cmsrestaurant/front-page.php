<?php get_header(); ?>
    <main>
        <h1><? bloginfo("name"); ?></h1>
        <?php if (have_posts()) : ?>

        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

            <article>
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


