<?php
/**
 *@package Advait
 */
namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
	public function register()
	{

		add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);

	}

	public function settings_link($links)
	{

		$settings_link = '<a href="admin.php?page=advait_plugin">Settings</a>';
		$leave_feedback = '<a href="admin.php?page=advait_plugin">Leave Feedback</a>';
		array_push($links, $settings_link);
		array_push($links, $leave_feedback);
		return $links;
	}
}
