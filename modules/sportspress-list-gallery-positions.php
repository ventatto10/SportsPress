<?php
/*
Plugin Name: SportsPress List Gallery Positions
Plugin URI: http://themeboy.com/
Description: Add an option to show player positions on Player Lists in Gallery mode.
Author: ThemeBoy
Author URI: http://themeboy.com/
Version: 2.7
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'SportsPress_List_Gallery_Positions' ) ) :

/**
 * Main SportsPress List Gallery Positions Class
 *
 * @class SportsPress_List_Gallery_Positions
 * @version	2.6
 */
class SportsPress_List_Gallery_Positions {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Define constants
		$this->define_constants();

		// Actions
		//add_action( 'sportspress_widgets', array( $this, 'include_widgets' ) );

		// Filters
		add_filter( 'sportspress_shortcodes', array( $this, 'add_shortcodes' ) );
		add_filter( 'sportspress_player_list_options', array( $this, 'add_options' ) );
	}

	/**
	 * Define constants.
	*/
	private function define_constants() {
		if ( !defined( 'SP_LIST_GALLERY_POSITIONS_VERSION' ) )
			define( 'SP_LIST_GALLERY_POSITIONS_VERSION', '2.7' );

		if ( !defined( 'SP_LIST_GALLERY_POSITIONS_URL' ) )
			define( 'SP_LIST_GALLERY_POSITIONS_URL', plugin_dir_url( __FILE__ ) );

		if ( !defined( 'SP_LIST_GALLERY_POSITIONS_DIR' ) )
			define( 'SP_LIST_GALLERY_POSITIONS_DIR', plugin_dir_path( __FILE__ ) );
	}


	/**
	 * Add options.
	 *
	 * @return array
	 */
	public function add_options( $options ) {
		$options = array_merge( $options,
			array(
				'title'     => __( 'Galery Mode', 'sportspress' ),
				'desc' 		=> __( 'Show Positions', 'sportspress' ),
				'id' 		=> 'sportspress_list_galery_positions',
				'default'	=> 'no',
				'type' 		=> 'checkbox',
			)
			);
		return $options;
	}
}

endif;

new SportsPress_List_Gallery_Positions();
