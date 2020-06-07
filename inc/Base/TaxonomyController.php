<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class TaxonomyController extends BaseController
{

	public $settings;

	public $callbacks;

	public $subpages = array();

	public function register()
	{
		$option = get_option('advait_plugin');

		$activated = isset($option['taxonomy_manager']) ? $option['taxonomy_manager'] : false;

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
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug'  => 'advait_taxonomies',
				'callback'   => [$this->callbacks, 'adminTaxonomies']
			]
		];
	}

	public function activate(){

	}
}
