<!DOCTYPE html>

<head>
<meta name="google-site-verification" content="j2v7Rn2WsGJGw1b12bUh7rxaPyldWs0BhmDjG5oi_kM" />
<meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<meta property="og:title" content="
  <?php
    if( is_front_page() or is_home() ) {
      echo get_bloginfo('name') . ': ' . get_bloginfo('description');
    } else { 
      echo get_bloginfo('name') . ': ' . get_the_title(); 
    }
  ?>
" />
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?php echo 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"/>

<?php 
  $post_id = get_queried_object_id();
  $featured_image = $post_id
    ? get_the_post_thumbnail_url($post_id, 'full')
    : '';
  if( is_front_page() or is_home() ) {
    echo '<meta property="og:image" content="'.get_site_icon_url().'"/>';
  } elseif ( $featured_image !='' ) { 
	  echo '<meta property="og:image" content="'.$featured_image.'"/>';
  } else { 
	  echo '<meta property="og:image" content="'.get_site_icon_url().'"/>';
} ?>


<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

<?php
  if( is_front_page() or is_home() ) {
    echo '<meta name="description" content="' . get_bloginfo('description') . '">';
  } else {
    $summary = $post_id ? get_the_excerpt($post_id) : '';
    if ( $summary !='' ) {
      echo '<meta name="description" content="' . $summary . '">';
    } else {
      echo '<meta name="description" content="' . get_bloginfo('description') . '">';
    }
  }
?>


<?php
if ( is_front_page() or ( is_home() ) ) {
  echo '<title>' . get_bloginfo('name') . ': ' . get_bloginfo('description') . '</title>';
} else {
  echo '<title>' . get_bloginfo('name') . ': ' . get_the_title() . '</title>';
}
?>
	
<link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?v=20230601" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<?php
  $theme = get_bloginfo('template_directory');
?>
                                        

<!--[if lt IE 10]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style_ie.css" type="text/css" /><![endif]-->

<!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
   <noscript>
     <strong>Warning !</strong>
     Because your browser does not support HTML5, some elements are simulated using JScript.
     Unfortunately your browser has disabled scripting. Please enable it in order to display this page.
  </noscript>
<![endif]-->

<?php /* This should always be included just before the </head> tag. */ wp_head(); ?>
</head>

<body id="body" class="asw <?php if(is_home() or is_front_page()) { echo 'home '; } else { echo get_post_type(); echo ' '; echo $post->post_name; } ?>">

<header>
  <?php get_template_part('snippets/header_nav') ?>
</header>

<!-- END OF HEADER.PHP -->


