<?php
    $theme = get_stylesheet_directory_uri();
    $wpurl = get_bloginfo('wpurl');
?>

<div class="nav-container">
    <div class="logo">
        <a href="<?php echo $wpurl; ?>" title="Home">
            <img src="<?php echo $theme; ?>/assets/images/multi-funding-logo.svg" alt="Multi Funding" />
        </a>
    </div>
    <div class="menu-icon" onclick="menuToggle()">
        <span class="icon"></span>
    </div>
    <div class="main-menu">
        <div class="navigation-container">
            <?php wp_nav_menu( array( 'theme_location' => 'nav1' ) ); ?>
        </div>
    </div>
</div>