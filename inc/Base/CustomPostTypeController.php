<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class CustomPostTypeController extends BaseController
{

	public $settings;

	public $callbacks;

	public $subpages = array();

	public function register()
	{
		$option = get_option('advait_plugin');

		$activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

		if(! $activated) {
			return;
		}

		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setSubages();

		$this->settings->addSubPages( $this->subpages)->register();

		add_action('init', [ $this, 'activate']);
	}

	public function setSubages()
	{
		$this->subpages = [
			[
				'parent_slug' => 'advait_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT Manager',
				'capability' => 'manage_options',
				'menu_slug'  => 'advait_cpt',
				'callback'   => [$this->callbacks, 'adminCpt']
			]
		];
	}

	public function activate()
	{
		register_post_type( 'advait_products', [
			'labels' => [
				'name' => 'Products',
				'singular_name' => 'Product'
			],
			'public' => true,
			'has_archive' => true
		] );
	}
}
