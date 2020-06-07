<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class LoginController extends BaseController
{

	public $settings;

	public $callbacks;

	public $subpages = array();

	public function register()
	{
		$option = get_option('advait_plugin');

		$activated = isset($option['login_manager']) ? $option['login_manager'] : false;

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
				'page_title' => 'Registration Manager',
				'menu_title' => 'Registration',
				'capability' => 'manage_options',
				'menu_slug'  => 'advait_login',
				'callback'   => [$this->callbacks, 'adminLoginManager']
			]
		];
	}

	public function activate(){

	}
}
