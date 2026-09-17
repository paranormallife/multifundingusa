<?php get_header(); ?>

<!-- Index Template -->

<?php 
    if(is_front_page() or is_home() or is_page() ) {
        get_template_part('snippets/decorations-home');
    }
?>

<main id="main">

<?php
    if(is_front_page() or is_home()) {
        echo '<section class="page-content">';
            if ( is_active_sidebar( 'homepage_content' ) ) { 
                dynamic_sidebar( 'homepage_content' );
            }
            if ( is_active_sidebar( 'value_statements' ) ) { 
                dynamic_sidebar( 'value_statements' );
            }
            get_template_part('snippets/homepage');
        echo '</section>'; 
    } else {
        get_template_part('snippets/loop');
    }
?>

</main>

<?php get_footer(); ?>