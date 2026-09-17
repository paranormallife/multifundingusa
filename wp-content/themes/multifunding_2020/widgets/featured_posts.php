<?php
class featured_articles_widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'featured_articles_widget',
			__( 'Featured Articles', 'text_domain' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}
	public function form( $instance ) {
		$defaults = array(
			'title'    => 'Featured Articles',
			'select'   => '',
			'select2'   => '02',
			'select3'   => '03'
		);

		extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

		<?php // Widget Title ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<?php // Dropdown
			$options = array();
			// query for your post type
			$post_type_query  = new WP_Query(  
				array (  
					'posts_per_page' => -1  
				)  
			);   
			// we need the array of posts
			$posts_array      = $post_type_query->posts;   
			// create a list with needed information
			// the key equals the ID, the value is the post_title
			$options = wp_list_pluck( $posts_array, 'post_title', 'ID' );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select 1st Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'select2' ); ?>"><?php _e( 'Select 2nd Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select2' ); ?>" id="<?php echo $this->get_field_id( 'select2' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select2, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'select3' ); ?>"><?php _e( 'Select 3rd Post', 'text_domain' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'select3' ); ?>" id="<?php echo $this->get_field_id( 'select3' ); ?>" class="widefat">
			<?php
			foreach ( $options as $key => $name ) {
				echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select3, $key, false ) . '>'. $name . '</option>';
			} ?>
			</select>	
		</p>

	<?php }
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
		$instance['select2']   = isset( $new_instance['select2'] ) ? wp_strip_all_tags( $new_instance['select2'] ) : '';
		$instance['select3']   = isset( $new_instance['select3'] ) ? wp_strip_all_tags( $new_instance['select3'] ) : '';
		return $instance;
	}
	public function widget( $args, $instance ) {
		extract( $args );
		$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$select   = isset( $instance['select'] ) ? $instance['select'] : '';
		$select2   = isset( $instance['select2'] ) ? $instance['select2'] : '';
		$select3   = isset( $instance['select3'] ) ? $instance['select3'] : '';
		// WordPress core before_widget hook (always include )
		echo '
			'. $before_widget;
			// Display the widget
			echo '
				<div class="widget-text wp_widget_plugin_box">
				';
					echo'
					<ul>';
					if ( $select ) {
						echo '
						<li>
							<a href="'.get_permalink($select).'" title="'.get_the_title($select).'">
								<div class="thumbnail" style="background-image: url(\''.get_the_post_thumbnail_url($select,'medium').'\');">&nbsp;</div>
								<h2>'.get_the_title($select).'</h2>
							</a>
							<div class="excerpt">'.get_the_excerpt($select).'<a class="readmore" href="'.get_permalink($select).'" title="Read More">Read More &rarr;</a></div>
						</li>';
					}
					if ( $select2 ) {
						echo '
						<li>
							<a href="'.get_permalink($select2).'" title="'.get_the_title($select2).'">
								<div class="thumbnail" style="background-image: url(\''.get_the_post_thumbnail_url($select2,'medium').'\');">&nbsp;</div>
								<h2>'.get_the_title($select2).'</h2>
							</a>
							<div class="excerpt">'.get_the_excerpt($select2).'<a class="readmore" href="'.get_permalink($select2).'" title="Read More">Read More &rarr;</a></div>
						</li>';
					}
					if ( $select3 ) {
						echo '
						<li>
							<a href="'.get_permalink($select3).'" title="'.get_the_title($select3).'">
								<div class="thumbnail" style="background-image: url(\''.get_the_post_thumbnail_url($select3,'medium').'\');">&nbsp;</div>
								<h2>'.get_the_title($select3).'</h2>
							</a>
							<div class="excerpt">'.get_the_excerpt($select3).'<a class="readmore" href="'.get_permalink($select3).'" title="Read More">Read More &rarr;</a></div>
						</li>';
					}
			
					echo'
					<ul>';
				echo '
				</div>';
			// WordPress core after_widget hook (always include )
			echo '
			' . $after_widget . '
	';
	}
}
function register_featured_articles_widget() {
	register_widget( 'featured_articles_widget' );
}
add_action( 'widgets_init', 'register_featured_articles_widget' );
?>
