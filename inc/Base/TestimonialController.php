<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class TestimonialController extends BaseController
{

	public $settings;

	public $callbacks;

	public $subpages = array();

	public function register()
	{
		$option = get_option('advait_plugin');

		$activated = isset($option['media_manager']) ? $option['media_manager'] : false;

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
				'page_title' => 'Media Manager',
				'menu_title' => 'Gallery',
				'capability' => 'manage_options',
				'menu_slug'  => 'advait_media',
				'callback'   => [$this->callbacks, 'adminMedia']
			]
		];
	}

	public function activate(){

	}
}
