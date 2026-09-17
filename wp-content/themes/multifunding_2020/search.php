<?php get_header(); ?>

<!-- Search.php ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<main>
    <div class="post-content search-results">

        <h1>Search Results for "<?php echo get_search_query(); ?>"</h1>

        <div class="results-container">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <article class="search-result">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_excerpt(); ?></p>
                    </a>
                </article>

            <?php endwhile; else : ?>
                <article><?php echo 'Sorry, your search doesn\'t match any content. <a href="#" onclick="searchToggle()">Try another?</a>'; ?></article>
            <?php endif; ?>

        </div>

    
    </div>
</main>

<?php get_footer(); ?>