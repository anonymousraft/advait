<?php
/**
 *@package Advait
 */

namespace Inc\Base;

class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();

		if(get_option('advait_plugin')){
			return;
		}

		$default = [];

		update_option( 'advait_plugin', $default );
	}
}
