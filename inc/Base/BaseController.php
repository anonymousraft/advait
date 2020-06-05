<?php
/**
 *@package Advait
 */

namespace Inc\Base;

class BaseController
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;

	public $managers = array();

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path( dirname(__FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname(__FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname(__FILE__, 3) . '/advait.php');

		$this->managers = [
			'cpt_manager' => 'Custom Post',
			'taxonomy_manager' => 'Manage Taxonomies',
			'widget_manager' => 'Custom Widget',
			'media_manager'=> 'Custom Gallary',
			'testimonial_manager' => 'Testimonial Manager',
			'template_manager' => 'Custom Templates',
			'login_manager' => 'Registraion Manager',
			'membership_manager' => 'Membership Area Manager',
			'chat_manager' => 'Activate Chat System'
		];
	}
}
