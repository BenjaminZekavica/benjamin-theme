/*-----------------------------------------------------------------------------------*/
# Social Counter Widget
/*-----------------------------------------------------------------------------------*/
add_action( 'widgets_init', 'arqam_counter_widget_box' );
function arqam_counter_widget_box() {
	register_widget( 'arqam_counter_widget' );
}
class arqam_counter_widget extends WP_Widget {

	function arqam_counter_widget() {
		$widget_ops 	= array( 'classname' => 'arqam_counter-widget', 'description' => ''  );
		$control_ops 	= array( 'width' => 250, 'height' => 350, 'id_base' => 'arqam_counter-widget' );
		parent::__construct( 'arqam_counter-widget', ARQAM_Plugin. ' - ' . __( 'Social Counter' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );

		$title 		= $instance['title'];
		$layout 	= $instance['layout'];
		$columns 	= $instance['columns'];
		$dark 		= $instance['dark'];
		$width 		= $instance['width'];
		$box_only = $instance['box_only'];

		$inside_widget = false;

		if( empty($box_only) ){
			echo $before_widget . $before_title . $title . $after_title;
			$inside_widget = true;
		}

		arq_get_counters( $layout, $columns, $dark, $width, '', $inside_widget );

		if( empty($box_only) ){
			echo $after_widget;
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['layout'] 	= $new_instance['layout'] ;
		$instance['columns'] 	= $new_instance['columns'] ;
		$instance['title'] 		= $new_instance['title'] ;
		$instance['dark'] 		= $new_instance['dark'] ;
		$instance['width'] 		= $new_instance['width'] ;
		$instance['box_only'] = $new_instance['box_only'] ;

		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => __( 'Follow us' , 'arq' )  , 'layout' => 'flat' ,'columns' => '3' , 'dark' => false, 'box_only' => false );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title :' , 'arq' ) ?> </label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'layout' ); ?>"><?php _e( 'Style :' , 'arq' ) ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'layout' ); ?>" name="<?php echo $this->get_field_name( 'layout' ); ?>" >
				<option value="metro" <?php if( $instance['layout'] == 'metro' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Metro Style' , 'arq' ) ?></option>
				<option value="gray" <?php if( $instance['layout'] == 'gray' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Gray Icons' , 'arq' ) ?></option>
				<option value="colored" <?php if( $instance['layout'] == 'colored' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Colored Icons' , 'arq' ) ?></option>
				<option value="colored_border" <?php if( $instance['layout'] == 'colored_border' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Colored Border Icons' , 'arq' ) ?></option>
				<option value="flat" <?php if( $instance['layout'] == 'flat' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( 'Flat Icons' , 'arq' )?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'columns' ); ?>"><?php _e( 'Columns :' , 'arq' ) ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>" >

				<option value="1" <?php if( $instance['columns'] == '1' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( '1 Column'  , 'arq' ) ?></option>
				<option value="2" <?php if( $instance['columns'] == '2' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( '2 Columns' , 'arq' ) ?></option>
				<option value="3" <?php if( $instance['columns'] == '3' ) echo "selected=\"selected\""; else echo ""; ?>><?php _e( '3 Columns' , 'arq' ) ?></option>
			</select>
			<small> <?php _e( 'Columns option not available for the METRO style.', 'arq' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dark' ); ?>"><?php _e( 'Dark Skin :' , 'arq' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'dark' ); ?>" name="<?php echo $this->get_field_name( 'dark' ); ?>" value="true" <?php if( $instance['dark'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'box_only' ); ?>"><?php _e( 'Show the Social Box only :' , 'arq' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'box_only' ); ?>" name="<?php echo $this->get_field_name( 'box_only' ); ?>" value="true" <?php if( $instance['box_only'] ) echo 'checked="checked"'; ?> type="checkbox" />
			<br /><small><?php _e( 'Will avoid the theme widget design and hide the widget title .' , 'arq' ) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Forced Items Width :' , 'arq' ) ?></label>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php if(isset( $instance['width'] )) echo $instance['width']; ?>" style="width:40px;" type="text" />
		</p>

	<?php
	}
}
