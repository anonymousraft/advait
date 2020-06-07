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

	public function adminMedia()
	{
		return require_once("$this->plugin_path/templates/media.php");
	}

	public function adminTestimonial()
	{
		return require_once("$this->plugin_path/templates/testimonial.php");
	}

	public function adminTemplateManager()
	{
		return require_once("$this->plugin_path/templates/template_manager.php");
	}

	public function adminLoginManager()
	{
		return require_once("$this->plugin_path/templates/login.php");
	}

	public function adminMembershipManager()
	{
		return require_once("$this->plugin_path/templates/membership.php");
	}

	public function adminChatManager()
	{
		return require_once("$this->plugin_path/templates/chat.php");
	}
}
