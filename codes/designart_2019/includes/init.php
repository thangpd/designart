<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

class Designart_Includes
{
	private static $rel_path = null;

	private static $include_isolated_callable;

	private static $initialized = false;
	

	public static function init()
	{

		if (self::$initialized) {

			return;

		} else {

			self::$initialized = true;

		}

		self::$include_isolated_callable = function ( $path ) {
			include $path;
		};

		{
			self::include_child_first('/helpers.php');
			self::include_child_first('/hooks.php');
			add_action('init', array(__CLASS__, '_action_init'));
		}

		if ( ! is_admin() ) {

			add_action( 'wp_enqueue_scripts', array( __CLASS__, '_action_enqueue_scripts' ),
				20
			);
		} else {

			add_action( 'admin_enqueue_scripts', array( __CLASS__, '_action_enqueue_admin_scripts' ),
				20
			);

		}

	}

	private static function get_rel_path($append = '')
	{

		if (self::$rel_path === null) {

			self::$rel_path = '/includes';

		}

		return self::$rel_path . $append;

	}

	private static function dirname_to_classname($dirname) {

		$class_name = explode('-', $dirname);

		$class_name = array_map('ucfirst', $class_name);

		$class_name = implode('_', $class_name);

		return $class_name;

	}

	public static function get_parent_path($rel_path)
	{

		return get_template_directory() . self::get_rel_path($rel_path);

	}

	public static function get_child_path($rel_path)
	{

		if (!is_child_theme()) {

			return null;

		}

		return get_stylesheet_directory() . self::get_rel_path($rel_path);

	}

	public static function include_isolated($path)
	{

		call_user_func(self::$include_isolated_callable, $path);

	}

	public static function include_child_first($rel_path)
	{

		if (is_child_theme()) {

			$path = self::get_child_path($rel_path);

			if (file_exists($path)) {

				self::include_isolated($path);

			}

		}

		{

			$path = self::get_parent_path($rel_path);

			if (file_exists($path)) {

				self::include_isolated($path);

			}

		}

	}

	public static function include_parent_first($rel_path)
	{

		{

			$path = self::get_parent_path($rel_path);

			if (file_exists($path)) {

				self::include_isolated($path);

			}

		}

		if (is_child_theme()) {

			$path = self::get_child_path($rel_path);

			if (file_exists($path)) {

				self::include_isolated($path);

			}

		}

	}

	public static function _action_enqueue_scripts()
	{

		self::include_parent_first('/static.php');

	}

	public static function _action_enqueue_admin_scripts()
	{

		self::include_child_first( '/backend-static.php' );

	}

	public static function _action_init()
	{

		self::include_child_first('/menus.php');

		self::include_child_first( '/posts.php' );

	}

}

Designart_Includes::init();