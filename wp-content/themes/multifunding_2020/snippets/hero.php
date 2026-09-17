<header>
    <?php
        $theme = get_stylesheet_directory_uri();
        $wpurl = get_bloginfo('wpurl');
        $id = get_the_ID();

        $thumb = get_the_post_thumbnail_url($id, 'large');
        // Use the default hero if no featured image is provided:
        if( !empty($thumb) ) { $hero = $thumb; } else { $hero = $theme.'/assets/images/default-hero.jpg'; }
        //
        echo '<div class="hero" style="background-image: url(\''.$hero.'\');">';
                get_template_part('snippets/header_nav');
            echo '<div class="mask"><img src="'.$theme.'/assets/images/hero-mask.svg" /></div>';
        echo '</div>';
        //
    ?>
</header>