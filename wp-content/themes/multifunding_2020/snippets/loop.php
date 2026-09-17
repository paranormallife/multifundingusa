<section class="page-content">
<?php 
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
            //
            echo '<h1>' . get_the_title() . '</h1>';
            echo '<div class="post-content">';
                the_content();
            echo '</div>';
            //
        } 
    } else {
		echo '<h1>Not Found</h1>';
		echo '<div class="post-content">';
			echo '<p>Sorry, something\'s gone wrong. You may have clicked on a broken link, entered an incorrect URL or followed an outdated bookmark.</p>';
		echo '</div>';
	}
?>
</section>