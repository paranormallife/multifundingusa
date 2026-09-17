<!-- FOOTER.PHP ++++++++++++++++++++++ -->

<?php if( is_home() or is_front_page() ) { ?>    
    <div class="nmls-badge">
        <a href="/nmls-certified" title="NMLS Certified">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/badge-nmls.png" alt="NMLS" />
        </a>
    </div>
<?php } ?>

<footer class="page-width">
	<div class="partner-logos">
		<img src="https://multifundingusa.com/wp-content/uploads/2021/10/MULTIFUNDING_BASELOGOS.png" alt="Partners" />
	</div>
    <div class="copyright">
        <div><?php echo '<span class="copyright-symbol">&copy;</span> ' . date('Y') . ' Multi Funding'; ?></div>
        <div>471 Washington Ave Kingston NY 12401</div>
        <div><a href="tel:+18669578880">(866) 957-8880</a></div>
    </div>
    <div class="credit">
        <a href="https://asubtleweb.com" target="_blank" title="Website designed and developed by A Subtle Web">A Subtle Website</a>
    </div>
</footer>

<?php get_template_part('assets/scripts'); ?>
<?php /* Include this so the admin bar is visible. */ wp_footer(); ?> 

</body>
</html>
