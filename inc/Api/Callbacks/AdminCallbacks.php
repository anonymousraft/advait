<?php
/**
 *@package Advait
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{

	public function adminDashboard()
	{
		return require_once("$this->plugin_path/templates/admin.php");
	}

	public function adminCpt()
	{
		return require_once("$this->plugin_path/templates/cpt.php");
	}

	public function adminTaxonomies()
	{
		return require_once("$this->plugin_path/templates/taxonomies.php");
	}

	public function adminWidget()
	{
		return require_once("$this->plugin_path/templates/widget.php");
	}

}
