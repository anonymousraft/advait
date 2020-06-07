<?php
/**
 *@package Advait
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Dashboard extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	//public $subpages = array();


	public function register()
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		//$this->setSubages();

		$this->setSettings();

		$this->setSections();

		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->register();
	}

	public function setPages()
	{
		$this->pages = [
			[
				'page_title' => 'Advait Plugin',
				'menu_title' => 'Advait',
				'capability' => 'manage_options',
				'menu_slug'  => 'advait_plugin',
				'callback'   => [$this->callbacks, 'adminDashboard'],
				'icon_url'   => 'dashicons-buddicons-groups',
				'position'   => '100',
			]
		];
	}

	// public function setSubages()
	// {


	// 	$this->subpages = [
	// 		[
	// 			'parent_slug' => 'advait_plugin',
	// 			'page_title' => 'Custom Post Types',
	// 			'menu_title' => 'CPT Manager',
	// 			'capability' => 'manage_options',
	// 			'menu_slug'  => 'advait_cpt',
	// 			'callback'   => [$this->callbacks, 'adminCpt']
	// 		],

	// 		[
	// 			'parent_slug' => 'advait_plugin',
	// 			'page_title' => 'Custom Taxonomies',
	// 			'menu_title' => 'Taxonomies',
	// 			'capability' => 'manage_options',
	// 			'menu_slug'  => 'advait_taxonomies',
	// 			'callback'   => [$this->callbacks, 'adminTaxonomies']
	// 		],

	// 		[
	// 			'parent_slug' => 'advait_plugin',
	// 			'page_title' => 'Advait Widget',
	// 			'menu_title' => 'Widget',
	// 			'capability' => 'manage_options',
	// 			'menu_slug'  => 'advait_widget',
	// 			'callback'   => [$this->callbacks, 'adminWidget']
	// 		]
	// 	];
	// }

	//admin custom fields
	//populating settings array
	public function setSettings()
	{

		$args = [
			[
				'option_group' => 'advait_settings',
				'option_name' => 'advait_plugin',
				'callback' => [ $this->callbacks_mngr, 'checkBoxSanitize' ]
			]
		];

		$this->settings->setSettings( $args );
	}

	//populating sections array
	public function setSections()
	{
		$args = [
			[
				'id' => 'advait_admin_index',
				'title' => 'Advait Settings Manager',
				'callback' => [ $this->callbacks_mngr, 'advaitSectionSetting' ],
				'page' => 'advait_plugin'  //menu slug
			]
		];

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = [];

		foreach($this->managers as $manager => $title)
		{
			$args[] = [
				'id' => $manager,  //option_name for which the filed belong
				'title' => $title,
				'callback' => [ $this->callbacks_mngr, 'checkBoxField' ],
				'page' => 'advait_plugin',
				'section' => 'advait_admin_index', //section name of which the filed belong
				'args' => [
					'option_name' => 'advait_plugin',
					'label_for' => $manager,  //field_id
					'class' => 'ui-toggle'
				]
			];
		}

		$this->settings->setFields( $args );
	}
}
