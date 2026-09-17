<?php
    $label = block_value('label');
?>

<div class="cta-widget image-block <?php block_field('color'); ?>">
    <a href="<?php block_field('url'); ?>" title="<?php echo $label; ?>">
        <div class="image" style="background-image: url('<?php block_field( 'image' ); ?>');">&nbsp;</div>
        <div class="title">
            <h2><?php echo $label; ?></h2>
        </div>
    </a>
</div>