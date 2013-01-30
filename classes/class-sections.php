<?php

/**
 * Sections class
 *
 * @package Sections
 * */
class Sections {

	/**
	 * Sections constructor
	 *
	 * @since 1.0.0
	 * */
	public function __construct( ) {
		add_action( 'admin_menu', array( $this, 'admin_menu' ), 99 );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_shortcode( 'section', array( $this, 'sections_shortcode' ) );

	}

	/**
	 * admin_menu function
	 *
	 * @since 0.1
	 * */
	public function admin_head() {
		if ( isset( $GLOBALS['post_type'] ) && $GLOBALS['post_type'] == 'section' ) {
			if ( $GLOBALS['pagenow'] == 'post.php' ) {
				add_meta_box( 'sections-shortcode', 'Shortcode', array( $this, 'shortcode_meta_box' ), 'section', 'normal', 'high' );
			}
		}
	}


	/**
	 * admin_menu function
	 *
	 * @since 0.1
	 * */
	public function admin_menu() {
		add_options_page( 'Sections', 'Sections', 'manage_options', 'sections', array( $this, 'sections_menu' ) );
	}

	/**
	 * sections_menu function
	 *
	 * @since 0.1
	 * */
	public function sections_menu() {
		include SECTIONS_PATH . '/admin/settings.php';
	}

	/**
	 * shortcode_meta_box function
	 *
	 * @since 0.1
	 * */
	public function shortcode_meta_box() {
		include SECTIONS_PATH . '/admin/shortcode.php';
	}

	/**
	 * sections_shortcode function
	 *
	 * @since 0.1
	 * */
	public function sections_shortcode( $args ) {
		$output = '';
		if ( isset( $args['id'] ) && is_numeric( $args['id'] ) ) {
			$id = $args['id'];
			unset( $args['id'] );
			$output = self::show_section( $id, $args );
		} elseif ( isset( $args['name'] ) && is_string( $args['name'] ) ) {
			$name = $args['name'];
			unset( $args['name'] );
			$output = self::show_section( $name, $args );
		}
		return $output;
	}

	/**
	 * show_section function
	 *
	 * @since 0.1
	 * */
	public static function show_section( $id, $options = array() ) {
		//TODO: Add check to prevent that a section contains itself as shortcode...
		global $post, $section;
		$args = false;
		$output = '';

		if ( is_numeric( $id ) ) {
			$args = array( 'p' => $id, 'post_type' => 'section' );
		} elseif ( is_string( $id ) ) {
			$args = array( 'name' => $id, 'post_type' => 'section' );
		}

		if ( $args ) {
			$section = new WP_Query( $args );

			// TODO: Add filters for security of filename etc..
			if ( isset( $options['template'] ) && !empty( $options['template'] ) ) {

				ob_start();
				self::load_template( 'sections', $options['template'] );
				$output = ob_get_contents();
				ob_end_clean();

			} else {

				if ( $section->have_posts() ) {
					$section->the_post();

					$output .= '<h2 class="sections-title">' . get_the_title() . '</h2>';

					$content = get_the_content();
					$content = apply_filters( 'the_content', $content );
					$content = str_replace( ']]>', ']]&gt;', $content );
					$output .= $content;
				}
			}
		}
		wp_reset_postdata();

		return $output;
	}

	/**
	 * Load Template
	 *
	 * If exists, load template file from theme
	 * Fallback to plugin template file, if exists.
	 *
	 * @param string  $slug
	 * @param string  $name Optional. Default null
	 * @uses load_template()
	 * @uses get_template_part()
	 * @since 0.1
	 * */
	protected function load_template( $slug, $name = null ) {
		$filename = $slug . ( ( $name != null ) ? '-' . $name : '' ) . '.php';

		if ( file_exists( STYLESHEETPATH . '/' . $filename ) )
			get_template_part( $slug, $name );

		elseif ( file_exists( SECTIONS_TEMPLATES_PATH . '/' . $filename ) )
			load_template( SECTIONS_TEMPLATES_PATH . '/' . $filename, false );

		else
			get_template_part( $slug, $name );
	}
} // END class Sections
