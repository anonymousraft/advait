<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
	public function register(){

		add_action('admin_enqueue_scripts', [$this,'enqueue']);
	}

	public function enqueue()
	{
		wp_enqueue_style('advaitadmincss', $this->plugin_url . 'assets/css/advait.min.css');
		wp_enqueue_script('advaitadminjs', $this->plugin_url . 'assets/js/advait.min.js');
	}
}
